<x-input

    x-data="{
        start: moment().subtract(29, 'days'),
        end: moment(),
        cb(start, end){
            this.start = start;
            this.end = end;
            $($el).val(start.format('MMMM Do YYYY') + ' - ' + end.format('MMMM Do YYYY'))
        }
    }"

    x-init="
        $($el).daterangepicker({
            startDate: start,
            endDate: end,
            locale: {
                format: 'DD-MM-YYYY'
            },
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                'This Year': [moment().startOf('year'), moment()],
                'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
            }
        }, cb);

        $($el).on('apply.daterangepicker', function(ev, picker) {
            {{-- $($el).val(picker.startDate.format('MMMM Do YYYY') + ' - ' + picker.endDate.format('MMMM Do YYYY')); --}}
            for (const name of $el.getAttributeNames()) {
                if(name.includes('wire:model')) $wire.set($el.getAttribute(name), $el.value);
            }
        });
    "

    data-kt-daterangepicker-opens="left"
    {{$attributes->merge([
    'placeholder' => 'Select Range',
    ])}}

/>

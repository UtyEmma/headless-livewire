<select
    {{-- x-data="{
        choices: null
    }"
    x-init="
        choices = new Choices($el, {
            itemSelectText: '',
            noChoicesText: 'No Options',
            classNames: {
                input: ['input', 'input-sm', 'rounded-none'],
                containerInner: 'input',
                itemSelectable: ['choices__item--selectable', 'text-sm'],
                itemChoice: ['choices__item--choice', 'text-sm', 'px-3', 'py-2'],
            }
        });
    " --}}
    {{$attributes->merge(['class' => 'select'])->except('x-data')}}  >
    {{$slot}}
</select>

{{-- @pushOnce('scripts')
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
@endpushOnce

@pushOnce('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/base.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css"/>
@endpushOnce --}}

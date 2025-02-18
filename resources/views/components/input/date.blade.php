@props([
    'options' => []
])

<div class="position-relative">
    <x-input
        x-data=""
        x-init="
            $($el).flatpickr({
                dateFormat: 'd-m-Y',
            });
        "
        {{$attributes->except(['options'])}}
    />

    <span class="position-absolute ki-outline ki-calendar fs-1" style="right: 5px; margin: auto 0"></span>
</div>

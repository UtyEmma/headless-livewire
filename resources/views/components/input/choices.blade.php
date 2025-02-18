@props([
    // 'options' => []
])

{{-- @pushOnce('scripts') --}}
    {{-- <script src="{{'/node_modules/choices.js/public/assets/scripts/choices.min.js'}}"></script> --}}
{{-- @endPushOnce --}}

{{-- @pushOnce('styles')
    <link rel="stylesheet" href="{{asset('js/plugins/choices/choices.min.css')}}"/>
@endPushOnce --}}

<select x-data="{ choices: null }" class=""
    x-init="
        console.log(window.choices);
        choices = new window.choices($el, {
            classNames: {
                containerOuter: ['choices'],
                containerInner: ['choices__inner'],
                input: ['choices__input'],
            }
        })
    "
    {{
        $attributes->merge(['class' => 'form-select form-control'])
    }}
>
    {{$slot}}
</select>


@props([
    'value' => 1,
    'prepend' => '',
    'append' => '',
    'min' => 1,
    'max' => 500,
    'name' => ''
])

<div 
    x-data="{
        slider: null,
        value: @js($value)
    }"

    x-init="
        noUiSlider.create($refs.slider, {
            start: [5],
            connect: true,
            range: {
                'min': @js($min),
                'max': @js($max)
            }
        });

        $refs.slider.noUiSlider.on('update', function (values, handle) {
            value = Math.round(values[handle]);
            if (handle) {
                value = Math.round(values[handle]);

                $wire.set($name, value)
            }
        });
    "
    class="d-flex flex-column text-center">
    <div class="d-flex align-items-start justify-content-center mb-7">
        <span class="fw-bold fs-4 mt-1 me-2">{{$prepend}}</span>
        <span class="fw-bold fs-3x" x-text="value"></span>
        <span class="fw-bold fs-3x">{{$append}}</span>
    </div>
    <div x-ref="slider" class="noUi-sm"></div>
</div>
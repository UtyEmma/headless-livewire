@props([
    'width' => 100,
])

<div class='h-1.5 w-full bg-gray-200 overflow-hidden'>
    <div {{$attributes->merge(['class' => 'w-full h-full left-right'])}} style="width: {{$width}}%;"></div>
</div>
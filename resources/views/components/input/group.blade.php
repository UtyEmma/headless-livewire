@props([
    'left',
    'right',
    'showPadding',
    'spanClass' => '',
    'groupClass' => ''
])

<div class="input-group input {{$groupClass}}">
    @isset($left)
        <span  {{$left->attributes->merge([''])}} >{{$left}}</span>
    @endisset
    <x-input type="text" class="border-0 outline-0 px-0 fs-6 {{($left ?? null) ? '' : ''}} {{($right ?? null) ? '' : ''}}" {{$attributes}} />
    @isset($right)
        <span class="input-group-text bg-transparent border-start-0 {{$spanClass}} {{isset($showPadding) ? '' : 'ps-0'}}" {{$right->attributes}} >{{$right}}</span>
    @endisset
</div>

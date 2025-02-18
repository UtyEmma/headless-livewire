@props([
    'status' => null
])

<span class="badge badge-outline badge-sm capitalize badge-{{ $status?->color() }}">{{ str($status?->value)->lower()->headline()->upper() }}</span>
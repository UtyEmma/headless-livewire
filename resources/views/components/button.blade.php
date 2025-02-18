<button {{ $attributes->merge(['class' => 'bg-blue-500 text-white inline-flex items-center space-x-2 p-2 px-4 rounded'])->except(['wire:loading', 'wire:target']) }}>
    {{ $slot }} @if ($attributes->has('wire:loading')) <x-spinner class="ms-2" {{$attributes->only(['wire:loading', 'wire:target', 'color'])}} />@endif
</button>

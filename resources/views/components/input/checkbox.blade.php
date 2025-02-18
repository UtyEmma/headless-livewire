@props([
    'checked' => false,
    'disabled' => false
])

<label class="checkbox-group">
    <input @checked($checked) @disabled($disabled) {{ $attributes->merge(['class' => 'checkbox checkbox-sm']) }} type="checkbox" />
    <span class="checkbox-label">{{$slot}}</span>
</label>

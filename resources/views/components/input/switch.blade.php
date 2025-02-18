@props([
    'checked' => false,
    'disabled' => false
])
<label class="switch">
    <input name="check" type="checkbox" {{ $attributes }} @checked($checked) @disabled($disabled)/>
    <span class="switch-label">{{$slot}}</span>
</label>
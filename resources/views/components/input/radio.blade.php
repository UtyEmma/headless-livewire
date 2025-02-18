<label {{$attributes->merge(['class' => 'form-label flex items-center gap-2.5 text-nowrap'])->only(['class', 'x-bind:class'])}}>
    <input class="radio" type="radio" {{ $attributes->except(['class', 'x-bind:class']) }}/>
    {{$slot}}
</label>

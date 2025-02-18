@props([
    'whitelist' => [],
    'placeholder' => 'Click Enter to Seperate tags',
    'mode' => null
])

<span wire:ignore x-data="{
    tagify: null,
    tags: @js($value ?? []),
    whitelist: @js($whitelist)
}">

    <input
        x-init="
            whitelist = typeof whitelist == 'array' ? whiteliet : Object.keys(whitelist).map(key => whitelist[key])
            tagify = new Tagify($refs.tagifyElement, {
                placeholder: '{{$placeholder}}',
                whitelist: whitelist,
                enforceWhitelist: @js(!empty($whitelist)),
                dropdown: {
                    classname: 'color-blue',
                    enabled: 0,
                    position: 'input',        
                    closeOnSelect: false, 
                    highlightFirst: true
                },
                mode: @js($mode),
                originalInputValueFormat: valuesArr => valuesArr.map(item => item.value)
            });

            tagify.addTags(tags);
        "
        x-on:change="
            $dispatch('input', $event.target.value);
        "
    x-ref="tagifyElement" {{$attributes->merge(['class' => 'input px-0 gap-0 h-auto !min-h-[2.5rem]', 'id' => 'tagify-input'])->except(['whitelist', ':whitelist'])}} />
</span>

@pushOnce('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
@endpushOnce

@pushOnce('styles')
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
@endpushOnce



<div x-data="{
    optionFormat: (item) => {
        if ( !item.id ) return item.text;
        var span = document.createElement('span');
        var imgUrl = item.element.getAttribute('data-image');
        var template = '';
        template += `{{}}`;
        template += item.text;
        span.innerHTML = template;
        return $(span)
    }
}">
    <x-input.select {{$attributes->merge(['placeholder' => 'Select Network'])}} templates >
        {{$slot}}
    </x-input.select>
</div>

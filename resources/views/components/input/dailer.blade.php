<div class="input">
    <input {{ $attributes->except(['class']) }} />
    <div class="flex justify-end items-center gap-x-1.5">
        <span role="button">
            <em class="ki-duotone ki-minus-squared"></em>
        </span>
        <span role="button">
            <em class="ki-duotone ki-plus-squared"></em>
        </span>
    </div>
</div>

<div x-data="{
    table: null
}" class="scrollable-auto">
    <table {{$attributes->merge(['class' => 'table'])}} >
        {{$slot}}
    </table>
</div>
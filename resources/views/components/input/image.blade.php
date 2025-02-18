<div class="d-flex align-items-end gap-4" wire:ignore x-data="{
    img: '',
    defaultImg: '{{$defaultImage ?? asset('assets/media/svg/files/blank-image.svg')}}',
    selected: false
}" x-init="img = defaultImg" >
    <div class="symbol symbol-50px">
        <img x-bind:src="img" style="object-fit: cover;" alt=""/>
    </div>

    <label {{$attributes->class(["btn btn-sm btn-primary"])}} >
        <input type="file" {{ $attributes->except(['defaultImage'])->merge([
            'accept' => '',
            'name' => '',
            'hidden' => true
        ]) }} x-on:change="img = URL.createObjectURL($event.target.files[0]); selected = true;" >
        {{$label ?? 'Select File'}}
    </label>
</div>

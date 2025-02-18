@props([
    'name' => '',
    'value' => '/assets/media/svg/files/blank-image.svg'
])

<style>
    .image-input-placeholder { 
        background-image: url({{$value}}); 
    } 

    [data-bs-theme="dark"] .image-input-placeholder { 
        background-image: url({{$value ?? '/assets/media/svg/files/blank-image-dark.svg'}}); 
    }
</style>

<div class="mb-3 image-input image-input-empty image-input-outline image-input-placeholder" data-kt-image-input="true">
    <div class="image-input-wrapper w-150px h-150px"></div>
    <label class="shadow btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change image">
        <i class="ki-outline ki-pencil fs-7"></i>
        <input type="file" {{$attributes->except(['value'])}} accept=".png, .jpg, .jpeg" />
        <input type="hidden" name="avatar_remove" />
    </label>

    <span class="shadow btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel image">
        <i class="ki-outline ki-cross fs-2"></i>
    </span>

    <span class="shadow btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove image">
        <i class="ki-outline ki-cross fs-2"></i>
    </span>
</div>
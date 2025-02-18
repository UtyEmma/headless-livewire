<label class="d-flex p-2 form-control {{$borderClass ?? ''}}" x-data='{
    name: "{{$placeholder ?? 'Select a File'}}",
}'>
<span  class="btn btn-primary btn-sm w-auto  {{$class ?? ''}}" >
    <input accept="{{$accept ?? ''}}" type="file" {{ $attributes->whereStartsWith('wire:model') }} x-on:change="
        name = $event.target.files.length > 1 ? `${$event.target.files.length} files selected` : $event.target.files[0].name; {{$onchange ?? ''}}
    " hidden name="{{$name ?? ''}}" {{$attributes}} >
    {{$label ?? 'Select File'}}
</span>

<div class="px-4 flex-grow-1 text-muted d-flex align-items-center">
    <span class="fs-7 text-wrap" x-text="name"></span>
</div>
</label>

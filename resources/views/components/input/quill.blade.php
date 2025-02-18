@props([
    'height' => '200px',
    'name' => '',
    'toolbar' => [
        ['bold', 'italic', 'underline'], 
        [['list' => 'ordered'], ['list' => 'bullet']],
        ['link', ],       
    ],
    'placeholder' => 'Compose an epic...',
    'value' => ''
])

<style>
    .ql-toolbar{
        background: white;
        border-radius: 0.65rem !important;
        background: var(--bg-gray-100);
        margin: 5px auto;
    }

    .ql-container {
        border-radius: 5px;
    }

    .ql-editor{
        padding: 0px;
    }
</style>

<div wire:ignore x-data="{
    quill: null,
}" x-key="{{$id ?? Str::random()}}" class="">
    <div
        x-ref="quillEditor"
        x-init="
            quill = new Quill($refs.quillEditor, {
                theme: 'snow',
                modules: {
                    toolbar: @js($toolbar)
                },
                placeholder: '{{$placeholder}}'
            });

            quill.root.insertAdjacentHTML('afterbegin', `{!! $value !!}`);

            quill.on('text-change', () => {
                $dispatch('input', quill.root.textContent ? quill.root.innerHTML : '');
                $refs.textArea.value = quill.root.textContent ? quill.root.innerHTML : '';
            });
        "
        {{ $attributes->whereStartsWith('wire:model') }}
        {{$attributes->class('input h-48')}}
    ></div>
    <textarea type="text" x-ref="textArea" {{$attributes->except('class')}} hidden name="{{$name}}"></textarea>
</div>

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
@endpush

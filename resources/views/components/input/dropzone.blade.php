@props([
    'max' => 4,
    'maxSize' => 2,
    'name' => ''
])

<div class="dropzone" 
        x-data="{
            dropzone: null,
            files: [],
            max: @js($max),
            fileInput: null,
        }"
        x-init="
            dropzone = new Dropzone($el, {
                url: 'https://keenthemes.com/scripts/void.php', // Set the url for your upload script location
                maxFiles: max,
                maxFilesize: '{{$maxSize}}', // MB
                addRemoveLinks: true,
                removedfile(file) {
                    files.push(file);

                    if (file.previewElement != null && file.previewElement.parentNode != null) {
                        file.previewElement.parentNode.removeChild(file.previewElement);
                    }
                    
                    return this._updateMaxFilesReachedClass();
                },
                autoQueue: false,
                autoProcessQueue: false,
                accept: function(file, done) {
                    console.log(file);
                    if (file == 'wow.jpg') {
                        done(`Naha, you don't.`);
                    } else {
                        done();
                    }
                }
            });

            dropzone.on('addedfile', file => {
                files.push(file)
            });

            $watch('files', files => {
                const input = $refs.fileInput;
                const dataTransfer = new DataTransfer();
                files.map(file => dataTransfer.items.add(file));
                input.files = dataTransfer.files;
                // Help Safari out
                if (input.webkitEntries.length) {
                    input.dataset.file = `${dataTransfer.files[0].name}`;
                }

                console.log(input.files)
            })

        "
    >
    <div class="dz-message needsclick">
        <i class="ki-duotone ki-file-up fs-3x text-primary"><span class="path1"></span><span class="path2"></span></i>
        <div class="ms-4">
            <h3 class="mb-1 text-gray-900 fs-5 fw-bold">Drop files here or click to upload.</h3>
            <span class="text-gray-500 fs-7 fw-semibold">Upload up to {{$max}} files</span>
        </div>
    </div>

    <input type="file" name="{{$name}}" hidden x-ref="fileInput">
</div>

@push('styles')
    <style>
        .dz-progress{
            display: none;
        }
    </style>
@endpush

@push('scripts')
    <script>
        
    </script>
@endpush
@props([
    'title' => 'Are you sure?',
    'caption' => 'This action cannot be reversed.',
    'color' => 'danger',
    'href' => '',
    'id' => '',
    'icon' => 'information-2'

])
<span 
    x-data="{
        modal: null,
        element: null,
        target: @js($href)
    }"
>
    <x-modal data-modal-backdrop-static="true" class="max-w-sm modal-center-y" >
        <x-slot:button {{$attributes->only('class')}} >{{$slot}}</x-slot:button>
        
        <div class="space-y-5 p-2">
            <div class="flex items-center space-x-3">
                <div>
                    <em class="ki-filled ki-{{$icon}} text-4xl text-{{$color}}" ></em>
                </div>
                <div class="flex-1">
                    <h2 class="font-sans font-semibold text-base" >{{ $title }}</h2>
                    <div >
                        @isset ($body)
                            {{$body}}
                        @else
                            <p v-if="description && !$slots.description" class="text-gray-500 text-sm">{{ $caption }}</p>
                        @endisset
                    </div>
                </div>
            </div>
            <div class="flex justify-end space-x-3">
                <x-button x-on:click="modalOpen=false" class="btn-light ">Cancel</x-button>
                <x-button class="btn-{{$color}} " onclick="window.location.href = '{{$href}}'" >Proceed</x-button>
            </div>
        </div>
    </x-modal>
</span>
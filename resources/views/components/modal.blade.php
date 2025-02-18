@props([
    'header' => '',
    'button' => '',
    'footer' => ''
])

<div 
    x-data="{ 
        modalOpen: false, 
        close () {
            this.modalOpen = false
        } 
    }" 

    x-modelable="modalOpen"

    @keydown.escape.window="modalOpen = false" 
    {{$attributes->except('class')}}
>
    @if ($button)
        <span role="button" {{$button?->attributes}} @click="modalOpen=true">
            {{$button}}
        </span>
    @endif
    
    <div class="relative z-50 w-auto h-auto">
        <template x-teleport="body">
            <div x-show="modalOpen" class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen" x-cloak>
                <div x-show="modalOpen" 
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in duration-300"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    @click="modalOpen=false" 
                    class="absolute inset-0 w-full h-full bg-black bg-opacity-40"
                ></div>
    
                <div x-show="modalOpen"
                    x-trap.inert.noscroll="modalOpen"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    {{$attributes->merge(['class' => 'bg-white rounded p-5 relative w-full max-w-md'])}}>
                    @if ($header)
                        <div class="card-header">
                            <div>
                                {{$header}}
                            </div>
                            
                            <div>
                                <x-button @click="modalOpen=false" class="btn-sm btn-icon p-0">
                                    <i class="ki-outline ki-cross" ></i>
                                </x-button>
                            </div>
                        </div>
                    @endif
                    
                    <div  >
                        {{$slot}}
                    </div>

                    @if ($footer)
                        <div {{$footer->attributes->merge(['class' => 'card-footer'])}}>
                            {{$footer}}
                        </div>
                    @endif
                </div>
            </div>
        </template>
    </div>
</div>
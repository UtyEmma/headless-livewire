
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('toast', {
            show: false,
            toast: @js(session('toast')),
            init() {
                if(this.toast) {
                    setTimeout(() => {
                        this.show = true;
                        setTimeout(() => this.show = false, 3000);
                    }, 200)
                }
            },
            setToast(toast) {
                this.toast = toast;
            },
            toggle(show = true){
                this.show = show
            },
            
        })
    })

    document.addEventListener('livewire:init', () => {
        Livewire.on('toast', (event) => {
            Alpine.store('toast').setToast(event[0])
            Alpine.store('toast').show = true
            setTimeout(() => Alpine.store('toast').toggle(false), 3000);
        });
    })
</script>

<div x-data x-cloak x-show="$store.toast?.show" class="w-80 fixed top-5 z-[999999]  right-5" 
    x-transition:enter="transition transform ease-out duration-500"
    x-transition:enter-start="translate-x-full"
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transition transform ease-in duration-500"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="translate-x-full"
>
    <div class="card border overflow-hidden"
        x-bind:class="{
                {{-- 'bg-success': $store.toast?.toast?.status == 'success',
                'bg-danger': $store.toast?.toast?.status == 'error',
                'bg-warning': $store.toast?.toast?.status == 'warning',
                'bg-info': $store.toast?.toast?.status == 'info', --}}
        }"
    >
        <div class="p-3 flex space-x-3">
            <div >
                <i class="ki-duotone text-3xl"
                    x-bind:class="{
                        'ki-check-squared text-success': $store.toast?.toast?.status == 'success',
                        'ki-cross-square text-danger': $store.toast?.toast?.status == 'error',
                        'ki-information-2 text-warning': $store.toast?.toast?.status == 'warning',
                        'ki-information text-info': $store.toast?.toast?.status == 'info',
                    }"    
                ></i>
            </div>

            <div class="flex-1">
                <p x-show="$store.toast?.toast?.title" class="font-medium" x-text="$store.toast?.toast?.title"></p>
                <p x-show="$store.toast?.toast?.message" class="text-sm font-light text-gray-600" x-text="$store.toast?.toast?.message"></p>
            </div>
    
            <div class="shrink-0">
                <x-button x-on:click="$store.toast?.toggle(false)" class="btn-sm btn-icon p-0">
                    <i class="ki-outline ki-cross" ></i>
                </x-button>
            </div>
        </div>
    </div>
</div>



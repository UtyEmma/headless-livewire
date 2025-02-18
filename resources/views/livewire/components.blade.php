<div class="max-w-6xl mx-auto  p-5 space-y-4">
    <header>
        <h2 class="font-semibold text-lg">Headless Livewire</h2>
    </header>

    <section class="space-y-3 p-2 border bg-gray-50 rounded-md" >
        <div>
            <h4 class="font-medium" >Button</h4>
        </div>

        <div class="flex space-x-2" >
            <div>
                <x-button >Button</x-button>
            </div>

            <div>
                <x-button wire:loading >Loading Button</x-button>
            </div>
        </div>
    </section>

    <section class="space-y-3 p-2 border bg-gray-50 rounded-md" >
        <div>
            <h4 class="font-medium" >Modal</h4>
        </div>

        <div class="flex space-x-2" >
            <div>
                <x-modal >
                    <x-slot:button>
                        <x-button>Open Modal</x-button>
                    </x-slot:button>

                    <div class="max-w-6xl">

                    </div>
                </x-modal>
            </div>
        </div>
    </section>

    <section class="space-y-3 p-2 border bg-gray-50 rounded-md" >
        <div>
            <h4 class="font-medium" >Confirm Action</h4>
        </div>

        <div class="flex space-x-2" >
            <div>
                <x-confirm href="#">
                    <x-button>Confirm Action</x-button>
                </x-confirm>
            </div>
        </div>
    </section>

    <section class="space-y-3 p-2 border bg-gray-50 rounded-md" >
        <div>
            <h4 class="font-medium" >Progress</h4>
        </div>

        <div class="space-y-5">
            <div>
                <x-progress :width="40" class="bg-blue-600" />
            </div>

            <div>
                <x-progress.indeterminate :width="40" class="bg-blue-600" />
            </div>
        </div>
    </section>

    <section class="space-y-3 p-2 border bg-gray-50 rounded-md" >
        <div>
            <h4 class="font-medium" >Copy to clipboard</h4>
        </div>

        <div class="space-y-5">
            <div>
                <x-copy value="Text to be copied" >
                    <x-slot:copying>Copy</x-slot:copying>
                    <x-slot:copied>Copied</x-slot:copied>
                </x-copy>
            </div>
        </div>
    </section>

    <section class="space-y-3 p-2 border bg-gray-50 rounded-md" >
        <div>
            <h4 class="font-medium" >Copy to clipboard</h4>
        </div>

        <div class="space-y-5">
            <div>
                <x-copy value="Text to be copied" >
                    <x-slot:copying>Copy</x-slot:copying>
                    <x-slot:copied>Copied</x-slot:copied>
                </x-copy>
            </div>
        </div>
    </section>
</div>
<span x-data="{
    amount: @if($attributes->whereStartsWith('wire:model')) $wire.entangle(@js($name)).live @else '' @endif,
    symbol: @js($symbol ?? $currentCurrency->symbol),
    mask: null,
    amountInput: null
}" {{$attributes->whereStartsWith('x-init')}}>
    <x-input  x-init="
        mask = IMask($el, {
                mask: `${symbol} num`,
                blocks: {
                    num: {
                        mask: Number,
                        scale: 2,
                        thousandsSeparator: ',',
                        padFractionalZeros: false,
                        autofix: true,
                        radix: '.',
                        mapToRadix: ['.']
                    }
                },
            }
        )

        $watch('amount', (value) => {
            mask.destroy();
            $el.value = amount
            mask = IMask($el, {
                    mask: `${symbol} num`,
                    blocks: {
                        num: {
                            mask: Number,
                            scale: 2,
                            thousandsSeparator: ',',
                            padFractionalZeros: false,
                            autofix: true,
                            radix: '.',
                            mapToRadix: ['.']
                        }
                    },
                }
            )

            $refs.amountInput.value = mask.unmaskedValue; 
            $refs.amountInput.dispatchEvent(new Event(`input`))
        })
    " placeholder="{{$symbol ?? $currentCurrency->symbol}} 0.00"  type="text" inputmode="numeric" {{$attributes->except('name')->whereDoesntStartWith(['wire:model', 'x-init'])->merge([
        'x-on:keyup' => '$refs.amountInput.value = mask.unmaskedValue; $refs.amountInput.dispatchEvent(new Event(`input`))',
        'class' => 'appearance-none'
    ])}} name="{{isset($show) ? $name : null}}" />
    <input type="number" {{$attributes->except('name')->whereDoesntStartWith(['x-on:change', 'x-model'])}} x-on:change="mask.updateValue()" {{$attributes->whereStartsWith('wire:model')}} x-ref="amountInput" name="{{isset($show) ? null : $name}}" hidden/>
</span>

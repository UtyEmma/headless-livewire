@props([
    'arrow' => false,
    'open' => false,
    'position' => 'bottom',
    'offset' => 8
])

<div x-data="{
    popoverOpen: @js($open),
    popoverArrow: @js($arrow),
    popoverPosition: @js($position),
    popoverHeight: 0,
    popoverOffset: @js($offset),
    popoverHeightCalculate() {
        this.$refs.popover.classList.add('invisible'); 
        this.popoverOpen=true; 
        let that=this;
        $nextTick(function(){ 
            that.popoverHeight = that.$refs.popover.offsetHeight;
            that.popoverOpen=false; 
            that.$refs.popover.classList.remove('invisible');
            that.$refs.popoverInner.setAttribute('x-transition', '');
            that.popoverPositionCalculate();
        });
    },
    popoverPositionCalculate(){
        if(window.innerHeight < (this.$refs.popoverButton.getBoundingClientRect().top + this.$refs.popoverButton.offsetHeight + this.popoverOffset + this.popoverHeight)){
            this.popoverPosition = 'top';
        } else {
            this.popoverPosition = 'bottom';
        }
    }
}"
x-init="
    that = this;
    window.addEventListener('resize', function(){
        popoverPositionCalculate();
    });
    $watch('popoverOpen', function(value){
        if(value){ popoverPositionCalculate(); document.getElementById('width').focus();  }
    });
"
class="relative" >

<span x-ref="popoverButton" role="button" x-on:click="popoverOpen=!popoverOpen" >
    {{$slot}}
</span>

<div x-ref="popover"
    x-show="popoverOpen"
    x-init="setTimeout(function(){ popoverHeightCalculate(); }, 100);"
    x-trap.inert="popoverOpen"
    @click.away="popoverOpen=false;"
    @keydown.escape.window="popoverOpen=false"
    :class="{ 'top-0 mt-7' : popoverPosition == 'bottom', 'bottom-0 mb-7' : popoverPosition == 'top' }"
    {{$attributes->merge(['class' => 'absolute  z-[999999] max-w-lg'])}} x-cloak>
    <div x-ref="popoverInner" x-show="popoverOpen" class="w-full p-4 bg-white border rounded-md shadow-sm border-neutral-200/70">
        <div x-show="popoverArrow && popoverPosition == 'bottom'" class="absolute top-0 inline-block w-5 mt-px overflow-hidden -translate-x-2 -translate-y-2.5 left-1/2"><div class="w-2.5 h-2.5 origin-bottom-left transform rotate-45 bg-white border-t border-l rounded-sm"></div></div>
        <div x-show="popoverArrow  && popoverPosition == 'top'" class="absolute bottom-0 inline-block w-5 mb-px overflow-hidden -translate-x-2 translate-y-2.5 left-1/2"><div class="w-2.5 h-2.5 origin-top-left transform -rotate-45 bg-white border-b border-l rounded-sm"></div></div>
        {{$content}}
    </div>
</div>
</div>
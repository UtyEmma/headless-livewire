<span
    role="button"
    x-data="{
        copyText: @js($value),
        copyNotification: false,
        copyToClipboard() {
            navigator.clipboard.writeText(this.copyText);
            this.copyNotification = true;
            setTimeout(function(){
                this.copyNotification = false;
            }, 3000);
        }
    }" 
    x-on:click="copyToClipboard();" 
>
    <span x-show="!copyNotification">
        @isset ($copying)
            {{$copying}}
        @else
            <i class="ki-filled ki-copy" ></i>
        @endisset
    </span>
                
    <span x-show="copyNotification"  x-cloak >
        @isset ($copied)
            {{$copied}}
        @else
            <i class="ki-filled ki-copy-success text-success" ></i>
        @endisset
    </span>
</span>
<div class='h-1.5 w-full bg-gray-100 overflow-hidden'>
    <div {{$attributes->merge(['class' => 'progress w-full h-full left-right'])}}></div>
</div>

<style>
    .progress {
        animation: progress 1s infinite linear;
    }

    .left-right {
        transform-origin: 0% 50%;
    }
        @keyframes progress {
        0% {
            transform:  translateX(0) scaleX(0);
        }
        40% {
            transform:  translateX(0) scaleX(0.4);
        }
        100% {
            transform:  translateX(100%) scaleX(0.5);
        }
    }
</style>
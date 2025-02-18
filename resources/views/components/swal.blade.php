@props([
    'status' => 'warning',
    'title' => 'Are you sure',
    'message' => '',
])

<a {{$attributes->except(['title', 'message', 'status'])}}
    x-data="{}" onclick="toggle(event)">{{$slot}}</a>

@once
    <script>
        const toggle = (e) => {
            e.preventDefault();

            Swal.fire({
                title:  '{{$title}}',
                text: `{{$message}}`,
                icon: '{{$status}}',
                showCancelButton: true,
                confirmButtonText: 'Proceed',
                confirmButtonColor: '#f1416c',
            }).then((result) => {
                if(result.isConfirmed){
                    window.location.href = e.target.getAttribute('href')
                }
            })
        }
    </script>
@endonce

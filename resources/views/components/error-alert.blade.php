@props(['messages'])

@if ($messages)
    @foreach ($messages as $message)
        <script>
            swal({
                title: "Error",
                text: "{{ $message }}",
                icon: "error",
                timer: 3000,
                buttons: false 
            });
        </script>
    @endforeach
@endif

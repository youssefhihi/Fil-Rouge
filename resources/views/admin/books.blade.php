<x-admin-layout>
 <!-- CONTENT -->
 
            <livewire:search-book/>

    
    @if (session('error'))
        <script>
            swal("Success", "{{ session('error') }}", 'error', {
                button: true,
                button: "ok",
                // timer:3000,
            });
            </script>
            @endif
            @if (session('message'))
        <script>
            swal("Success", "{{ session('message') }}", 'success', {
                button: true,
                button: "ok",
                // timer:3000,
            });
            </script>
            @endif

</x-admin-layout>
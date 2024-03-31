<x-admin-layout>
 <!-- CONTENT -->
            <x-success-alert/>
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
</x-admin-layout>
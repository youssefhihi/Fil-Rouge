
@if (session('success'))
        <script>
            swal("Success", "{{ session('success') }}", 'success', {
                button: true,
                button: "ok",
                // timer:3000,
            });
            </script>
@endif
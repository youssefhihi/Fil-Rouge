<x-client-layout>
    @section('header')
    <x-client.navbar page="feed" /> 
    @endsection
    <x-client.articles  :posts="$posts" />
    <x-client.side-cards :genres="$genres"/>
    <x-success-alert/>
            @if (session('error'))
                <script>
                    swal("Success", "{{ session('error') }}", 'error', {
                        button: true,
                        button: "ok",
                        // timer:3000,
                    });
                 </script>
            @endif
            <x-error-alert :messages="$errors->all()" />
</x-admin-layout>
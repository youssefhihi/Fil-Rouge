<x-client-layout>
    @section('header')
    <x-client.navbar page="feed" /> 
    @endsection
    <x-client.articles/>
    <x-client.side-cards/>

</x-admin-layout>
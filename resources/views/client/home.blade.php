<x-client-layout>
    @section('header')
    <x-client.navbar page="feed" /> 
    @endsection
    
    <x-client.articles  :posts="$posts" />
    <x-client.side-cards :genres="$genres" :books="$books" :authors="$authors"/>
    <x-success-alert/>
           
            <x-error-alert :messages="$errors->all()" />
</x-client-layout>
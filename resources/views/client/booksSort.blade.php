<x-client-layout>
@section('header')
    <x-client.navbar page="books" /> 
    @endsection

<div class="w-8/12 mx2">
    <div class="flex flex-wrap gap-5">
            
        <a href="#"
            class="relative overflow-hidden w-52 h-80 rounded-3xl cursor-pointer  font-bold  "
            >
            <img src="{{asset('imgs/book1.png')}}" alt="" class="z-2 absolute w-full h-full peer">
            <div class="z-10 absolute w-full h-full peer"></div>
            <div
            class="absolute peer-hover:-top-20 peer-hover:-left-16 peer-hover:w-[140%] peer-hover:h-[140%] -top-32 -left-16 w-32 h-44 rounded-full bg-white opacity-50 transition-all duration-500"
            ></div>
            <div
                class="absolute flex  text-center items-end justify-end peer-hover:right-0 peer-hover:rounded-b-none peer-hover:bottom-0 peer-hover:items-center peer-hover:justify-center peer-hover:w-full peer-hover:h-full -bottom-32 -right-16 w-36 h-44 rounded-full bg-white opacity-80 transition-all duration-500"
            >
            <div class="flex flex-col gap-3">
            <p class=" text-xl font-bold uppercase  ">Spear </p>
            <div class="text-sm font-normal flex space-x-2   ">
                <x-icon name="genre" class="pt-1"/><p> Fiction</p> 
                <x-icon name="author" class="pt-1"/> <p>Neil Tran</p>
            </div>           
                      
            </div > 
         
            </div>
           
        </a>
       

    </div></div>
    <x-client.side-cards/>

</x-client-layout>
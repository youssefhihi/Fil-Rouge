
<x-client-layout>
@section('header')
    <x-client.navbar page="profile" /> 
@endsection

<div class=" flex rounded-lg justify-evenly w-full  bg-white ">
        <div class=" hidden lg:block lg:w-1/2 h-full p-5 rounded-xl">
            <img src="{{asset('storage/' . $book->image->path)}}" alt="" class=" w-full object-fill h-full rounded-2xl bg-cover drop-shdow-xl ">
        </div>
        <div class="w-full  p-5 relative  rounded-xl shadow-lg  bg-white ">
              
                <div class="flex flex-col gap-3">
                    <p class="text-left font-normal font-semibold">Your Order</p>
                    <div class="border border-brown-300"></div>
                    <div class=" text-center py-3 ">
                       
                        <p class="text-2xl text-center text-black hover:text-gray-800 hover:underline  font-semibold">{{$book->title}}</p>
                    </div>
                    <div class="border border-brown-300"></div>              
                </div>
                <form method="POST" action="{{route('reservation.store')}}" class="space-y-4">
                @csrf
                @method('POST')
                <input type="hidden" name="book_id" value="{{$book->id}}">
                    <!-- Start Date -->
                    <label for="startDate" class="block text-sm font-medium text-gray-700">Start Date</label>
                    <input type="date" name="startDate" id="startDate" class="block w-full mt-1 py-1 px-2 border-gray-600 border rounded-md shadow-sm focus:outline-none  sm:text-sm">
                    <x-error-input :messages="$errors->get('startDate')" class="mt-2" />
                    <!-- Return Date -->
                    <label for="returnDate" class="block text-sm font-medium text-gray-700">Return Date</label>
                    <input type="date" name="returnDate" id="returnDate" class="block w-full mt-1 py-1 px-2 border-gray-600 border rounded-md shadow-sm focus:outline-none  sm:text-sm">                     
                    <x-error-input :messages="$errors->get('returnDate')" class="mt-2" />
                    <x-textarea name="message" label="message"/>
                    <x-error-input :messages="$errors->get('message')" class="mt-2" />
                    <div class="flex justify-center">
                    <button type="submit"  class="  inline-block w-full max-w-lg py-2 px-6 rounded-l-xl border border-black rounded-t-xl bg-black hover:bg-white hover:text-black focus:text-gray-700 focus:bg-gray-200 text-white font-bold leading-loose transition duration-200">Reseve</button>
                    </div>
                </form>
            </div>
    </div>

</x-client-layout>
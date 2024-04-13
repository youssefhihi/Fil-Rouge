<x-client-layout>
@section('header')
    <x-client.navbar page="profile" /> 
@endsection
     <!-- User card-->
     <div class="w-7/12 mx-2">
    <div class="w-full bg-cover bg-no-repeat bg-center" style="height: 200px; background-image: url({{asset('imgs/bannerProfile.jpeg')}});">
    </div>
    <div class="p-4 bg-white">
        <div class="relative  flex w-full">
            <!-- Avatar -->
            <div class="flex flex-1">
                <div style="margin-top: -6rem;">
                    <div style="height:9rem; width:9rem;" class="rounded-full relative avatar">
                    @if (Auth::user()->client->image)
                    <img style="height:9rem; width:9rem;" class="rounded-full relative border-4 border-gray-900" src="{{Auth::user()->client->image->path}}" alt="">                       
                    @else
                    @if (Auth::user()->client->gender === 'female')
                    <img style="height:9rem; width:9rem;" class="rounded-full relative border-4 border-gray-900" src="{{asset('imgs/profileFemale.png')}}" alt="">                       
                    @else                       
                    <img style="height:9rem; width:9rem;" class="rounded-full relative border-4 border-gray-900" src="{{asset('imgs/profileMale.png')}}" alt="">                       
                    @endif
                    @endif
                        <div class="absolute"></div>
                    </div>
                </div>
            </div>
                <a href="/edit-profile" class="focus:outline-none " style="text-decoration:none;"> 
                    <div class="px-4 py-2 font-normal rounded-xl border border-blue-600 text-blue-600 hover:text-white hover:bg-blue-600 duration-300 ease-in-out">
                        Edit Profile
                    </div>
                </a>
        </div>

        <!-- Profile info -->
        <div class="space-y-1 justify-center w-full mt-3 ml-3">
            <!-- User basic-->
            <div>
                <h2 class="text-xl leading-6 font-bold ">{{Auth::user()->name}}</h2>
            </div>
            <!-- Description and others -->
            <div class="mt-3">
            @if (Auth::user()->client->bio)
                <p class="leading-tight mb-2">{{ Auth::user()->client->bio }}</p>
            @else
                <a href="#" class="leading-tight mb-2 text-gray-400">Add a bio to tell others about yourself!</a>
            @endif
            <div class="flex space-x-1 "><x-icon name="date" class="pt-1"/> <p>Joined at </p><span class=" font-semibold"> {{ date('F Y', strtotime(Auth::user()->created_at)) }}</span></div>         
            </div>
            <div class="pt-3 flex justify-between px-16 items-center w-full ">
                <div class=" gap-1">
                    <x-icon name="post"/>
                    <p class="text-gray-700">10</p>
                </div>
                <div class=" gap-1">
                    <x-icon name="heart"/>
                    <p class="text-gray-700">13</p>
                </div>
                <div class=" gap-1">
                    <x-icon name="comments"/>
                    <p class="text-gray-700">12</p>
                </div>
            </div>
        </div>
   
    </div>
    <x-client.client-articles  :posts="$posts" />
    
</div>

<x-client.side-cards :genres="$genres" :books="$books" :authors="$authors"/>  
</x-admin-layout>
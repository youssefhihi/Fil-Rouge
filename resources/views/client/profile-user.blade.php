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
                    @if ($user->client->image)
                    <img style="height:9rem; width:9rem;" class="rounded-full relative border-4 border-gray-900" src="{{$client->image->path}}" alt="">                       
                    @else
                    @if ($user->client->gender === 'female')
                    <img style="height:9rem; width:9rem;" class="rounded-full relative border-4 border-gray-900" src="{{asset('imgs/profileFemale.png')}}" alt="">                       
                    @else                       
                    <img style="height:9rem; width:9rem;" class="rounded-full relative border-4 border-gray-900" src="{{asset('imgs/profileMale.png')}}" alt="">                       
                    @endif
                    @endif
                        <div class="absolute"></div>
                    </div>
                </div>
            </div>
               
        </div>

        <!-- Profile info -->
        <div class="space-y-1 justify-center w-full mt-3 ml-3">
            <!-- User basic-->
            <div>
                <h2 class="text-xl leading-6 font-bold ">{{$user->name}}</h2>
            </div>
            <!-- Description and others -->
            <div class="mt-3">
            @if ($user->client->bio)
                <p class="leading-tight mb-2">{{ $user->client->bio }}</p>
            @endif
            <div class="flex space-x-1 "><x-icon name="date" class="pt-1"/> <p>Joined at </p><span class=" font-semibold"> {{ date('F Y', strtotime($user->created_at)) }}</span></div> 
            <div class="flex justify-start space-x-5 my-5">
                @if ( $user->client->linkedIn )                   
                <button class="flex justify-center items-center">
                <a  target="_blanc" href="{{ $user->client->linkedIn }}"  class="group flex justify-center p-2 rounded-md drop-shadow-xl bg-[#0077b5] from-gray-800 text-white font-semibold hover:translate-y-3 hover:rounded-[50%] transition-all duration-500 hover:from-[#331029] hover:to-[#310413]">
                    <x-icon name="linkedIn"/>
                    <span class="absolute opacity-0 group-hover:opacity-100 group-hover:text-gray-700 group-hover:text-sm group-hover:-translate-y-10 duration-700">
                    Linkedin
                    </span>
                </a>
                </button>
                @endif
                @if ($user->client->instagram )
                    
                <button class="flex justify-center items-center">
                    <a target="_blanc" href="{{ $user->client->instagram }}" class="group flex justify-center p-2 rounded-md drop-shadow-xl from-gray-800 bg-[#e331f5] text-white font-semibold hover:translate-y-3 hover:rounded-[50%] transition-all duration-500 hover:from-[#331029] hover:to-[#310413]">
                        <x-icon name="inst"/>
                        <span class="absolute opacity-0 group-hover:opacity-100 group-hover:text-gray-700 group-hover:text-sm group-hover:-translate-y-10 duration-700">
                            Instagram
                        </span>
                    </a>
                </button>
                @endif
                @if ($user->client->facebook )
                    
                <button class="flex justify-center items-center">
                    <a target="_blanc" href="{{ $user->client->facebook }}" class="group flex justify-center p-2 rounded-md drop-shadow-xl from-gray-800 bg-[#316FF6] text-white font-semibold hover:translate-y-3 hover:rounded-[50%] transition-all duration-500 hover:from-[#331029] hover:to-[#310413]">
                        <x-icon name="facebook"/>
                        <span
                        class="absolute opacity-0 group-hover:opacity-100 group-hover:text-gray-700 group-hover:text-sm group-hover:-translate-y-10 duration-700" >
                        Facebook
                        </span>
                    </a>
                </button>
                @endif
                @if ( $user->client->X)
                    
                <button class="flex justify-center items-center">
                    <a target="_blanc" href="{{ $user->client->X }}" class="group flex justify-center p-2 rounded-md drop-shadow-xl bg-gradient-to-r from-gray-800 to-black text-white font-semibold hover:translate-y-3 hover:rounded-[50%] transition-all duration-500 hover:from-[#331029] hover:to-[#310413]">
                    <x-icon name="x"/>
                    <span
                    class="absolute opacity-0 group-hover:opacity-100 group-hover:text-gray-700 group-hover:text-sm group-hover:-translate-y-10 duration-700">
                    X
                    </span>
                    </a>
                </buuton>
                @endif
            </div>
        
            </div>
            <div class="pt-3 flex justify-between px-16 items-center w-full ">
                <div class=" gap-1">
                    <x-icon name="post"/>
                    <p class="text-gray-700 pl-2">{{$postsCount}}</p>
                </div>
                <div class=" gap-1">
                    <x-icon name="heart"/>
                    <p class="text-gray-700 pl-2">{{$countLikes}}</p>
                </div>
                <div class=" gap-1">
                    <x-icon name="comments"/>
                    <p class="text-gray-700 pl-2">11</p>
                </div>
            </div>
        </div>
   
    </div>
    <x-client.client-articles  :posts="$posts" page="userProfile" />
    
</div>
<x-client.side-cards :genres="$genres" :books="$books" :authors="$authors"/>  

</x-admin-layout>
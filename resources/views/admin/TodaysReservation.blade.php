<x-admin-layout>
 <!-- CONTENT -->
 <x-admin.small-nav  Fhref="/dashbord/reservations", Fname="New Reservation" ,Shref="/dashbord/reservations/today",Sname="Today's Reservation"/>

    <table class="min-w-full divide-y divide-gray-200 overflow-x-auto mt-10">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    borrower                
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Book
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Date
                </th>
                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Operations
                </th>
                
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ( $reservations  as $reservation )
                
            <tr>
                 <td class="px-2 py-4 whitespace-nowrap">
                     <div class="flex items-center">
                         <div class="flex-shrink-0">
                         @if ($reservation->client->image)
                         <img class="h-14 w-14 rounded-full" src="{{asset('storage/'. $reservation->client->image->path)}}" alt="">
                        @else
                        @if ($reservation->client->gender === 'female')
                        <img class="h-14 w-14 rounded-full" src="{{asset('imgs/profileFemale.png')}}" alt="">                       
                        @else                       
                        <img class="h-14 w-14 rounded-full" src="{{asset('imgs/profileMale.png')}}" alt="">                       
                        @endif
                        @endif                         </div>
                         <div class="text-sm font-medium text-gray-900 ml-4">
                         {{$reservation->client->user->name}}
                         </div>
                     </div>
                 </td>
                 <td class="px-5 py-4 whitespace-nowrap">
                     <div class="flex items-center">
                         <div class="flex-shrink-0">
                             <img class="h-20 w-14" src="{{asset('storage/' . $reservation->book->image->path)}}" alt="">
                         </div>
                         
                     </div>
                 </td>
                 <td class="px-6 py-4 whitespace-nowrap text-md text-gray-500">
                    @if ($reservation->startDate == $today)                   
                    <span class=" animate-pulse bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-xl">
                        Today
                    </span>
                    @else
                    <span class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded-xl">
                        Tomorrow
                    </span>
                    @endif
                 </td>
                 <td class=" py-10   whitespace-nowrap text-sm text-gray-500"> 
                    <form method="post" action="{{route('reservations.update', $reservation)}}">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class=" bg-transparent flex justify-evenly rounded-xl text-lg border-2 border-green-500 shadow-lg hover:bg-green-500 text-green-500 hover:text-white duration-300 cursor-pointer active:scale-[0.98] px-3 py-1">Taken<x-icon name="accept"/></button>
                    </form>                                  
                 </td>
             </tr>
                      
             
           

            @empty
                nooooooo
            @endforelse
        </tbody>
    </table>
</x-admin-layout>
 <!-- CONTENT -->
 <x-admin-layout>
        <div class = "flex flex-wrap my-5 -mx-2">         
               <x-cards name="Total Users" :count="$usersCount" icon="usersS"/>
               <x-cards name="New Users This Month" :count="$newRegistrations" icon="usersS"/>
               <x-cards name="Daily Posts" :count="$dailyPosts" icon="post"/>
               <x-cards name="Total Books" :count="$booksCount" icon="books"/>
               <x-cards name="Weekly Reservation " :count="$weekReservation" icon="reservation"/>
               <x-cards name="Monthly Reservation" :count="$monthlyReservation" icon="reservation"/>       
        </div>


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
                    Duration
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        @forelse ($reservations as $reservation )

<tr class="{{ !$reservation->is_returned ? 'bg-red-100' : '' }} rounded-sm" >
     <td class="px-2 py-4 whitespace-nowrap">
         <a href="{{route('Profile', $reservation->client->user->username)}}" class="flex items-center">
             <div class="flex-shrink-0">
                @if ($reservation->client->image)
                <img class="h-14 w-14 rounded-full" src="{{asset('storage/'. $reservation->client->image->path)}}" alt="">
                @else
                @if ($reservation->client->gender === 'female')
                <img class="h-14 w-14 rounded-full" src="{{asset('imgs/profileFemale.png')}}" alt="">                       
                @else                       
                <img class="h-14 w-14 rounded-full" src="{{asset('imgs/profileMale.png')}}" alt="">                       
                @endif
                @endif
             </div>
             <div class="text-sm font-medium text-gray-900 ml-4">
                 {{$reservation->client->user->name}}
             </div>
         </a>
     </td>
     <td class="px-5 py-4 whitespace-nowrap">
         <div class="flex items-center">
             <div class="flex-shrink-0">
                 <img class="h-20 w-14" src="{{asset('storage/'. $reservation->book->image->path)}}" alt="">
             </div>

         </div>
     </td>
     <td class="px-6 py-4 whitespace-nowrap text-md text-gray-500">

         <span>{{ $reservation->duration() }} </span> Days
     </td>

 </tr>
@empty
    <tr>
        <td>
            <td>
                no reservation
            </td>
        </td>
    </tr>
@endforelse

        </tbody>
    </table>
      
</x-admin-layout>

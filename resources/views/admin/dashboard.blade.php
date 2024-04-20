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



       <div>
        <table>
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
        <tbody>
            
        </tbody>
        </table>
       </div>
</x-admin-layout>

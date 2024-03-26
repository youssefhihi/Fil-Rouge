<x-admin-layout>
 <!-- CONTENT -->
 
 <div class="flex justify-between p-2 items-center flex-row w-full bg-black rounded-md">

    <form action="" method="" class="relative">
        <input type="text" class="bg-gray-200 text-black px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-800" placeholder="Search Book..">
        <button type="submit">
            <x-icon name="search"/>
        </button>
    </form>
    <div class="ml-3">
        <x-icon name="add"/>
    </div>
</div>


    <table class="min-w-full divide-y divide-gray-200 overflow-x-auto mt-10">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Books
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Genre
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    operations
                </th>
                
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 ">
                            <img class="h-16 w-14 " src="https://i.pravatar.cc/150?img=1" alt="">
                        </div>
                            <div class="text-sm font-medium text-gray-900 ml-4">
                                Jane Cooper
                            </div>
                    </div>
                </td>
            
                <td class="px-6 py-4 whitespace-nowrap">
                    Fiction
                    
                </td>
                <td class="px-6 py-8 flex  space-x-3 whitespace-nowrap text-sm text-gray-500">
                    <x-icon name="delete"/>
                    <a href="/dashboard/edit-book"><x-icon name="update"/> </a> 
                    <x-icon name="details"/>  
                </td>
                
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 ">
                            <img class="h-16 w-14 " src="https://i.pravatar.cc/150?img=1" alt="">
                        </div>
                            <div class="text-sm font-medium text-gray-900 ml-4">
                                Jane Cooper
                            </div>
                    </div>
                </td>
            
                <td class="px-6 py-4 whitespace-nowrap">
                    science
                </td>
                <td class="px-6 py-8 flex  space-x-3 whitespace-nowrap text-sm text-gray-500">
                    <x-icon name="delete"/>
                    <x-icon name="update"/>  
                    <x-icon name="details"/>  
                </td>
                
            </tr>
        </tbody>
    </table>

</x-admin-layout>
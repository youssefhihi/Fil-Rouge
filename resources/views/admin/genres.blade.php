
<x-admin-layout>
 <!-- CONTENT -->

 <title-pages name="Genres"/>
 
    <div class="flex justify-between p-2 items-center flex-row w-full bg-black rounded-md">
        <form action="" method="" class="relative">
            <input type="text" class="bg-gray-300 text-white px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-800" placeholder="Search Book..">
            <button type="submit">
                <x-icon name="search"/>
            </button>
        </form>
        <div class="ml-3">
            <x-icon name="add"/>
        </div>
    </div> 

 <table class="min-w-full overflow-x-scroll divide-y divide-gray-200 mt-6 ">
                        <thead class="bg-gray-300 ">
                            <tr >
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-800 uppercase tracking-wider">
                                    ID
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-800 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-800 uppercase tracking-wider">
                                    Operation
                                </th>
                            </tr>
                        </thead>
                    <tbody class="bg-white divide-y divide-gray-200">   
                        <tr class="hover:shadow-sm hover:bg-gray-100 duration-300">
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="text-sm text-gray-900">#01</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="text-sm font-medium text-gray-900">Fiction</div>
                                </td>
                                
                                <td class="px-6 py-4 flex justify-center space-x-3">
                                    <x-icon name="delete"/>
                                    <x-icon name="update"/>
                                </td>                              
                        </tr>
                        <tr class="hover:shadow-sm hover:bg-gray-100 duration-300">
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="text-sm text-gray-900">#01</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="text-sm font-medium text-gray-900">Fiction</div>
                                </td>
                                
                                <td class="px-6 py-4 flex justify-center space-x-3">
                                    <x-icon name="delete"/>
                                    <x-icon name="update"/>
                                </td>                              
                        </tr>

    </tbody>
</table>

</x-admin-layout>
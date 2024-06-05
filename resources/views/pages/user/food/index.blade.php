<x-app-layout>
     <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
               {{ __('Daftar Makanan') }}
          </h2>
     </x-slot>

     <div class="py-12">
          
     </div>

     <div class="py-3">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
               <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                         <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                   <tr>
                                        <th scope="col" class="px-6 py-3">
                                             Food Group
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                             Food Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                             Energy (kcal)
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                             Action
                                        </th>
                                   </tr>
                              </thead>
                              <tbody>
                                   @foreach ($foods as $item)
                                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                             <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                  {{ $item->foodGroup->name }}
                                             </th>
                                             <td class="px-6 py-4">
                                                  {{ $item->name }}
                                             </td>
                                             <td class="px-6 py-4">
                                                  {{ $item->energy }} Kkal
                                             </td>
                                             <td class="px-6 py-4 flex gap-4">
                                                  <a href="#" class="font-medium text-secondary-600 dark:text-secondary-500 hover:underline">Lihat</a>
                                             </td>
                                        </tr>
                                   @endforeach
                              </tbody>
                         </table>
                    </div>
               </div>
          </div>
     </div>

     <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
               <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                         <div class="m-2 p4">
                              {{ $foods->links() }}
                         </div>
                    </div>
               </div>
          </div>
     </div>

</x-app-layout>
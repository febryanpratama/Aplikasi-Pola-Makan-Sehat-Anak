<x-app-layout>
     <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
               {{ __('Rekomendasi Makanan') }}
          </h2>
     </x-slot>

     <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center">
               <a href="{{ route('user.food_recommendation.index', [$childdren]) }}" class="inline-flex justify-between items-center py-1 px-1 pe-4 mb-7 text-sm text-blue-700 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300 hover:bg-blue-200 dark:hover:bg-blue-800">
               <span class="text-xs bg-blue-600 rounded-full text-white px-4 py-1.5 me-3">Generate</span> <span class="text-sm font-medium">Perbarui Rekomendasi Makanan</span> 
               <svg class="w-2.5 h-2.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
               </svg>
               </a>
               <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Hasil Rekomendasi Makanan</h1>
               <p class="text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-200">Berikut ini merupakan Hasil Rekomendasi Makananan 3 Kali dalam 1 Hari.</p>
               <p class="mb-8 text-sm font-light text-gray-500 lg:text-sm sm:px-16 lg:px-48 dark:text-gray-200">Catatan* : Jika Hasi Rekomendasi Makanan anda tidak sesuai silahkan me-Regerate kembali rekomendasi makanan.</p>
          </div>
     </div>

     @foreach ($recommendations as $index => $foods)
          <div class="py-3">
               <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                         <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                              <div class="">
                                   <div class="flex justify-between items-center px-6 py-4 bg-gray-50 dark:bg-gray-700 border-b dark:border-gray-700">
                                        @switch($index)
                                             @case(0)
                                                  @php
                                                       $name = 'Pagi';
                                                  @endphp
                                                  @break
                                             @case(1)
                                                  @php
                                                       $name = 'Siang';
                                                  @endphp
                                                  @break
                                             @case(2)
                                                  @php
                                                       $name = 'Malam';
                                                  @endphp
                                                  @break
                                             @default
                                                  @php
                                                       $name = 'Tidak Diketahui';
                                                  @endphp
                                        @endswitch
                                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-200">Rekomendasi Makanan {{ $name}}</h2>
                                   </div>
                              </div>
                              
                              <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                   <tbody>
                                        @if(isset($foods) && count($foods) > 0)
                                             @foreach ($foods as $index2 => $item)
                                                  <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                                       <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                                            {{-- Title --}}
                                                            <div class="py-2">
                                                                 <p class="text-sm">Pilihan : {{ ($index2+1) }}</p>
                                                                 <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-200">{{ $item->name }}</h2>
                                                            </div>
                                                            {{-- Description --}}
                                                            <div>
                                                                 {{-- Energy --}}
                                                                 <div class="flex items-center justify-between hr py-0">
                                                                      <p class="text-gray-500 dark:text-gray-400">Energi</p>
                                                                      <p class="text-gray-900 dark:text-gray-200">{{ $item->energy }} Kkal</p>
                                                                 </div>          
                                                                 {{-- Protein --}}
                                                                 <div class="flex items-center justify-between hr py-0">
                                                                      <p class="text-gray-500 dark:text-gray-400">Protein</p>
                                                                      <p class="text-gray-900 dark:text-gray-200">{{ $item->protein }} gr</p>
                                                                 </div>  
                                                                 {{-- Fat --}}
                                                                 <div class="flex items-center justify-between hr py-0">
                                                                      <p class="text-gray-500 dark:text-gray-400">Lemak</p>
                                                                      <p class="text-gray-900 dark:text-gray-200">{{ $item->fat }} gr</p>
                                                                 </div>  
                                                                 {{-- Carbs --}}
                                                                 <div class="flex items-center justify-between hr py-0">
                                                                      <p class="text-gray-500 dark:text-gray-400">Karbohidrat</p>
                                                                      <p class="text-gray-900 dark:text-gray-200">{{ $item->carbohydrates }} gr</p>
                                                                 </div>  
                                                            </div>
                                                       </td>
                                                  </tr>
                                             @endforeach
                                        @else
                                             <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                                  <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                                       <div class="py-2">
                                                            <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-200">Tidak ada rekomendasi makanan</h2>
                                                            <p>Anda dapat me-Regenerate Kembali Rekomendasi Makanan</p>
                                                       </div>
                                                  </td>
                                             </tr>
                                        @endif
                                   </tbody>
                              </table>
                         </div>
                    </div>
               </div>
          </div>
     @endforeach

</x-app-layout>
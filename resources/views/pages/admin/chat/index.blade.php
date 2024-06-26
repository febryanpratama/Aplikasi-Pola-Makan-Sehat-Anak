<x-app-layout>
    <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
              {{ __('Makanan') }}
         </h2>
    </x-slot>

    <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center">
              {{-- <a href="{{ route('user.food_recommendation.create', $children->slug) }}" class="inline-flex justify-between items-center py-1 px-1 pe-4 mb-7 text-sm text-blue-700 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300 hover:bg-blue-200 dark:hover:bg-blue-800">
              <span class="text-xs bg-blue-600 rounded-full text-white px-4 py-1.5 me-3">Baru</span> <span class="text-sm font-medium">Tambah Kelompok Makanan baru</span> 
              <svg class="w-2.5 h-2.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
              </svg>
              </a> --}}
              <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Riwayat Konsultasi</h1>
              <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-200">Berikut ini merupakan Riwayat Konsultasi</p>
              {{-- <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Daftar Kelompok Makanan</h1>
              <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-200">Berikut ini merupakan Rekomendasi Pengelompokan Makanan untuk anak</p> --}}
         </div>
    </div>

    <div class="py-3">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                   <div class="relative overflow-x-auto col col-3 flex justify-center gap-4 shadow-md sm:rounded-lg">
                    {{-- {{ dd($data) }} --}}
                    @foreach ($data as $item)
                        <div class="w-full-sm rounded overflow-hidden shadow-lg bg-white">
                            {{-- <img class="w-full" src="https://via.placeholder.com/400x200" alt="Placeholder Image"> --}}
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">{{ $item->name }}</div>
                                <p class="text-gray-700 text-base">
                                    Konsultasi
                                </p>
                                <a href="{{ url('admin/chat/'.$item->id.'/show') }}">
                                    <button type="submit" class="text-white font-bold bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 me-2 m-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Riwayat</button>
                                </a>
                            </div>
                        </div>
                        
                    @endforeach
                   </div>
              </div>
         </div>
    </div>

</x-app-layout>
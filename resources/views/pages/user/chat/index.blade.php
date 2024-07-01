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
                   <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                    @foreach ($data as $item)
                        
                        @if ($item->role == 'Admin')
                            {{-- Admin --}}
                                <div class="m-2 p-4 flex justify-star">
                                    <img src="https://ui-avatars.com/api/?background=0D8ABC&color=fff" alt="">
                                    <p class="text-lg ml-4">
                                        <span class="font-bold">Admin</span> <br>
                                        {{ $item->chat }}
                                    </p>
                                    {{-- <p class="text-left	">Lorem ipsum dolor sit, amet consectetur adipisicing elit. A molestias odit fuga non in natus.</p> --}}
                                </div>
                            {{-- ENd Admin --}}
                            
                        @else
                            {{-- User --}}
                                <div class="m-2 p-4 flex  justify-end">
                                    <p class="text-lg text-right">
                                        <span class="font-bold">John Doe</span> <br>
                                        {{ $item->chat }}
                                    </p>
                                    <img src="https://ui-avatars.com/api/?background=0D8ABC&color=fff" class="ml-4" alt="">
                                    {{-- <p class="text-left	">Lorem ipsum dolor sit, amet consectetur adipisicing elit. A molestias odit fuga non in natus.</p> --}}
                                </div>
                            {{-- ENd User --}}
                            
                        @endif
                    @endforeach
                   </div>
                   <form action="{{ route('user.chat.store') }}" method="POST">
                        @csrf
                        <div class="p-4 mb-4">
                            {{-- Tinggi --}}
                            <div >
                                {{-- <x-input-label for="height" :value="__('Target Tinggi Anak')" /> --}}
                                <x-text-input id="text" class="block mt-1 w-full" type="text" name="text" :value="old('text')" required autofocus autocomplete="text" placeholder="Text Konsultasi" />
                                <x-input-error :messages="$errors->get('text')" class="mt-2"/>
                            </div>
                        </div>
                        <div class="flex justify-end gap-4">
                            <button type="submit" class="text-white font-bold bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 me-2 m-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah</button>
                       </div>
                   </form>
              </div>
         </div>
    </div>

</x-app-layout>
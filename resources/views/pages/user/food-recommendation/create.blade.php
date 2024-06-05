<x-app-layout>
     <!-- Title -->
     <x-slot name="title">
          {{ __(Auth::user()->name.' '.'Tambah Kelompok Makanan') }}
     </x-slot>

     <!-- Head -->
     <x-slot name="head">
          {{-- Ck Editor --}}
          <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

          <style>
               .ck-editor__editable_inline {
                    min-height: 300px;
               }
               .ck-content .image {
                    /* block images */
                    max-width: 80%;
                    margin: 20px auto;
               }
          </style>
     </x-slot>

     <!-- Foot -->
     <x-slot name="foot">
          <script>
               // CKEditor
               ClassicEditor
                    .create( document.querySelector( '#description' ), {
                         // toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo' ],
                         placeholder: 'Isi Informasi Dasar Lokasi Disini...',
                         ckfinder: {
                              uploadUrl: '{{ route("admin.food_group.image", ["_token" => csrf_token()])  }}'
                         },
                    } )
                    .catch( error => {
                         console.error( error );
                    } );
          </script>
     </x-slot>

     <!-- Header -->
     <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
               {{ __('Tambah Kelompok Makanan') }}
          </h2>
     </x-slot>

     {{-- <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
               <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                         <div class="flex align-baseline justify-between">
                              <div>
                                   <div class="p-4 text-gray-900 dark:text-gray-100">
                                        <h5 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                             {{ __("Tambah Kelompok Makanan") }}
                                        </h5>
                                   </div>
                              </div>
                              <div>
                                   <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 m-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah</button>
                              </div>
                         </div>          
                    </div>
               </div>
          </div>
     </div> --}}

     <!-- Content -->
     <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
               <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                         
                         <form class="w-full mx-auto p-4" action="{{ route('user.food_recommendation.store', $children->slug) }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              @method('POST')

                              {{-- Card Info Children --}}
                              <div class="mb-4">
                                   <div class="flex items-center gap-4 border-2 shadow p-2">
                                        <div class="flex-shrink-0">
                                             <img class="h-24 w-24 rounded-full" src="{{ $children->avatar }}" alt="{{ $children->name }}">
                                        </div>
                                        <div class="flex-1 min-w-0">
                                             <p class="text-xl font-medium text-gray-900 dark:text-gray-200">
                                                  {{ $children->name }}
                                             </p>
                                             <p class="text-sm text-gray-500 dark:text-gray-400">
                                                  {{ $children->place }}, {{ $children->birthdate }}
                                             </p>
                                        </div>
                                        <div class="flex-shrink-0">
                                             <a href="{{ route('user.children.edit', $children->slug) }}" class="text-white font-bold bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-10 py-2.5 me-2 m-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Edit</a>
                                        </div>
                                   </div>
                              </div>

                              {{-- Target  --}}
                              <div class="mb-4">
                                   {{-- Tinggi --}}
                                   <div class="py-2">
                                        <x-input-label for="height" :value="__('Target Tinggi Anak')" />
                                        <x-text-input id="height" class="block mt-1 w-full" type="number" name="height" :value="old('height')" required autofocus autocomplete="height" placeholder="Tulis Target Tinggi Badan Anak" />
                                        <x-input-error :messages="$errors->get('height')" class="mt-2"/>
                                   </div>
                                        
                                   {{-- Berat --}}
                                   <div class="py-2">
                                        <x-input-label for="weight" :value="__('Target Berat Anak')" />
                                        <x-text-input id="weight" class="block mt-1 w-full" type="number" name="weight" :value="old('weight')" required autofocus autocomplete="weight" placeholder="Tulis Target Berat Badan Anak" />
                                        <x-input-error :messages="$errors->get('weight')" class="mt-2"/>
                                   </div>

                                   {{-- Tipe Anak --}}
                                   <div class="py-2">
                                        <x-input-label for="type" :value="__('Tipe Anak')" />
                                        <select id="type" name="type" class="block w-full mt-1 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-gray-800 dark:text-gray-300 focus:ring-blue-300 focus:ring-2 focus:outline-none">
                                             <option value="" selected disabled>Pilih Tipe Anak</option>
                                             {{-- Pendiam --}}
                                             <option value="Pasif">Pendiam</option>
                                             {{-- Aktif --}}
                                             <option value="Aktif">Aktif</option>
                                        </select>
                                        <x-input-error :messages="$errors->get('type')" class="mt-2"/>
                                   </div>

                                   {{-- Food Group --}}
                                   <div class="py-2">
                                        <x-input-label for="food_group" :value="__('Kelompok Makanan')" />
                                        <select id="food_group" name="food_group" class="block w-full mt-1 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-gray-800 dark:text-gray-300 focus:ring-blue-300 focus:ring-2 focus:outline-none">
                                             <option value="" selected disabled>Semua</option>
                                             @foreach ($foodGroups as $food_group)
                                                  <option value="{{ $food_group->id }}">{{ $food_group->name }}</option>
                                             @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('food_group')" class="mt-2"/>
                                   </div>
                              </div>

                              <div class="pt-6 flex justify-end gap-4">
                                   <a href="{{ route('user.food_recommendation.index', $children->slug) }}" class="text-white font-bold bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-10 py-2.5 me-2 m-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Kembali</a>

                                   <button type="submit" class="text-white font-bold bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 me-2 m-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah</button>
                              </div>
                         </form>

                    </div>
               </div>
          </div>
     </div>

</x-app-layout>
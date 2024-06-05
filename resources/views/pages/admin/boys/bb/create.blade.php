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
                         
                         <form class="w-full mx-auto p-4" action="{{ route('admin.boys.weight.store') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              @method('POST')

                              <div class="py-2">
                                   <x-input-label for="old" :value="__('Umur')" />
                                   <x-text-input id="old" class="block mt-1 w-full" type="number" name="old" :value="old('old')" required autofocus autocomplete="old" placeholder="Tulis Nama Kelompok Makanan" />
                                   <x-input-error :messages="$errors->get('old')" class="mt-2" />
                              </div>

                              {{-- Blok 4 --}}
                              <div class="grid grid-cols-3 gap-2">
                                   <div class="py-2">
                                        <x-input-label for="minus_3_sd" :value="__('-3SD')" />
                                        <x-text-input id="minus_3_sd" class="block mt-1 w-full" type="number" name="minus_3_sd" :value="old('minus_3_sd')" required autofocus autocomplete="minus_3_sd" placeholder="Minus 3 SD" />
                                        <x-input-error :messages="$errors->get('minus_3_sd')" class="mt-2" />
                                   </div>
                                   
                                   <div class="py-2">
                                        <x-input-label for="minus_2_sd" :value="__('-2SD')" />
                                        <x-text-input id="minus_2_sd" class="block mt-1 w-full" type="number" name="minus_2_sd" :value="old('minus_2_sd')" required autofocus autocomplete="minus_2_sd" placeholder="Minus 2 SD" />
                                        <x-input-error :messages="$errors->get('minus_2_sd')" class="mt-2" />
                                   </div>

                                   <div class="py-2">
                                        <x-input-label for="minus_1_sd" :value="__('-1SD')" />
                                        <x-text-input id="minus_1_sd" class="block mt-1 w-full" type="number" name="minus_1_sd" :value="old('minus_1_sd')" required autofocus autocomplete="minus_1_sd" placeholder="Minus 1 SD" />
                                        <x-input-error :messages="$errors->get('minus_1_sd')" class="mt-2" />
                                   </div>
                              </div>

                              <div class="grid grid-cols-1 gap-2">
                                   <div class="py-2">
                                        <x-input-label for="median" :value="__('Median')" />
                                        <x-text-input id="median" class="block mt-1 w-full" type="number" name="median" :value="old('median')" required autofocus autocomplete="median" placeholder="Median" />
                                        <x-input-error :messages="$errors->get('median')" class="mt-2" />
                                   </div>
                              </div>

                              <div class="grid grid-cols-3 gap-2">
                                   <div class="py-2">
                                        <x-input-label for="plus_3_sd" :value="__('+3SD')" />
                                        <x-text-input id="plus_3_sd" class="block mt-1 w-full" type="number" name="plus_3_sd" :value="old('plus_3_sd')" required autofocus autocomplete="plus_3_sd" placeholder="Plus 3 SD" />
                                        <x-input-error :messages="$errors->get('plus_3_sd')" class="mt-2" />
                                   </div>
                                   
                                   <div class="py-2">
                                        <x-input-label for="plus_2_sd" :value="__('+2SD')" />
                                        <x-text-input id="plus_2_sd" class="block mt-1 w-full" type="number" name="plus_2_sd" :value="old('plus_2_sd')" required autofocus autocomplete="plus_2_sd" placeholder="Plus 2 SD" />
                                        <x-input-error :messages="$errors->get('plus_2_sd')" class="mt-2" />
                                   </div>

                                   <div class="py-2">
                                        <x-input-label for="plus_1_sd" :value="__('+1SD')" />
                                        <x-text-input id="plus_1_sd" class="block mt-1 w-full" type="number" name="plus_1_sd" :value="old('plus_1_sd')" required autofocus autocomplete="plus_1_sd" placeholder="Plus 1 SD" />
                                        <x-input-error :messages="$errors->get('plus_1_sd')" class="mt-2" />
                                   </div>
                              </div>

                              <div class="grid grid-cols-4 gap-2">
                                   <div class="py-2">
                                        <x-input-label for="standar_protein" :value="__('Standar Protein')" />
                                        <x-text-input id="standar_protein" class="block mt-1 w-full" type="number" name="standar_protein" :value="old('standar_protein')" required autofocus autocomplete="standar_protein" placeholder="Standar Protein" />
                                        <x-input-error :messages="$errors->get('standar_protein')" class="mt-2" />
                                   </div>
                                   
                                   <div class="py-2">
                                        <x-input-label for="standart_energy" :value="__('Standar Energy')" />
                                        <x-text-input id="standart_energy" class="block mt-1 w-full" type="number" name="standart_energy" :value="old('standart_energy')" required autofocus autocomplete="standart_energy" placeholder="Standar Energy" />
                                        <x-input-error :messages="$errors->get('standart_energy')" class="mt-2" />
                                   </div>

                                   <div class="py-2">
                                        <x-input-label for="standart_lemak" :value="__('Standar Lemak')" />
                                        <x-text-input id="standart_lemak" class="block mt-1 w-full" type="number" name="standart_lemak" :value="old('standart_lemak')" required autofocus autocomplete="standart_lemak" placeholder="Standar Lemak" />
                                        <x-input-error :messages="$errors->get('standart_lemak')" class="mt-2" />
                                   </div>

                                   <div class="py-2">
                                        <x-input-label for="standart_carbohydrat" :value="__('Standar Karbohidrat')" />
                                        <x-text-input id="standart_carbohydrat" class="block mt-1 w-full" type="number" name="standart_carbohydrat" :value="old('standart_carbohydrat')" required autofocus autocomplete="standart_carbohydrat" placeholder="Standar Karbohidrat" />
                                        <x-input-error :messages="$errors->get('standart_carbohydrat')" class="mt-2" />
                                   </div>
                              </div>

                              <!-- Description -->
                              <div class="py-2">
                                   <x-input-label for="description" :value="__('Description')"/>
                                   <textarea name="description" id="description" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm h-100">{{ old('description') }}</textarea>
                                   <x-input-error :messages="$errors->get('description')" class="mt-2" />
                              </div>

                              <div class="pt-6 flex justify-end gap-4">
                                   <a href="{{ route('admin.food_group.index') }}" class="text-white font-bold bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-10 py-2.5 me-2 m-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Kembali</a>

                                   <button type="submit" class="text-white font-bold bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 me-2 m-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah</button>
                              </div>
                         </form>

                    </div>
               </div>
          </div>
     </div>

</x-app-layout>
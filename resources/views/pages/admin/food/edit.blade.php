<x-app-layout>
     <!-- Title -->
     <x-slot name="title">
          {{ __(Auth::user()->name.' '.'Ubah Kelompok Makanan') }}
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
                         placeholder: 'Isi Informasi Dasar Disini...',
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
                         
                         <form class="w-full mx-auto p-4" action="{{ route('admin.food.update', [$food->slug]) }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              @method('PATCH')

                              {{-- Food Groups --}}
                              <div class="py-2">
                                   <x-input-label for="food_group_id" :value="__('Kelompok Makanan')" />
                                   <select name="food_group_id" id="food_group_id" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                        {{-- <option value="">Pilih Kelompok Makanan</option> --}}
                                        @foreach ($food_groups as $food_group)
                                             <option value="{{ $food_group->id }}"
                                                  @if ($food_group->id === old('food_group_id') || $food_group->id === $food->food_group_id)
                                                       selected
                                                  @endif
                                                  >{{ $food_group->name }}</option>
                                        @endforeach
                                   </select>
                                   <x-input-error :messages="$errors->get('food_group_id')" class="mt-2" />
                              </div>

                              <div class="py-2">
                                   <x-input-label for="name" :value="__('Nama Makanan')" />
                                   <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Tulis Nama Kelompok Makanan" />
                                   <x-input-error :messages="$errors->get('name')" class="mt-2" />
                              </div>

                              <div class="py-2">
                                   <x-input-label for="image" :value="__('Gambar Makanan')" />
                                   <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required autofocus autocomplete="image" placeholder="Tulis Nama Kelompok Makanan" />
                                   <x-input-error :messages="$errors->get('image')" class="mt-2" />
                              </div>

                              {{-- Blok 4 --}}
                              <div class="grid grid-cols-4 gap-2">
                                   <div class="py-2">
                                        <x-input-label for="energy" :value="__('ENERGY')" />
                                        <x-text-input id="energy" class="block mt-1 w-full" type="number" name="energy" :value="old('energy')" required autofocus autocomplete="energy" placeholder="Tingkat Energy" />
                                        <x-input-error :messages="$errors->get('energy')" class="mt-2" />
                                   </div>
                                   
                                   <div class="py-2">
                                        <x-input-label for="protein" :value="__('PROTEIN')" />
                                        <x-text-input id="protein" class="block mt-1 w-full" type="number" name="protein" :value="old('protein')" required autofocus autocomplete="protein" placeholder="Tingkat Protein" />
                                        <x-input-error :messages="$errors->get('protein')" class="mt-2" />
                                   </div>

                                   <div class="py-2">
                                        <x-input-label for="fats" :value="__('FATS')" />
                                        <x-text-input id="fats" class="block mt-1 w-full" type="number" name="fats" :value="old('fats')" required autofocus autocomplete="fats" placeholder="Tingkat Fats" />
                                        <x-input-error :messages="$errors->get('fats')" class="mt-2" />
                                   </div>

                                   <div class="py-2">
                                        <x-input-label for="carbhdrt" :value="__('CARBHDRT')" />
                                        <x-text-input id="carbhdrt" class="block mt-1 w-full" type="number" name="carbhdrt" :value="old('carbhdrt')" required autofocus autocomplete="carbhdrt" placeholder="Tingkat Carbhdrt" />
                                        <x-input-error :messages="$errors->get('carbhdrt')" class="mt-2" />
                                   </div>
                              </div>

                              <div class="grid grid-cols-4 gap-2">
                                   <div class="py-2">
                                        <x-input-label for="calcium" :value="__('CALCIUM')" />
                                        <x-text-input id="calcium" class="block mt-1 w-full" type="number" name="calcium" :value="old('calcium')" required autofocus autocomplete="calcium" placeholder="Tingkat Calcium" />
                                        <x-input-error :messages="$errors->get('calcium')" class="mt-2" />
                                   </div>
                                   
                                   <div class="py-2">
                                        <x-input-label for="phospor" :value="__('PHOSPHOR')" />
                                        <x-text-input id="phospor" class="block mt-1 w-full" type="number" name="phospor" :value="old('phospor')" required autofocus autocomplete="phospor" placeholder="Tingkat Phospor" />
                                        <x-input-error :messages="$errors->get('phospor')" class="mt-2" />
                                   </div>

                                   <div class="py-2">
                                        <x-input-label for="iron" :value="__('IRON')" />
                                        <x-text-input id="iron" class="block mt-1 w-full" type="number" name="iron" :value="old('iron')" required autofocus autocomplete="iron" placeholder="Tingkat Iron" />
                                        <x-input-error :messages="$errors->get('iron')" class="mt-2" />
                                   </div>

                                   <div class="py-2">
                                        <x-input-label for="vita" :value="__('VITA')" />
                                        <x-text-input id="vita" class="block mt-1 w-full" type="number" name="vita" :value="old('vita')" required autofocus autocomplete="vita" placeholder="Tingkat Vita" />
                                        <x-input-error :messages="$errors->get('vita')" class="mt-2" />
                                   </div>
                              </div>

                              <div class="grid grid-cols-4 gap-2">
                                   <div class="py-2">
                                        <x-input-label for="vitb1" :value="__('VITB1')" />
                                        <x-text-input id="vitb1" class="block mt-1 w-full" type="number" name="vitb1" :value="old('vitb1')" required autofocus autocomplete="vitb1" placeholder="Tingkat Vitb1" />
                                        <x-input-error :messages="$errors->get('vitb1')" class="mt-2" />
                                   </div>
                                   
                                   <div class="py-2">
                                        <x-input-label for="vitc" :value="__('VITC')" />
                                        <x-text-input id="vitc" class="block mt-1 w-full" type="number" name="vitc" :value="old('vitc')" required autofocus autocomplete="vitc" placeholder="Tingkat Vitc" />
                                        <x-input-error :messages="$errors->get('vitc')" class="mt-2" />
                                   </div>

                                   <div class="py-2">
                                        <x-input-label for="f_edibleBDD" :value="__('F-EDIBLE (BDD)')" />
                                        <x-text-input id="f_edibleBDD" class="block mt-1 w-full" type="number" name="f_edibleBDD" :value="old('f_edibleBDD')" required autofocus autocomplete="f_edibleBDD" placeholder="Tingkat F-EDIBLE (BDD)" />
                                        <x-input-error :messages="$errors->get('f_edibleBDD')" class="mt-2" />
                                   </div>

                                   <div class="py-2">
                                        <x-input-label for="f_weight" :value="__('F-WEIGHT')" />
                                        <x-text-input id="f_weight" class="block mt-1 w-full" type="number" name="f_weight" :value="old('f_weight')" required autofocus autocomplete="f_weight" placeholder="Tingkat F-WEIGHT" />
                                        <x-input-error :messages="$errors->get('f_weight')" class="mt-2" />
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
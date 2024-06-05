<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Debugging
        // dd('Hello World!');

        // Set Alert
        // Alert::success('Success Title', 'Success Message');

        // Get All Foods
        $foods = \App\Models\Food::cursorPaginate(10);

        // Return a view
        return view('pages.admin.food.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Debugging
        // dd('Hello World!');

        try {
            // Get All Food_Groups
            $food_groups = \App\Models\FoodGroup::all();
        } catch (\Throwable $th) {
            //throw $th;

            // Set Alert
            Alert::error('Kesalahan', 'Data Kelompok Makanan Tidak Ditemukan!');

            // Redirect
            return redirect()->route('admin.food.index');
        }

        // Return a view
        return view('pages.admin.food.create', compact('food_groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Debugging
        // dd($request->all());

        // Validate the request
        $validator = \Validator::make(
            $request->all(),
            [
                // _token
                '_token' => 'required',
                // _method | POST
                '_method' => 'required',
                // food_group_id
                'food_group_id' => 'required',
                // name
                'name' => 'required',
                // energy
                'energy' => 'required',
                // protein
                'protein' => 'required',
                // fats
                'fats' => 'required',
                // carbhdrt
                'carbhdrt' => 'required',
                // calcium
                'calcium' => 'required',
                // phospor
                'phospor' => 'required',
                // iron
                'iron' => 'required',
                // vita
                'vita' => 'required',
                // vitb1
                'vitb1' => 'required',
                // vitc
                'vitc' => 'required',
                // f_edibleBDD
                'f_edibleBDD' => 'required',
                // f_weight
                'f_weight' => 'required',
                // description
                'description' => 'required',
                // image
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                // _token
                '_token.required' => 'Token Dibutuhkan!',
                // _method
                '_method.required' => 'Method Dibutuhkan!',
                // food_group_id
                'food_group_id.required' => 'Kelompok Makanan Dibutuhkan!',
                // name
                'name.required' => 'Nama Dibutuhkan!',
                // energy
                'energy.required' => 'Energi Dibutuhkan!',
                // protein
                'protein.required' => 'Protein Dibutuhkan!',
                // fats
                'fats.required' => 'Lemak Dibutuhkan!',
                // carbhdrt
                'carbhdrt.required' => 'Karbohidrat Dibutuhkan!',
                // calcium
                'calcium.required' => 'Kalsium Dibutuhkan!',
                // phospor
                'phospor.required' => 'Fosfor Dibutuhkan!',
                // iron
                'iron.required' => 'Zat Besi Dibutuhkan!',
                // vita
                'vita.required' => 'Vitamin A Dibutuhkan!',
                // vitb1
                'vitb1.required' => 'Vitamin B1 Dibutuhkan!',
                // vitc
                'vitc.required' => 'Vitamin C Dibutuhkan!',
                // f_edibleBDD
                'f_edibleBDD.required' => 'BDD Dibutuhkan!',
                // f_weight
                'f_weight.required' => 'Berat Dibutuhkan!',
                // description
                'description.required' => 'Deskripsi Dibutuhkan!',
                // image
                'image.required' => 'Gambar Dibutuhkan!',
                'image.image' => 'Gambar Harus Berupa Gambar!',
                'image.mimes' => 'Gambar Harus Berupa: jpeg, png, jpg, gif, svg!',
                'image.max' => 'Gambar Maksimal 2048 KB!',
            ]
        );

        // Check the validator
        if ($validator->fails()) {
            // Set Alert
            Alert::error('Kesalahan', $validator->errors()->first());

            // Redirect
            return redirect()->route('admin.food.create');
        }

        // Upload Image
        try {
            //code...
            // Rename Image File
            $image_name = \Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();

            // Store Thumbnail
            Storage::putFileAs('public/image/', $request->file('image'), $image_name);
        } catch (\Throwable $th) {
            //throw $th;
            Alert::error('Error', 'Gagal Mengolah Gambar!');
            return redirect()->route('admin.food.create')->withErrors($validator)->withInput();
        }

        // Create Food
        try {
            // Create Food
            $food = new \App\Models\Food();
            // Food Group ID
            $food->food_group_id = $request->food_group_id;
            // Name
            $food->name = $request->name;
            // Slug
            $food->slug = \Str::slug($request->name);
            // Description
            $food->description = $request->description;
            // Image
            $food->image = $image_name;
            // Energy
            $food->energy = $request->energy;
            // Protein
            $food->protein = $request->protein;
            // Fat
            $food->fat = $request->fats;
            // Carbohydrates
            $food->carbohydrates = $request->carbhdrt;
            // Calcium
            $food->calcium = $request->calcium;
            // Phosphorus
            $food->phosphorus = $request->phospor;
            // Iron
            $food->iron = $request->iron;
            // Vitamin A
            $food->vitamin_a = $request->vita;
            // Vitamin B1
            $food->vitamin_b1 = $request->vitb1;
            // Vitamin C
            $food->vitamin_c = $request->vitc;
            // F-Edible (BDD)
            $food->f_edible = $request->f_edibleBDD;
            // F-Weight 
            $food->f_weight = $request->f_weight;
            // Save Food
            $food->save();

            // Set Alert
            Alert::success('Sukses', 'Data ' . $food->name . ' Berhasil Ditambahkan!');
            return redirect()->route('admin.food.index');
        } catch (\Throwable $th) {
            // throw $th;
            // Set Alert
            Alert::error('Kesalahan', 'Gagal Menambahkan Data ' . $request->name . '!');

            // Redirect
            return redirect()->route('admin.food.create')->withErrors($validator)->withInput();
        }

        // Set Alert
        Alert::warning('Perhatian', 'Perintah Tidak Dikenali!');

        // Redirect to Index
        return redirect()->route('admin.food.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        // Debugging    
        // dd($slug);

        try {
            //code...
            // Get Food by Slug
            $food = \App\Models\Food::where('slug', $slug)->firstOrFail();

            // Check Food
            if (!$food) {
                // Set Alert
                Alert::error('Kesalahan', 'Permintaan Tidak Ditemukan!');

                // Redirect
                return redirect()->route('admin.food.index');
            }

            try {
                //code...
                // Get All Food_Groups
                $food_groups = \App\Models\FoodGroup::all();
            } catch (\Throwable $th) {
                //throw $th;
                // Set Alert
                Alert::error('Kesalahan', 'Data Kelompok Makanan Tidak Ditemukan!');

                // Redirect
                return redirect()->route('admin.food.index');
            }

            // Return a view
            return view('pages.admin.food.edit', compact('food', 'food_groups'));
        } catch (\Throwable $th) {
            //throw $th;
            // Set Alert
            Alert::error('Kesalahan', 'Permintaan Tidak Ditemukan!');

            // Redirect
            return redirect()->route('admin.food.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        // Debugging
        // dd($slug);

        // Get Food by Slug
        $food = \App\Models\Food::where('slug', $slug)->firstOrFail();

        // Check Food
        if (!$food) {
            // Set Alert
            Alert::error('Kesalahan', 'Data Tidak Ditemukan!');

            // Redirect
            return redirect()->route('admin.food.index');
        }

        // Delete Food
        try {
            // Delete Food
            $food->delete();

            // Set Alert
            Alert::success('Sukses', 'Data ' . $food->name . ' Berhasil Dihapus!');

            // Redirect
            return redirect()->route('admin.food.index');
        } catch (\Throwable $th) {
            //throw $th;
            // Set Alert
            Alert::error('Kesalahan', 'Gagal Menghapus Data ' . $food->name . '!');

            // Redirect
            return redirect()->route('admin.food.index');
        }
    }

    /**
     * Store Image
     */
    public function image(Request $request)
    {
        // Debugging
        // dd($request->all());
    }

    /**
     * Search
     */
    public function search(Request $request)
    {
        // Debugging
        // dd($request->all());

        // Validate the request
        $validator = Validator::make(
            $request->all(),
            [
                // _token
                '_token' => 'required',
                // _method | POST
                '_method' => 'required',
                // search
                'search' => 'required|string|max:255|regex:/^[a-zA-Z0-9\s]+$/',
            ],
            [
                // _token
                '_token.required' => 'Token Dibutuhkan!',
                // _method
                '_method.required' => 'Method Dibutuhkan!',
                // search
                'search.required' => 'Kata Kunci Dibutuhkan!',
                'search.string' => 'Kata Kunci Harus Berupa String!',
                'search.max' => 'Kata Kunci Maksimal 255 Karakter!',
                'search.regex' => 'Kata Kunci Harus Berupa Huruf dan Angka!',
            ]
        );

        // Check the validator
        if ($validator->fails()) {
            // Set Alert
            Alert::error('Kesalahan', $validator->errors()->first());

            // Redirect
            return redirect()->route('admin.food.index');
        }

        // Search Foods
        try {
            //code...
            // Get All Foods
            $foods = \App\Models\Food::where('name', 'like', '%' . $request->search . '%')->orWhere('description', 'like', '%' . $request->search . '%')->cursorPaginate(10);

            // Check Foods
            if ($foods->isEmpty()) {
                // Set Alert
                Alert::info('Informasi', 'Data Tidak Ditemukan!');

                // Redirect
                return redirect()->route('admin.food.index');
            }

            // Return a view
            return view('pages.admin.food.index', compact('foods'));
        } catch (\Throwable $th) {
            //throw $th;
            // Set Alert
            Alert::error('Kesalahan', 'Data Tidak Ditemukan!');

            // Redirect
            return redirect()->route('admin.food.index');
        }
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
// use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ChildrenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Debugging
        // dd('ChildrenController@index', auth()->user());

        // Get All Childrens
        $childrens = \App\Models\Children::where('user_id', auth()->user()->id)->paginate(10);

        // Debugging
        // dd($childrens);

        // Return View
        return view('pages.user.children.index', compact('childrens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Debugging
        // dd('User Create');

        // Return View
        return view('pages.user.children.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Debugging
        // dd('Store', $request->all());

        // Validate Request with Validator
        $validator = \Validator::make($request->all(), [
            // _token
            '_token' => 'required|string',
            // _method
            '_method' => 'required|string',
            // name
            'name' => 'required|string',
            // gander
            'gander' => 'required',
            // birhdate
            'birhdate' => 'required|date',
            // place
            'place' => 'required|string',
            // blood
            'blood' => 'required',
            // height
            'height' => 'required|integer',
            // weight
            'weight' => 'required|integer',
            // notes
            'notes' => 'required|string',
            // avatar
            'avatar' => 'required|image',
        ], [
            // _token
            '_token.required' => 'Token Dibutuhkan',
            '_token.string' => 'Token Harus String',
            // _method
            '_method.required' => 'Method Dibutuhkan',
            '_method.string' => 'Method Harus String',
            // name
            'name.required' => 'Nama Dibutuhkan',
            'name.string' => 'Nama Harus String',
            // gander
            'gander.required' => 'Jenis Kelamin Dibutuhkan',
            // birhdate
            'birhdate.required' => 'Tanggal Lahir Dibutuhkan',
            'birhdate.date' => 'Tanggal Lahir Harus Tanggal',
            // place
            'place.required' => 'Tempat Lahir Dibutuhkan',
            'place.string' => 'Tempat Lahir Harus String',
            // blood
            'blood.required' => 'Golongan Darah Dibutuhkan',
            // height
            'height.required' => 'Tinggi Badan Dibutuhkan',
            'height.integer' => 'Tinggi Badan Harus Angka',
            // weight
            'weight.required' => 'Berat Badan Dibutuhkan',
            'weight.integer' => 'Berat Badan Harus Angka',
            // notes
            'notes.required' => 'Catatan Dibutuhkan',
            'notes.string' => 'Catatan Harus String',
            // avatar
            'avatar.required' => 'Avatar Dibutuhkan',
            'avatar.image' => 'Avatar Harus Gambar',
        ]);

        // Check Validator Fails
        if ($validator->fails()) {
            // Set Alert Error
            Alert::error('Gagal', $validator->errors()->first());
            // Return a view
            return redirect()->back()->withInput();
        }

        // Upload Image
        try {
            //code...
            // Rename Image File
            $image_name = \Str::random(10) . '.' . $request->file('avatar')->getClientOriginalExtension();

            // Store Thumbnail
            Storage::putFileAs('public/avatar/', $request->file('avatar'), $image_name);
        } catch (\Throwable $th) {
            throw $th;
            Alert::error('Error', 'Gagal Mengolah Gambar!');
            return redirect()->route('user.children.create')->withErrors($validator)->withInput();
        }

        // Debugging
        // dd($request->all());

        // Insert Children from Request data to Database
        $children = new \App\Models\Children();
        try {
            //code...
            // user_id
            $children->user_id = auth()->user()->id;
            // name
            $children->name = $request->name;
            // slug
            $children->slug = \Str::slug($request->name);
            // avatar
            $children->avatar = $image_name ?? $children->avatar;
            // gander
            $children->gander = $request->gander;
            // birthdate
            $children->birthdate = $request->birhdate;
            // place
            $children->place = $request->place;
            // blood_type
            $children->blood_type = $request->blood;
            // height
            $children->height = $request->height;
            // weight
            $children->weight = $request->weight;
            // notes
            $children->notes = $request->notes;
            // allergies
            // chronic_diseases
            //  Save
            $children->save();
            // Set Alert Success
            Alert::success('Berhasil', 'Data Berhasil Ditambahkan');

            // Return a view
            return redirect()->route('user.children.index');
        } catch (\Throwable $th) {
            throw $th;
            // Set Alert Error
            Alert::error('Gagal', 'Data Gagal Ditambahkan');

            // Return a view\
            return redirect()->route('user.children.index');
        }

        // Set Alert Warning
        Alert::warning('Peringatan', 'Data Tidak Ditambahkan');
        // Return a view
        return redirect()->route('user.children.index');
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
        // dd('Edit', $slug);

        // Select Children from Request data to Database
        $children = \App\Models\Children::where('slug', $slug)->firstOrFail();

        // Return a view
        return view('pages.user.children.edit', compact('children'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        // Debugging
        // dd('Store', $request->all(), $slug);

        // Validate Request with Validator
        $validator = \Validator::make($request->all(), [
            // _token
            '_token' => 'required|string',
            // _method
            '_method' => 'required|string',
            // name
            'name' => 'required|string',
            // gander
            'gander' => 'required',
            // birhdate
            'birhdate' => 'required|date',
            // place
            'place' => 'required|string',
            // blood
            'blood' => 'required',
            // height
            'height' => 'required|integer',
            // weight
            'weight' => 'required|integer',
            // notes
            'notes' => 'required|string',
            // avatar
            'avatar' => 'required|image',
        ], [
            // _token
            '_token.required' => 'Token Dibutuhkan',
            '_token.string' => 'Token Harus String',
            // _method
            '_method.required' => 'Method Dibutuhkan',
            '_method.string' => 'Method Harus String',
            // name
            'name.required' => 'Nama Dibutuhkan',
            'name.string' => 'Nama Harus String',
            // gander
            'gander.required' => 'Jenis Kelamin Dibutuhkan',
            // birhdate
            'birhdate.required' => 'Tanggal Lahir Dibutuhkan',
            'birhdate.date' => 'Tanggal Lahir Harus Tanggal',
            // place
            'place.required' => 'Tempat Lahir Dibutuhkan',
            'place.string' => 'Tempat Lahir Harus String',
            // blood
            'blood.required' => 'Golongan Darah Dibutuhkan',
            // height
            'height.required' => 'Tinggi Badan Dibutuhkan',
            'height.integer' => 'Tinggi Badan Harus Angka',
            // weight
            'weight.required' => 'Berat Badan Dibutuhkan',
            'weight.integer' => 'Berat Badan Harus Angka',
            // notes
            'notes.required' => 'Catatan Dibutuhkan',
            'notes.string' => 'Catatan Harus String',
            // avatar
            'avatar.required' => 'Avatar Dibutuhkan',
            'avatar.image' => 'Avatar Harus Gambar',
        ]);

        // Check Validator Fails
        if ($validator->fails()) {
            // Set Alert Error
            Alert::error('Gagal', $validator->errors()->first());
            // Return a view
            return redirect()->back()->withInput();
        }

        // Check Image
        if ($request->hasFile('avatar')) {
            // Upload Image
            try {
                //code...
                // Rename Image File
                $image_name = \Str::random(10) . '.' . $request->file('avatar')->getClientOriginalExtension();

                // Store Thumbnail
                Storage::putFileAs('public/avatar/', $request->file('avatar'), $image_name);
            } catch (\Throwable $th) {
                //throw $th;
                Alert::error('Error', 'Gagal Mengolah Gambar!');
                return redirect()->route('admin.food.create')->withErrors($validator)->withInput();
            }
        }

        // Select Children from Request data to Database
        $children = \App\Models\Children::where('slug', $slug)->firstOrFail();
        try {
            //code...
            // user_id
            $children->user_id = auth()->user()->id;
            // name
            $children->name = $request->name;
            // slug
            $children->slug = \Str::slug($request->name);
            // avatar
            $children->avatar = $image_name ?? $children->avatar;
            // gander
            $children->gander = $request->gander;
            // birthdate
            $children->birthdate = $request->birhdate;
            // place
            $children->place = $request->place;
            // blood_type
            $children->blood_type = $request->blood;
            // height
            $children->height = $request->height;
            // weight
            $children->weight = $request->weight;
            // notes
            $children->notes = $request->notes;
            // allergies
            // chronic_diseases
            //  Save
            $children->save();
            // Set Alert Success
            Alert::success('Berhasil', 'Data Berhasil Diubah');

            // Return a view
            return redirect()->route('user.children.index');
        } catch (\Throwable $th) {
            throw $th;
            // Set Alert Error
            Alert::error('Gagal', 'Data Gagal Diubah');

            // Return a view
            return redirect()->route('user.children.index');
        }

        // Set Alert Warning
        Alert::warning('Peringatan', 'Data Tidak Diubah');
        // Return a view
        return redirect()->route('user.children.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        // Debugging

        // Select Children from Request data to Database
        $children = \App\Models\Children::where('slug', $slug)->firstOrFail();

        // Delete
        try {
            //code...
            $children->delete();
            // Set Alert Success
            Alert::success('Berhasil', 'Data Berhasil Dihapus');

            // Return a view
            return redirect()->route('user.children.index');
        } catch (\Throwable $th) {
            //throw $th;
            // Set Alert Error
            Alert::error('Gagal', 'Data Gagal Dihapus');

            // Return a view
            return redirect()->route('user.children.index');
        }

        // Return a View
        return redirect()->route('user.children.index');
    }
}

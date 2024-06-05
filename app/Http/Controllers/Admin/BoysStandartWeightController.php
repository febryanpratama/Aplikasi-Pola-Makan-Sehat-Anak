<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BoysStandartWeightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Debugging
        // dd('index height');

        // Get All Standar on type Weight on Gander Boys
        $standars = \App\Models\Standar::where('gender', 'boy')->where('type', 'weight')->paginate(5);

        // dd($standars);
        // Return a view 
        return view('pages.admin.boys.bb.index', compact('standars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Debugging
        // dd('Test');

        // Return a View
        return view('pages.admin.boys.bb.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Debugging
        // dd('Store', $request->all());

        // Validate Request with Validator
        $validator = \Validator::make(
            $request->all(),
            [
                // _token
                '_token' => 'required',
                // _method
                '_method' => 'required',
                // old
                'old' => 'required|integer',
                // minus_3_sd
                'minus_3_sd' => 'required|numeric',
                // minus_2_sd
                'minus_2_sd' => 'required|numeric',
                // minus_1_sd
                'minus_1_sd' => 'required|numeric',
                // median
                'median' => 'required|numeric',
                // plus_3_sd
                'plus_3_sd' => 'required|numeric',
                // plus_2_sd
                'plus_2_sd' => 'required|numeric',
                // plus_1_sd
                'plus_1_sd' => 'required|numeric',
                // standar_protein
                'standar_protein' => 'required|numeric',
                // standart_energy
                'standart_energy' => 'required|numeric',
                // standart_lemak
                'standart_lemak' => 'required|numeric',
                // standart_carbohydrat
                'standart_carbohydrat' => 'required|numeric',
                // description
                'description' => 'nullable',
            ],
            [
                // _token
                '_token.required' => 'Token token tidak ditemukan',
                // _method
                '_method.required' => 'Method tidak ditemukan',
                // old
                'old.required' => 'Umur tidak boleh kosong',
                // minus_3_sd
                'minus_3_sd.required' => 'Minus 3 SD tidak boleh kosong',
                'minus_3_sd.numeric' => 'Minus 3 SD harus berupa angka',
                // minus_2_sd
                'minus_2_sd.required' => 'Minus 2 SD tidak boleh kosong',
                'minus_2_sd.numeric' => 'Minus 2 SD harus berupa angka',
                // minus_1_sd
                'minus_1_sd.required' => 'Minus 1 SD tidak boleh kosong',
                'minus_1_sd.numeric' => 'Minus 1 SD harus berupa angka',
                // median
                'median.required' => 'Median tidak boleh kosong',
                'median.numeric' => 'Median harus berupa angka',
                // plus_3_sd
                'plus_3_sd.required' => 'Plus 3 SD tidak boleh kosong',
                'plus_3_sd.numeric' => 'Plus 3 SD harus berupa angka',
                // plus_2_sd
                'plus_2_sd.required' => 'Plus 2 SD tidak boleh kosong',
                'plus_2_sd.numeric' => 'Plus 2 SD harus berupa angka',
                // plus_1_sd
                'plus_1_sd.required' => 'Plus 1 SD tidak boleh kosong',
                'plus_1_sd.numeric' => 'Plus 1 SD harus berupa angka',
                // standar_protein
                'standar_protein.required' => 'Standar Protein tidak boleh kosong',
                'standar_protein.numeric' => 'Standar Protein harus berupa angka',
                // standart_energy
                'standart_energy.required' => 'Standar Energi tidak boleh kosong',
                'standart_energy.numeric' => 'Standar Energi harus berupa angka',
                // standart_lemak
                'standart_lemak.required' => 'Standar Lemak tidak boleh kosong',
                'standart_lemak.numeric' => 'Standar Lemak harus berupa angka',
                // standart_carbohydrat
                'standart_carbohydrat.required' => 'Standar Karbohidrat tidak boleh kosong',
                'standart_carbohydrat.numeric' => 'Standar Karbohidrat harus berupa angka',
                // description
                'description.required' => 'Deskripsi tidak boleh kosong',
            ]
        );

        // Check Validator Fails
        if ($validator->fails()) {
            // Set Alert Error
            Alert::error('Error', $validator->errors()->first());

            // Return a view with old input data and validator
            return redirect()->back()->withInput()->withErrors($validator);
        }

        // dd('Store', $request->all());

        // Insert Standar from Request data to Database
        $standar = new \App\Models\Standar();
        try {
            //code...
            // old
            $standar->old = $request->old;
            // gender 
            $standar->gender = $request->gender ?? 'boy';
            // type
            $standar->type = $request->type ?? 'weight';
            // minus_3_sd
            $standar->minus_3_sd = $request->minus_3_sd;
            // minus_2_sd
            $standar->minus_2_sd = $request->minus_2_sd;
            // minus_1_sd
            $standar->minus_1_sd = $request->minus_1_sd;
            // median
            $standar->median = $request->median;
            // plus_3_sd
            $standar->plus_3_sd = $request->plus_3_sd;
            // plus_2_sd
            $standar->plus_2_sd = $request->plus_2_sd;
            // plus_1_sd
            $standar->plus_1_sd = $request->plus_1_sd;
            // standar_protein
            $standar->standar_protein = $request->standar_protein;
            // standart_energy
            $standar->standar_energy = $request->standart_energy;
            // standart_lemak
            $standar->standar_lemak = $request->standart_lemak;
            // standart_carbohydrat
            $standar->standar_carbohydrat = $request->standart_carbohydrat;
            // description
            $standar->description = $request->description;

            //  Save
            $standar->save();
            // Set Alert Success
            Alert::success('Success', 'Data berhasil disimpan');
            // Return a view
            return redirect()->route('admin.boys.weight.index');
        } catch (\Throwable $th) {
            throw $th;
            // Set Alert Error
            Alert::error('Error', $th->getMessage());

            // Return a view
            return redirect()->back()->withInput();
        }

        // Set Alert Warning
        Alert::warning('Warning', 'Data gagal disimpan');

        // Return a view
        return redirect()->back()->withInput();
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
        // dd('Test');

        // Get Standar
        $standar = \App\Models\Standar::where('old', $slug)->where('gender', 'boy')->where('type', 'weight')->firstOrFail();

        // Return a View
        return view('pages.admin.boys.bb.edit', compact('standar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        // Debugging
        // dd('Store', $request->all());

        // Validate Request with Validator
        $validator = \Validator::make(
            $request->all(),
            [
                // _token
                '_token' => 'required',
                // _method
                '_method' => 'required',
                // old
                'old' => 'required|integer',
                // minus_3_sd
                'minus_3_sd' => 'required|numeric',
                // minus_2_sd
                'minus_2_sd' => 'required|numeric',
                // minus_1_sd
                'minus_1_sd' => 'required|numeric',
                // median
                'median' => 'required|numeric',
                // plus_3_sd
                'plus_3_sd' => 'required|numeric',
                // plus_2_sd
                'plus_2_sd' => 'required|numeric',
                // plus_1_sd
                'plus_1_sd' => 'required|numeric',
                // standar_protein
                'standar_protein' => 'required|numeric',
                // standar_energy
                'standar_energy' => 'required|numeric',
                // standar_lemak
                'standar_lemak' => 'required|numeric',
                // standar_carbohydrat
                'standar_carbohydrat' => 'required|numeric',
                // description
                'description' => 'nullable',
            ],
            [
                // _token
                '_token.required' => 'Token token tidak ditemukan',
                // _method
                '_method.required' => 'Method tidak ditemukan',
                // old
                'old.required' => 'Umur tidak boleh kosong',
                // minus_3_sd
                'minus_3_sd.required' => 'Minus 3 SD tidak boleh kosong',
                'minus_3_sd.numeric' => 'Minus 3 SD harus berupa angka',
                // minus_2_sd
                'minus_2_sd.required' => 'Minus 2 SD tidak boleh kosong',
                'minus_2_sd.numeric' => 'Minus 2 SD harus berupa angka',
                // minus_1_sd
                'minus_1_sd.required' => 'Minus 1 SD tidak boleh kosong',
                'minus_1_sd.numeric' => 'Minus 1 SD harus berupa angka',
                // median
                'median.required' => 'Median tidak boleh kosong',
                'median.numeric' => 'Median harus berupa angka',
                // plus_3_sd
                'plus_3_sd.required' => 'Plus 3 SD tidak boleh kosong',
                'plus_3_sd.numeric' => 'Plus 3 SD harus berupa angka',
                // plus_2_sd
                'plus_2_sd.required' => 'Plus 2 SD tidak boleh kosong',
                'plus_2_sd.numeric' => 'Plus 2 SD harus berupa angka',
                // plus_1_sd
                'plus_1_sd.required' => 'Plus 1 SD tidak boleh kosong',
                'plus_1_sd.numeric' => 'Plus 1 SD harus berupa angka',
                // standar_protein
                'standar_protein.required' => 'Standar Protein tidak boleh kosong',
                'standar_protein.numeric' => 'Standar Protein harus berupa angka',
                // standar_energy
                'standar_energy.required' => 'Standar Energi tidak boleh kosong',
                'standar_energy.numeric' => 'Standar Energi harus berupa angka',
                // standar_lemak
                'standar_lemak.required' => 'Standar Lemak tidak boleh kosong',
                'standar_lemak.numeric' => 'Standar Lemak harus berupa angka',
                // standar_carbohydrat
                'standar_carbohydrat.required' => 'Standar Karbohidrat tidak boleh kosong',
                'standar_carbohydrat.numeric' => 'Standar Karbohidrat harus berupa angka',
                // description
                'description.required' => 'Deskripsi tidak boleh kosong',
            ]
        );

        // Check Validator Fails
        if ($validator->fails()) {
            // Set Alert Error
            Alert::error('Error', $validator->errors()->first());

            // Return a view with old input data and validator
            return redirect()->back()->withInput()->withErrors($validator);
        }

        // Update Standar from Request data to Database
        $standar = \App\Models\Standar::where('old', $slug)->where('gender', 'boy')->where('type', 'weight')->firstOrFail();
        try {
            //code...
            // Update Standar with ORM Eloquent
            // old
            $standar->old = $request->old;
            // gender 
            $standar->gender = $request->gender ?? 'boy';
            // type
            $standar->type = $request->type ?? 'weight';
            // minus_3_sd
            $standar->minus_3_sd = $request->minus_3_sd;
            // minus_2_sd
            $standar->minus_2_sd = $request->minus_2_sd;
            // minus_1_sd
            $standar->minus_1_sd = $request->minus_1_sd;
            // median
            $standar->median = $request->median;
            // plus_3_sd
            $standar->plus_3_sd = $request->plus_3_sd;
            // plus_2_sd
            $standar->plus_2_sd = $request->plus_2_sd;
            // plus_1_sd
            $standar->plus_1_sd = $request->plus_1_sd;
            // standar_protein
            $standar->standar_protein = $request->standar_protein;
            // standart_energy
            $standar->standar_energy = $request->standar_energy;
            // standart_lemak
            $standar->standar_lemak = $request->standar_lemak;
            // standart_carbohydrat
            $standar->standar_carbohydrat = $request->standar_carbohydrat;
            // description
            $standar->description = $request->description;

            //  Save
            $standar->save();

            // Set Alert Success
            Alert::success('Success', 'Data berhasil diubah');

            // Return a view
            return redirect()->route('admin.boys.weight.index');
        } catch (\Throwable $th) {
            throw $th;
            // Set Alert Error
            Alert::error('Error', $th->getMessage());

            // Return a view
            return redirect()->back()->withInput();
        }

        // Set Alert Warning
        Alert::warning('Warning', 'Data gagal diubah');

        // Return a view
        return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        // Debugging

        // Get Standar
        $standar = \App\Models\Standar::where('old', $slug)->where('gender', 'boy')->where('type', 'weight')->firstOrFail();

        // Delete
        $standar->delete();

        // Set Alert
        Alert::success('Success', 'Data berhasil dihapus');

        // Return a View
        return redirect()->route('admin.boys.weight.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FoodRecommendation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ChildrenController extends Controller
{
    //

    public function index(){
        $childrens = \App\Models\Children::paginate(10);


        // dd($childrens);
        return view('pages.admin.children.index', compact('childrens'));
    }

    public function show($child_id){
        // dd($child_id);

        $children = \App\Models\Children::where('id', $child_id)->first();
        // dd($children);

        // Get All Food Recommendation Data
        $foodRecommendations = \App\Models\FoodRecommendation::where('child_id', $children->id)->paginate(10);

        // dd($foodRecommendations);

        return view('pages.admin.children.show', compact('children', 'foodRecommendations'));

    }

    public function storeKeterangan(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'keterangan' => 'required'
        ]);

        if($validator->fails()){
            Alert::error('Gagal', $validator->errors()->first());
            // Return a view
            return redirect()->back()->withInput();
        }

        $resp = FoodRecommendation::where('id', $request->food_recomm_id)->update([
            'keterangan' => $request->keterangan
        ]);

        // dd($resp);

        Alert::success('Berhasil', 'Keterangan berhasil diubah');

        return redirect()->back();
    }
}

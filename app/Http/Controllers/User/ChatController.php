<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class ChatController extends Controller
{
    //

    public function index(){

        $data = Chat::where('user_id', auth()->user()->id)->get();

        // dd($data);
        return view('pages.user.chat.index', ['data'=>$data]);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'text' => 'required',
            // 'receiver_id' => 'required',
        ]);

        if($validator->fails()){
            Alert::error('Gagal', $validator->errors()->first());
            // Return a view
            return redirect()->back()->withInput();
        }


        $chat = Chat::create([
            'user_id' => auth()->user()->id,
            'receiver_id' => 1,
            'chat' => $request->text,
            'role' => 'User'

        ]);

        if($chat){
            Alert::success('Berhasil', 'Chat berhasil dikirim');
            return redirect()->back();
        }else{
            Alert::error('Gagal', 'Chat gagal dikirim');
            return redirect()->back();
        }


    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ChatController extends Controller
{
    //

    public function index(){
        $user = User::where('is_admin', 0)->get();
        return view('pages.admin.chat.index', ['data' => $user]);
    }

    public function show($user_id){

        // dd($request->all());

        $chat = Chat::where('user_id', $user_id)->get();

        // dd($chat);

        if(!$chat){
            Alert::error('Gagal', 'Chat tidak ditemukan');
            return redirect()->back();
        }

        return view('pages.admin.chat.show', ['data' => $chat, 'user_id' => $user_id]);
    }

    public function store(Request $request){
        // dd($request->all());

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
            'user_id' => $request->user_id,
            'receiver_id' => 1,
            'chat' => $request->text,
            'role' => 'Admin'

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

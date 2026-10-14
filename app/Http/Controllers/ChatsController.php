<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\GlobalMessageSent;
use App\Chat_messages_global;
use DB;
use Auth;

class ChatsController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');//so that only authenticated users are allowed to access the controller
    }


    public function index(){
        return view('chats');
    }


    public function getMessages(){

        return Chat_messages_global::with('user')->get();
    }

    public function sendMessage(Request $request){


        $message=new Chat_messages_global;
        $message->message=$request->message;
        $message->user_id=Auth::user()->id;
        $message->save();



        // $message=auth()->user()->messages()->create([
        // 'message'=>$request->message
        //]);

        broadcast(new GlobalMessageSent($message->load('user')))->toOthers();

        return ['status'=>'success'];
    }

    public function clearMessages(){

        return DB::table('chat_messages_globals')->delete();


    }
}

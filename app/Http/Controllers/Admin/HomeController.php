<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Conversation;
use App\Models\Message;
use Auth;
use App\Events\ChattingMessages;

class HomeController
{
    public function index(Request $request)
    {
        $users = User::where('id','!=',Auth::id())->get();

        foreach($users as $user){
            Global $user_id;
            $user_id = $user->id;
            $conversation = Conversation::where(function($query) {
                                            $query->where('sender_id',$GLOBALS['user_id'])
                                                ->where('receiver_id',Auth::id());
                                        })->orWhere(function($query) {
                                            $query->where('sender_id',Auth::id())
                                                ->where('receiver_id',$GLOBALS['user_id']);
                                        })->first();
            if(!$conversation){
                $conversation = Conversation::create([
                    'sender_id' => Auth::id(),
                    'receiver_id' => $GLOBALS['user_id']
                ]);
            }
        }

        $conversations = Conversation::with(['receiver','sender','messages'])
                                        ->where('sender_id',Auth::id())
                                        ->orWhere('receiver_id',Auth::id())
                                        ->orderBy('updated_at', 'desc')
                                        ->get();   

        if($request->ajax()){
            return view('partials.contacts',compact('conversations')); 
        }
        return view('home',compact('conversations')); 
    }

    public function send(Request $request)
    {
        $message = new Message;
        $message->conversation_id = $request->conversation_id;
        $message->user_id = Auth::id();
        $message->message = $request->message;
        $message->save();
        $conversation = $message->conversation;
        if ($conversation->sender_id == Auth::id()) {
            $conversation->sender_viewed = 1;
            $conversation->receiver_viewed = 0;
        }
        elseif($conversation->receiver_id == Auth::id()) {
            $conversation->receiver_viewed = 1;
            $conversation->sender_viewed = 0;
        }
        $conversation->updated_at = date("Y-m-d H:i:s");
        $conversation->save();
        $data = [
            'conversation_id' => $request->conversation_id,
            'user_id' => Auth::id(),
            'message' => $request->message,
        ];
        event(new ChattingMessages($data));
        return true;
    }
    
    public function show(Request $request){ 

        $conversation = Conversation::findOrFail($request->conversation_id);

        $start = 0 ;

        $limit = 100 ;
        
        if ($request->has('start')) {
            $start = $request->start;
        }

        if ($request->has('limit')) {
            $limit = $request->limit;
        }

        $messages = Message::with('user')->where('conversation_id',$conversation->id)->orderBy('created_at', 'desc')->offset($start)->limit($limit)->get();

        if ($conversation->sender_id == Auth::id()) {
            $conversation->sender_viewed = 1;
        }elseif($conversation->receiver_id == Auth::id()) {
            $conversation->receiver_viewed = 1;
        }
        
        $conversation->save();

        $messages = $messages->reverse();
        
        return view('partials.messages',compact('conversation','messages'));
    }
}
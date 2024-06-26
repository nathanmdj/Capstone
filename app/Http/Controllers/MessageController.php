<?php

namespace App\Http\Controllers;

use App\Events\PusherBroadcast;
use App\Models\Message;
use App\Models\MessageThread;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function show()
    {
        $user = User::orderBy('username', 'asc')->get();

        $myThreads = MessageThread::whereHas('participants', function ($query) {
            $query->where('user_id', auth()->id());
        })->orderByDesc('updated_at')->get();

        return view('messages.messages', compact('user', 'myThreads'));
    }


    public function search(Request $request)
    {
        $query = $request->input('query');

        // Perform the search query to get matching users
        $users = User::join('infos', 'users.id', '=', 'infos.user_id')
            ->where('users.username', 'like', "%{$query}%")
            ->select('users.*', 'infos.name', 'infos.photo') // Select the columns you need
            ->get();
        return response()->json($users);
    }

    public function newThread(User $user)
    {

        $thread = MessageThread::create([]); // Create a new thread

        // Attach users to the thread
        $thread->participants()->attach([auth()->id(), $user->id]);


        return redirect()->back();
    }




    public function broadcast(Request $request)
    {
        $message = $request->get('message');
        $threadID = $request->get('threadID');
        $thread = MessageThread::where('id', $threadID);
        $data = [
            'content' => $message,
            'msg_thread_id' => $threadID,
            'user_id' => auth()->id(),
        ];
        Message::create($data);
        $thread->touch();
        broadcast(new PusherBroadcast($message))->toOthers();

        return view('messages.broadcast', compact('message'));
    }

    public function receive(Request $request)
    {
        $message = $request->get('message');

        return view('messages.receive', compact('message'));
    }

    public function conversation(MessageThread $thread)
    {
        $id = request()->get('thread');
        $selectedThread = $thread->where('id', $id)->with('participants')->get();

        $messagesFromDB = Message::where('msg_thread_id', $id)->get();

        return view('messages.chat', compact('selectedThread', 'messagesFromDB'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Auth;

class MessageController extends Controller
{
    public function index()
    {
        // Récupérer les utilisateurs avec lesquels l'utilisateur connecté a échangé des messages
        $users = Message::where('sender_id', Auth::id())
                        ->orWhere('receiver_id', Auth::id())
                        ->with(['sender', 'receiver'])
                        ->get()
                        ->map(function($message) {
                            return $message->sender_id == Auth::id() ? $message->receiver : $message->sender;
                        })
                        ->unique('id'); // Éviter les doublons

        return view('messages.index', compact('users'));
    }

    public function show($userId)
    {
        // Récupérer les messages entre l'utilisateur connecté et l'utilisateur sélectionné
        $messages = Message::where(function($query) use ($userId) {
                            $query->where('sender_id', Auth::id())
                                  ->where('receiver_id', $userId);
                        })->orWhere(function($query) use ($userId) {
                            $query->where('sender_id', $userId)
                                  ->where('receiver_id', Auth::id());
                        })->with(['sender', 'receiver'])
                          ->get();

        $receiver = User::findOrFail($userId);

        return view('messages.show', compact('messages', 'receiver'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'content' => 'required|string|max:1000',
        ]);

        Message::create([
            'content' => $validated['content'],
            'sender_id' => Auth::id(),
            'receiver_id' => $validated['receiver_id'],
        ]);

        return redirect()->route('messages.show', $validated['receiver_id'])->with('success', 'Message envoyé.');
    }
}
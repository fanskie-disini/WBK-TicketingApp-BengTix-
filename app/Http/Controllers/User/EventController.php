<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function show(Event $event)
    {
        $event->load(['tikets', 'kategori', 'user']);
        return view('events.show', compact('event'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EventController extends Controller
{
    /**
     * Index all Events, in the form of a calendar
     * 
     * @return View
     */
    public function index(Request $request): View
    {
        $days = Event::query()
            ->whereDate('date', '>=', Carbon::now()->toDateString())
            ->get()
            ->groupBy(function (Event $event) {
                $date = new Carbon($event->date);
                return $date->format('l jS \\of F, Y');
            })
            ->toArray();

        return view('event.index')->with(compact('days'));
    }
}
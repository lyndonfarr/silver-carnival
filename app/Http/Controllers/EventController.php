<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Requests\Event\Store;
use App\Http\Requests\Event\Update;
use Illuminate\Http\RedirectResponse;

class EventController extends Controller
{
    // /**
    //  * Index all Events, in the form of a calendar
    //  * 
    //  * @return View
    //  */
    // public function holding(Request $request): View
    // {
    //     $days = Event::query()
    //         ->whereDate('date', '>=', Carbon::now()->toDateString())
    //         ->get()
    //         ->groupBy(function (Event $event) {
    //             $date = new Carbon($event->date);
    //             return $date->format('l jS \\of F, Y');
    //         })
    //         ->toArray();

    //     return view('event.index')->with(compact('days'));
    // }

    /**
     * Index all Events, in the form of a calendar
     * 
     * @return View
     */
    public function index(Request $request): View
    {
        $events = Event::query()
            ->findSearch()
            ->whereDate('date', '>=', Carbon::now()->toDateString())
            ->orderBy('date', 'asc')
            ->orderBy('created_at', 'asc')
            ->paginate(20);

        return view('event.index')->with(compact('events'));
    }

    /**
     * Display the Event:create page
     * 
     * @return View
     */
    public function create(): View
    {
        return view('event.create');
    }

    /**
     * Store the Event to DB
     * 
     * @param Store $request the Request object
     * @return RedirectResponse
     */
    public function store(Store $request): RedirectResponse
    {
        $eventData = $request->only(['date', 'description', 'name']);
        if (isset($request->time)) {
            $eventData['date'] .= " {$request->time}";
        }
        $event = Event::create($eventData);

        return redirect()->action('EventController@show', [$event->id]);
    }

    /**
     * Display the Event:show page
     * 
     * @param Request $request the Request object
     * @param int $id the id of the Event to show
     * @return View
     */
    public function show(Request $request, int $id): View
    {
        $event = Event::with('birthdayContact')->findOrFail($id);

        return view('event.show')->with(compact('event'));
    }

    /**
     * Display the Event::edit page
     * 
     * @param Request $request the Request object
     * @param int $id the id of the Event to edit
     * @return View
     */
    public function edit(Request $request, int $id): View
    {
        $event = Event::findOrFail($id);

        return view('event.edit')->with(compact('event'));
    }
    
    /**
     * Update the Event
     * 
     * @param Update $request the Request Object
     * @param int $id the id of the Event to update
     * @return RedirectResponse
     */
    public function update(Update $request, int $id): RedirectResponse
    {
        $event = Event::findOrFail($id);
        $eventData = $request->only(['date', 'description', 'name']);
        if (isset($request->time)) {
            $eventData['date'] .= " {$request->time}";
        }
        $event->update($eventData);

        return redirect()->action('EventController@show', [$event->id]);
    }
}

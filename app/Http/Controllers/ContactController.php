<?php

namespace App\Http\Controllers;

use App\Contact;
use App\ContactExtra;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Contact\Store;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    /**
     * Index all Contacts
     * 
     * @return View
     */
    public function index(): View
    {
        $contacts = Contact::with('currentPhoneNumber')->get();
        return view('contact.index')->with(compact('contacts'));
    }

    /**
     * Display the Contact:create page
     * 
     * @return View
     */
    public function create(): View
    {
        return view('contact.create');
    }

    /**
     * Store the Contact, with related ContactExtra to DB
     * 
     * @param Store $request the request received from the submitted form
     * @return RedirectResponse
     */
    public function store(Store $request): RedirectResponse
    {
        $contact = Contact::create([
            'full_name' => $request->input('name'),
            'notes' => $request->notes,
        ]);

        $phone = new ContactExtra([
            'type' => ContactExtra::TYPE_PHONE,
            'value' => $request->phone,
        ]);
        
        $contact->contactExtras()->save($phone);

        return redirect()->action('ContactController@edit', [$contact->id]);
    }

    /**
     * Display the Contact:show page
     * 
     * @param Request $request the Request object
     * @param int $id the id of the Contact to show
     * @return View
     */
    public function show(Request $request, int $id): View
    {
        $contact = Contact::with('primaryInstagram')->findOrFail($id);
        return view('contact.show')->with(compact('contact'));
    }

    /**
     * Display the Contact:edit page
     * 
     * @param Request $request the Request object
     * @param int $id the id of the Contact to edit
     * @return View
     */
    public function edit(Request $request, int $id): View
    {
        $contact = Contact::findOrFail($id);
        return view('contact.edit')->with(compact('contact'));
    }

    // public function update()
    // {
        // $contact = Contact::create([
        //     'description' => $request->description,
        //     'dob' => $request->dob,
        //     'first_name' => $request->first_name,
        //     'last_name' => $request->last_name,
        //     'middle_names' => $request->middle_names,
        //     'nationality' => $request->nationality,
        //     'nickname' => $request->nickname,
        //     'notes' => $request->notes,
        // ]);
    // }

    // public function destroy()
    // {

    // }
}

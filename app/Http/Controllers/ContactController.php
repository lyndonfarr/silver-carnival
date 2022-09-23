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
        $name = $request->input('name');
        $name = trim($name);
        $name = explode(' ', $name);
        
        $contact['first_name'] = array_shift($name);

        if (count($name)) {
            $contact['last_name'] = array_pop($name);
        }

        if (count($name)) {
            $contact['middle_names'] = join($name, ' ');
        }

        $contact = Contact::create(array_merge($contact, [
            'notes' => $request->notes,
        ]));

        $phone = new ContactExtra([
            'type' => ContactExtra::TYPE_PHONE,
            'value' => $request->phone,
        ]);
        
        $contact->contactExtras()->save($phone);

        return redirect()->action('ContactController@edit', [$contact->id]);
    }

    // public function show()
    // {

    // }

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

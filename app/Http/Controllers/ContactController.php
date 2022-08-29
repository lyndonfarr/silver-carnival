<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\View\View;
use App\Http\Requests\Contact\Store;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('contact.index');
    }

    public function create(): View
    {
        return view('contact.create');
    }

    public function store(Store $request): RedirectResponse
    {
        $contact = Contact::create([
            'description' => $request->description,
            'dob' => $request->dob,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_names' => $request->middle_names,
            'nationality' => $request->nationality,
            'nickname' => $request->nickname,
            'notes' => $request->notes,
        ]);

        return redirect()->action('AddressController@create', ['contact_id' => [$contact->id]]);
    }

    // public function show()
    // {

    // }

    // public function edit()
    // {

    // }

    // public function update()
    // {

    // }

    // public function destroy()
    // {

    // }
}

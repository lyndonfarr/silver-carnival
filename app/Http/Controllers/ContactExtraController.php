<?php

namespace App\Http\Controllers;

use App\Contact;
use App\ContactExtra;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ContactExtra\Update;

class ContactExtraController extends Controller
{
    /**
     * Display the ContactExtra:edit page
     * 
     * @param Request $request the Request object
     * @param int $id the id of the ContactExtra to edit
     * @return View
     */
    public function edit(Request $request, int $id): View
    {
        $contactExtra = ContactExtra::findOrFail($id);
        $contact = Contact::findOrFail($contactExtra->contact_id);

        return view('contact_extra.edit')->with(compact('contact', 'contactExtra'));
    }

    /**
     * Update the ContactExtra
     * 
     * @param Update $request the Request object
     * @param int $id the id of the ContactExtra to update
     * @return RedirectResponse
     */
    public function update(Update $request, int $id): RedirectResponse
    {
        $contactExtra = ContactExtra::findOrFail($id);
        $contactExtra->update(['value' => $request->value]);

        return redirect()->action('ContactController@show', [$contactExtra->contact_id]);
    }
}

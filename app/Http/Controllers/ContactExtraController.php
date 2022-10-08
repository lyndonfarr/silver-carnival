<?php

namespace App\Http\Controllers;

use App\Contact;
use App\ContactExtra;
use Illuminate\View\View;
use Illuminate\Http\Request;

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
        
        //@TODO retrieve the ContactExtras WITH the Contact. Wasn't working.
        $contact = Contact::findOrFail($contactExtra->contact_id);
        
        $contactExtras = ContactExtra::where(['contact_id' => $contact->id])->get()->groupBy('type');

        return view('contact_extra.edit')->with(compact('contact', 'contactExtras', 'id'));
    }
}

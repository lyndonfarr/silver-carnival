<?php

namespace App\Http\Controllers\Api;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Index all Contacts
     * 
     * @return int
     */
    public function editField(Request $request, int $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update([$request->field_name => $request->value]);

        return [$request->field_name => $contact->{$request->field_name}];
    }
}

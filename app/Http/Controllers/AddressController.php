<?php

namespace App\Http\Controllers;

use App\Address;
use App\Contact;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\Address\Store;

class AddressController extends Controller
{
    public function create(Request $request): View
    {
        $contacts = Contact::all()
            ->map(function (Contact $contact) {
                return [
                    'id' => $contact->id,
                    'name' => "{$contact->first_name} {$contact->middle_names} {$contact->last_name}",
                ];
            })
            ->sortBy('name')
            ->values();

        $linkedContacts = $contacts
            ->filter(function (array $contact) use ($request) {
                return in_array($contact['id'], $request->contact_id);
            })
            ->values();

        return view('address.create', compact('contacts', 'linkedContacts'));
    }

    public function store(Store $request)
    {
        $address = Address::create([
            'city' => $request->city,
            'country' => $request->country,
            'line_1' => $request->line_1,
            'line_2' => $request->line_2,
            'post_code' => $request->post_code,
            'state' => $request->state,
        ]);
        $address->contacts()->attach($request->contact_id);
    }
}

<?php

namespace App\Http\Controllers;

use App\Address;
use App\Contact;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\Address\Store;

class AddressController extends Controller
{
    /**
     * Display the Address:create page
     * 
     * @param Request $request the Request object
     * @return View
     */
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
                if (is_array($request->contact_id)) {
                    return in_array($contact['id'], $request->contact_id);
                }

                return $contact['id'] == $request->contact_id;
            })
            ->values();
        
        return view('address.create')->with(compact('contacts', 'linkedContacts'));
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

        return view('address.show')->with(compact('address'));
    }

    public function show(Request $request, int $addressId): View
    {
        $address = Address::findOrFail($addressId);

        return view('address.show')->with(compact('address'));
    }
}

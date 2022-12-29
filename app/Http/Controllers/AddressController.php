<?php

namespace App\Http\Controllers;

use App\Address;
use App\Contact;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\Address\Store;
use App\Http\Requests\Address\Update;
use Illuminate\Http\RedirectResponse;

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

    /**
     * Store the Address to DB
     * 
     * @param Store $request the Request object
     * @return RedirectResponse
     */
    public function store(Store $request): RedirectResponse
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

        return redirect()->action('AddressController@show', [$address->id]);
    }

    /**
     * Display the Address:show page
     * 
     * @param Request $request the Request object
     * @param int $id the id of the Address to show
     * @return View
     */
    public function show(Request $request, int $addressId): View
    {
        $address = Address::findOrFail($addressId);

        return view('address.show')->with(compact('address'));
    }

    /**
     * Display the Address::edit page
     * 
     * @param Request $request the Request object
     * @param int $id the id of the Address to edit
     * @return View
     */
    public function edit(Request $request, int $id): View
    {
        $address = Address::with('contacts')->findOrFail($id);
        $linkedContactIds = $address->contacts->pluck('id')->toArray();

        $contacts = Contact::all()
            ->map(function (Contact $contact) {
                return ['id' => $contact->id, 'name' => $contact->full_name];
            })
            ->sortBy('name')
            ->values();

        $linkedContacts = $address->contacts
            ->map(function (Contact $contact) {
                return ['id' => $contact->id, 'name' => $contact->full_name];
            })
            ->sortBy('name')
            ->values();

        return view('address.edit')->with(compact('address', 'contacts', 'linkedContacts'));
    }

    /**
     * Update the Contact, with related ContactExtras and Addresses
     * 
     * @param Update $request the Request Object
     * @param int $id the id of the Contact to update
     * @return RedirectResponse
     */
    public function update(Update $request, int $id): RedirectResponse
    {
        $address = Address::find($id);
        $address->update($request->only(['city', 'country', 'line_1', 'line_2', 'post_code', 'state']));
        $address->contacts()->sync($request->contact_id);

        return redirect()->action('AddressController@show', [$address->id]);
    }

    // public function destroy()
    // {

    // }
}

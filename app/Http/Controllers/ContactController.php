<?php

namespace App\Http\Controllers;

use App\Address;
use App\Contact;
use App\ContactExtra;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Contact\Index;
use App\Http\Requests\Contact\Store;
use App\Http\Requests\Contact\Update;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ContactController extends Controller
{
    /**
     * Index all Contacts
     * 
     * @return View
     */
    public function index(): View
    {
        $contacts = Contact::query()
            ->findSearch()
            ->orderBy('first_name', 'asc')
            ->orderBy('last_name', 'asc')
            ->get();
        
        return view('contact.index')->with(compact('contacts'));
    }

    /**
     * Display the Contact:create page
     * 
     * @return View
     */
    public function create(): View
    {
        $contacts = Contact::all()
            ->map(function (Contact $contact) {
                return ['id' => $contact->id, 'name' => $contact->full_name];
            })
            ->sortBy('name')
            ->values();

        $addresses = Address::all()
            ->map(function (Address $address) {
                return ['id' => $address->id, 'address' => $address->full_string];
            })
            ->sortBy('address')
            ->values();

        return view('contact.create')->with(compact('addresses', 'contacts'));
    }

    /**
     * Store the Contact, with related ContactExtra to DB
     * 
     * @param Store $request the Request object
     * @return RedirectResponse
     */
    public function store(Store $request): RedirectResponse
    {
        $contact = Contact::create($request->only(['dob', 'full_name', 'nationality', 'nickname', 'notes']));

        if (!empty($request->new_contact_extras)) {
            foreach ($request->new_contact_extras as $newContactExtra) {
                $contactExtra = new ContactExtra([
                    'type' => $newContactExtra['type'],
                    'value' => $newContactExtra['value'],
                ]);
                $contact->contactExtras()->save($contactExtra);
            }
        }

        if (!empty($request->found_address_id)) {
            $contact->addresses()->attach($request->found_address_id);
        }

        if (!empty($request->new_addresses)) {
            foreach ($request->new_addresses as $newAddress) {
                $address = Address::create([
                    'city' => $newAddress['city'],
                    'country' => $newAddress['country'],
                    'line_1' => $newAddress['line_1'],
                    'line_2' => $newAddress['line_2'],
                    'post_code' => $newAddress['post_code'],
                    'state' => $newAddress['state'],
                ]);
                $contact->addresses()->attach($address->id);
            }
        }

        return redirect()->action('ContactController@show', [$contact->id]);
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
        $contact = Contact::findOrFail($id);

        return view('contact.show')->with(compact('contact'));
    }

    /**
     * Display the Contact::edit page
     * 
     * @param Request $request the Request object
     * @param int $id the id of the Contact to edit
     * @return View
     */
    public function edit(Request $request, int $id): View
    {
        $contact = Contact::with(['addresses', 'contactExtras'])->findOrFail($id);

        $contacts = Contact::all()
            ->map(function (Contact $contact) {
                return ['id' => $contact->id, 'name' => $contact->full_name];
            })
            ->sortBy('name')
            ->values();

        $addresses = Address::all()
            ->map(function (Address $address) {
                return ['id' => $address->id, 'address' => $address->full_string];
            })
            ->sortBy('address')
            ->values();

        return view('contact.edit')->with(compact('addresses', 'contact', 'contacts'));
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
        $contact = Contact::find($id);
        $contact->update($request->only(['dob', 'full_name', 'nationality', 'nickname', 'notes']));

        if (!empty($request->contact_extras)) {
            foreach ($request->contact_extras as $existingContactExtra) {
                $contactExtra = ContactExtra::find($existingContactExtra['id']);
                $contactExtra->update(['value' => $existingContactExtra['value']]);
            }
        }

        if (!empty($request->new_contact_extras)) {
            foreach ($request->new_contact_extras as $newContactExtra) {
                $contactExtra = new ContactExtra([
                    'type' => $newContactExtra['type'],
                    'value' => $newContactExtra['value'],
                ]);
                $contact->contactExtras()->save($contactExtra);
            }
        }

        if (!empty($request->found_address_id)) {
            $contact->addresses()->attach($request->found_address_id);
        }

        if (!empty($request->new_addresses)) {
            foreach ($request->new_addresses as $newAddress) {
                $address = Address::create([
                    'city' => $newAddress['city'],
                    'country' => $newAddress['country'],
                    'line_1' => $newAddress['line_1'],
                    'line_2' => $newAddress['line_2'],
                    'post_code' => $newAddress['post_code'],
                    'state' => $newAddress['state'],
                ]);
                $contact->addresses()->attach($address->id);
            }
        }

        return redirect()->action('ContactController@show', [$contact->id]);
    }

    // public function destroy()
    // {

    // }
}

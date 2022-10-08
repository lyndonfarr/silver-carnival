<?php

namespace App\Http\Controllers;

use App\Contact;
use App\ContactExtra;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Contact\Store;
use App\Http\Requests\Contact\Update;
use Illuminate\Http\RedirectResponse;
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
        $contacts = Contact::with('primaryPhoneNumber')->get();
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
     * @param Store $the Request object
     * @return RedirectResponse
     */
    public function store(Store $request): RedirectResponse
    {
        $contact = Contact::create([
            'full_name' => $request->full_name,
            'notes' => $request->notes,
        ]);

        $phone = new ContactExtra([
            'type' => ContactExtra::TYPE_PHONE,
            'value' => $request->phone,
        ]);
        
        $contact->contactExtras()->save($phone);

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
        $contact = Contact::with('primaryInstagram')->findOrFail($id);
        return view('contact.show')->with(compact('contact'));
    }

    /**
     * Display the Contact:edit page
     * 
     * @see https://www.itsolutionstuff.com/post/laravel-56-crud-application-for-starterexample.html
     * @param Request $request the Request object
     * @param int $id the id of the Contact to edit
     * @return View
     */
    public function edit(Request $request, int $id): View
    {
        //@TODO retrieve the ContactExtras WITH the Contact. Wasn't working.
        $contact = Contact::findOrFail($id);
        
        $contactExtras = ContactExtra::where(['contact_id' => $contact->id])->get()->groupBy('type');

        return view('contact.edit')->with(compact('contact', 'contactExtras'));
    }

    /**
     * Update the Contact
     * 
     * @see https://www.semicolonworld.com/question/50299/laravel-eloquent-update-a-model-and-its-relationships
     * 
     * @param Update $request the Request object
     * @param int $id the id of the Contact to update
     * @return RedirectResponse
     */
    public function update(Update $request, int $id): RedirectResponse
    {
        $contact = Contact::findOrFail($id);
        $contact->update([
            'dob' => $request->dob,
            'full_name' => $request->full_name,
            'nationality' => $request->nationality,
            'nickname' => $request->nickname,
            'notes' => $request->notes,
        ]);

        return redirect()->action('ContactController@show', [$contact->id]);
    }

    // public function destroy()
    // {

    // }
}

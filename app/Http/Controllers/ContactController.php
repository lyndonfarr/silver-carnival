<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\View\View;
use Illuminate\Http\Request;
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

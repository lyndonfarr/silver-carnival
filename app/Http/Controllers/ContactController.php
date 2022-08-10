<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

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

    public function store(): View
    {
        
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

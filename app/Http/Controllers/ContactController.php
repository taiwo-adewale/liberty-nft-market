<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\ContactStoreRequest;

class ContactController extends Controller
{

  public function index() {
    return view('contact');
  }

  public function store(ContactStoreRequest $request) {
    $formData = $request->validated();
    
    Contact::create($formData);

    return redirect('/contact')->with('message', 'Message sent successfully');
  }

}

<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function __construct()
    {
        view()->share([
            'menu' => "contact"
        ]);
    }

    public function index()
    {
        return view('dashboard.contact.contact');
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);
        $data = $request->all();
        if ($request->hasFile('backgroundvoice')) {
            $oldvoice = $contact->backgroundvoice;
            $backgroundvoice = $request->file('backgroundvoice');
            $data['backgroundvoice'] = $this->images($backgroundvoice, $oldvoice);
        }
        $contact->update($data);
        return redirect()->route('contact.index');


    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function contactMessages()
    {
        // $contacts = Contact::orderBy('status', 'asc')
        //     ->orderBy('updated_at', 'asc')->paginate(10);
        $contacts = Contact::orderBy('status', 'asc')
            ->orderBy('updated_at', 'asc')
            ->paginate(10);
        // return $contacts;
        return view('admin.contact.index', ['contacts' => $contacts]);
    }
    public function showContactMessage($id)
    {
        $contact = Contact::find($id);
        return view('admin.contact.show', ['contact' => $contact]);
    }
    public function status($id)
    {
        Contact::find($id)->update(['status' => 1, 'updated_at' => now()]);
        return back()->with('success', 'Message Readed');
    }

    public function deleteContactMessage($id)
    {
        Contact::find($id)->delete();
        return redirect()->back()->with('success', 'Message Deleted');
    }
}

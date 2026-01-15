<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactAdminMail;
use App\Mail\ContactUserMail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'college' => 'required|string|max:255',
            'phone'   => 'required|string|min:10',
            'email'   => 'required|email',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|max:200',
        ]);

        // Store in database
        $contact = Contact::create($validated);

        // Send mail to Admin
        Mail::to(config('mail.from.address'))
            ->send(new ContactAdminMail($contact));

        // Send confirmation to User
        Mail::to($contact->email)
              ->send(new ContactUserMail($contact));

        return back()->with('success', 'Your message has been sent successfully!');
    }
}


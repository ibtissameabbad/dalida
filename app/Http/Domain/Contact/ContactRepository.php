<?php

namespace App\Http\Domain\Contact;


use App\Models\Contact;

class ContactRepository {

    public function store(string $name, string $telephone, string $email,string $message)
    {
        return Contact::create([
            'name' => $name,
            'telephone' => $telephone,
            'email' => $email,
            'message' => $message,
        ]);
    }
}

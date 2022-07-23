<?php

namespace App\Http\Domain\Lead;


use App\Models\Lead;

class LeadRepository
{

    public function store(string $email, string $from)
    {
        return Lead::create([
            'email' => $email,
            'from' => $from
        ]);
    }
}

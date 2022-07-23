<?php

namespace App\Exports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ContactExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Contact::select('id', 'name', 'telephone', 'email', 'message', 'created_at')->orderBy('id','DESC')->get();
    }
    public function headings(): array
    {
        return ["ID", "Nom et prénom", "Numéro de téléphone", "Email", "Message","Créé à"];
    }
}

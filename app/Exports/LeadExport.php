<?php

namespace App\Exports;

use App\Models\Lead;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class LeadExport implements FromCollection, WithHeadings
{
    /**
    * @return Collection
    */
    public function collection(): Collection
    {
        return Lead::select('id', 'email', 'from', 'created_at')->orderBy('id','DESC')->get();
    }

    public function headings(): array
    {
        return ["ID", "Email", "De", "Créé à"];
    }
}

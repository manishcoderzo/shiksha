<?php
namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;
use App\Models\Staff;



class StaffExport implements FromCollection
{
    public function collection()
    {
        return Staff::all();
    }
}
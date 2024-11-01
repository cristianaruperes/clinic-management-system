<?php

namespace App\Exports;

use App\Patients;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\FromCollection;

// class PatientsExport implements FromCollection
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return Patients::all();
//     }
// }

class PatientsExport implements FromView
{
    public function view(): View
    {
        return view('admin.registration.export_list_patient', [
            'patients' => Patients::orderBy('name')->get()
        ]);
    }
}

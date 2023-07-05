<?php

namespace App\Exports;

use App\Models\StudentData;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentDataExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = StudentData::select('student_master.student_f_name as student_f_name','student_master.student_m_name as student_m_name','student_master.student_l_name as student_l_name', 'state_master.state as student_state','city_master.city as student_city','student_master.gender as gender','student_master.profile_photo_link as profile_photo_link')
        ->join('state_master','student_master.student_state','=','state_master.id')
        ->join('city_master','student_master.student_city','=','city_master.id')
        ->get();
      
        return $data;
    }
    public function headings(): array
    {
        return [
            'Student_f_name',
            'Student_m_name',
            'Student_l_name',
            'Student State',
            'Student City',
            'Gender',
            'Profile Photo Link'
        ];
    }
}

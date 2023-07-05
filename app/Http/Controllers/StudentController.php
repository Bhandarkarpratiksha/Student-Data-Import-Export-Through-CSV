<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentDataExport;
use App\Imports\StudentDataImport;
use App\Models\StudentData;
use App\Models\CityMaster;
use App\Models\StateMaster;

class StudentController extends Controller
{
    public function importExportView()
    {
        $data = StudentData::select('student_master.student_f_name as student_f_name','student_master.student_m_name as student_m_name','student_master.student_l_name as student_l_name', 'state_master.state as student_state','city_master.city as student_city','student_master.gender as gender','student_master.profile_photo_link as profile_photo_link')
        ->join('state_master','student_master.student_state','=','state_master.id')
        ->join('city_master','student_master.student_city','=','city_master.id')
        ->get();
    
       return view('student.index',compact('data'));
    }

    public function import(Request $request)
    { 
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]); 
        
        $data = Excel::import(new StudentDataImport(), $request->file('file'));
       
        return redirect()->back()
            ->with('success', 'Student data has been imported');
    }
    public function export() 
    {
        return Excel::download(new StudentDataExport, 'students.csv');
        return back();
    }
}

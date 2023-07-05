<?php

namespace App\Imports;

use App\Models\StudentData;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\StateMaster;
use App\Models\CityMaster;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class StudentDataImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
           
            if($row->filter()->isNotEmpty()){
                // $state = StateMaster::where('state', $row[3])->first();
               
                    $state = StateMaster::updateOrCreate([
                        'state'=>$row[3]
                    ]);
               

                $city = CityMaster::updateOrCreate([
                    'city'=>$row[4],
                    'state_id'=> $state->id
                ]);
           
                $student_data = StudentData::create([
                    'student_f_name'     => $row[0],
                    'student_m_name'    => $row[1], 
                    'student_l_name' => $row[2],
                    'student_state' => $state->id,
                    'student_city' => $city->id,
                    'gender' => $row[5],
                    'profile_photo_link' => $row[6],
                ]);
            }
            }
            
        }
    
}
           
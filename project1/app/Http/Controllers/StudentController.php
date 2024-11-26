<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function insertStudent(){
        $student = Student::create([
            'name' => 'charbel',
            'nbOfCredits' => 18,
            'is_registered' => true,
        ]);

        return response()->json([
            'message' => 'Student created successfully',
            'student' => $student
        ]);
    }
    public function allStudents(){
        $data = Student::all();
        return $data;
    }
    public function StudentById(){
        $data = Student::findOrFail('1');
        return $data;
    }
    public function CreditsGt100(){
        $data = Student::where('nbOfCredits','>','100')->get();
        return $data;
    }
    public function CreditsGt50ORis_reg(){
        $data = Student::where('nbOfCredits','>','50')->orWhere('is_registered',true)->get();
        return $data;
    }
    public function MaxCred(){
        $data = Student::max('nbOfCredits');
        return $data;
    }
    public function MinCred(){
        $data = Student::min('nbOfCredits');
        return $data;
    }
    public function AvgCred(){
        $data = Student::avg('nbOfCredits');
        return $data;
    }
    public function StudentIn(){
        $data = Student::whereIn('id',[1,2,3])->get();
        return $data;
    }


}

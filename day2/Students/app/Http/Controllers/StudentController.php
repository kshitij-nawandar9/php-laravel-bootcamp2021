<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function AddStudent(Request $request)
    {
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $entries = array('firstname' => $firstname, 'lastname' => $lastname);
        DB::table('students')->insert($entries);
        return $entries;
    }
    public function DeleteStudentById($id)
    {
        echo $id;
        DB::table('students')->where('id','=',$id)->delete();
    }
    public function GetStudentByID($id)
    {
        $users = DB::table('students')->where('id',$id)->first();
        return $users;
    }
    public function GetAllStudents()
    {
        $users = DB::table('students')->get();
        return $users;
    }
}

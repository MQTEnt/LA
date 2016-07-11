<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Student;
use DateTime;
class StudentsController extends Controller
{
    public function getList()
    {
    	$students=Student::select(['id','name','birth_year','phone','email'])->orderBy('id','ASC')->get();
    	return $students;
    }
    public function postAdd(Request $request)
    {
    	$student=new Student();
        //Chú ý $request được lấy từ tham số data tại request Angular gửi lên - không phải lấy từ form HTML
    	$student->name=$request->name;
    	$student->email=$request->email;
    	$student->phone=$request->phone;
    	$student->birth_year=$request->birth_year;
    	$student->created_at =new DateTime();
    	$student->save();
    	return 'Add Success';
    }
    public function getEdit($id)
    {
        $student=Student::find($id);
        return $student;
    }
    public function postEdit(Request $request, $id)
    {
        $student=Student::findOrFail($id);
        $student->update([
            'name'=>$request->get('name'), //hoặc 'name'=>$request->name;
            'email'=>$request->get('email'),
            'phone'=>$request->get('phone'),
            'birth_year'=>$request->get('birth_year')
        ]);
        return 'Update Success';
    }
    public function getDelete($id)
    {
        $student=Student::findOrFail($id);
        $student->delete();
        return 'Delete Success';
    }
}

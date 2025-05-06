<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Students extends Controller
{
    public function ssid(Request $request){


    $validator = Validator::make($request->all(),[
        'sid' => 'required'

    ]);
if($validator-> fails()){
    return redirect()-> back()->withErrors($validator)->withInput();
}


//user information get garxau
$student = Student::where('roll',$request->Rand_id)->first();
if($student){
return redirect()-> back()->with('success', 'got info');

}

return redirect()-> back()->withErrors('wrong input');




    }
}

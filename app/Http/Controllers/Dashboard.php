<?php

namespace App\Http\Controllers;

use App\Models\OrganizationUser;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\TeacherSubject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{


    public function index()
    {
    public function index()
    {
        return view('dashboardv2');
    }


    /// teacher register (Post )
    public function teacher(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobileNo' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],

        ]);

        if ($validator->fails()) {
            // For example:
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();

//            // Also handy: get the array with the errors
//            $validator->errors();
//
//            // or, for APIs:
//            $validator->errors()->toJson();
        }

        // Input is valid, continue...

        //find user org



        $user_org = OrganizationUser::where('user_id', Auth::id())->first();

        $org_id = $user_org->organization_id;

        DB::transaction(function () use($request, $org_id) {

            $teacher = Teacher::create([
                'name' => $request->name,
                'number' => $request->mobileNo,
                'email' => $request->email,
                'organization_id' => $org_id
            ]);
            if ($request-> subject){
                foreach ($request-> subject as $subject){
                    TeacherSubject::create([
                        'teacher_id' => $teacher->id,
                        'subject_id' => $subject,
                        'organization_id' => $org_id,
                    ]);
                }
            }
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->mobileNo),
            ]);

            $user->addRole('teacher');
        });






        return redirect()->route('teacher-register')->with('success', 'Added Teacher');


    }


/// student register (Post )
    public function student(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'fiscal' => 'required',
            'year' => 'required_without:semester',
            'semester' => 'required_without:year',

        ]);

        if ($validator->fails()) {
            // For example:
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();

//            // Also handy: get the array with the errors
//            $validator->errors();
//
//            // or, for APIs:
//            $validator->errors()->toJson();
        }

        // Input is valid, continue...

        //find user org

        $user_org = OrganizationUser::where('user_id', Auth::id())->first();

        $org_id = $user_org->organization_id;

        $rand_id = $this->rand_id(6);

        Student::create([
            'name' => $request->name,
            'rand_id' => $rand_id,
            'fiscal_year_id' => $request->fiscal,
            'year_id' => $request->year,
            'semester_id' => $request->semester,
            'organization_id' => $org_id
        ]);

        return redirect()->route('student-register')->with('success', 'Added Students');


    }


    protected  function rand_id($len = 6)
    {
        $num = range(0,9);
        shuffle($num);
        return implode('', array_slice($num, 0, $len));
    }

}

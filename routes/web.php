<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\register;
use App\Http\Controllers\Students;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('/')->group(function () {
    Route::get('/', function () {
        return view('landingpage');

    })->name('home.page');


     Route::get('/student', function (\Illuminate\Http\Request $request){
        if($request->sid){

            $s = \App\Models\Student::where('rand_id', $request->sid)->first();
            if($s){

                return redirect()->route('home.page', ['?sid='.$request->sid, '#student']);


            }else{

                return redirect()->back()->withErrors('Student id Doesnt Matched.., Please confirm your ID');
                //echo "student is doesnt matched.";
            }

        }

     })->name('sid_search');

});


Route::prefix('/dashboard')->group(function (){

Route::get('/', [\App\Http\Controllers\Dashboard::class, 'index'])->name('dashboard');

//------------------------------------------------ Register route for teacher, students --------------------------------
Route::prefix('/register')->group(function (){
   Route::get('/teacher', function (){
       $org_id = 1;
       $teach_list = \App\Models\Teacher::where('organization_id', $org_id)->get();

       $subject_list = \App\Models\Subject::where('organization_id', $org_id)->get();


       return view('teacher-register')->with('teachers', $teach_list)->with('subject', $subject_list);
   })->name('teacher-register');

    Route::get('/student', function (){
        $org_id = 1;

        $stu_list = \App\Models\Student::where('organization_id', $org_id)->get();
        $year_list = \App\Models\Year::where('organization_id', $org_id)->get();
        $semester = \App\Models\Semester::where('organization_id', $org_id)->get();


        $fiscal_year = \App\Models\FiscalYear::where('organization_id', $org_id)->get();

        return view('student-register')
            ->with('students', $stu_list)
            ->with('fiscal', $fiscal_year)
            ->with('year', $year_list)
            ->with('semester', $semester);
    })->name('student-register');

Route::post('/student', [\App\Http\Controllers\Dashboard::class, 'student'])->name('student-register');
   Route::post('/teacher', [\App\Http\Controllers\Dashboard::class, 'teacher'])->name('teacher-register');

   Route::get('/attendance', [\App\Http\Controllers\Attendance::class, 'index'])->name('students-attendance');
});


})->middleware(['auth', 'verified', 'role:admin|teacher']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



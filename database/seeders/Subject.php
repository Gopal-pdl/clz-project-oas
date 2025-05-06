<?php

namespace Database\Seeders;

use App\Models\CoursePlan;
use App\Models\Faculty;
use App\Models\FiscalYear;
use App\Models\Organization;
use App\Models\OrganizationUser;
use App\Models\Semester;
use App\Models\Software;
use App\Models\User;
use App\Models\Year;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Subject extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

       $user = User::create([
            'name' => 'Santosh Neupane',
            'email'=> 'nsantosh.com.np@gmail.com',
            'password' => Hash::make('password')
        ]);

        Software::create([
            'purpose' => 'College',
            'flag' => '1'
        ]);
        Software::create(
            [
                'purpose' => 'School',
                'flag' => '0'
            ]);

        $org = Organization::create([
            'name' => 'Narayani Model Secondary School'
        ]);


        OrganizationUser::create([
            'organization_id' => $org->id,
            'user_id' => $user->id
        ]);



//        CoursePlan::create([
//            'plan' => 'Years',
//            'time_period' => 2,
//            'organization_id' => $org->id,
//        ]);

        $pln = CoursePlan::create([
                'plan' => 'Semester',
                'time_period' => 6,
                'organization_id' => $org->id,
            ]);


            Faculty::create([
               'faculty' => 'DIT',
                'organization_id' => $org->id,
                'course_plan_id' => $pln->id,
            ]);

            FiscalYear::create([
               'year' => '2023-04-14',
                'nepali_year' => '2080',
                'organization_id' => $org->id,
            ]);

            Year::create([
               'class' => 'DIT',
                'organization_id' => $org->id,
            ]);

            $sem = Semester::create([
               'semester' => '1',
                'organization_id' => $org->id,
            ]);

            Subject::create([
               'subject_code' => 'EG1101SH',
                'subject' => 'Applied Nepali',
                'semester_id' => $sem->id,
                'organization_id' => $org->id,
            ]);

//        Subject::create([
//            'subject_code' => 'EG1102SH',
//            'subject' => 'Applied English',
//            'semester_id' => $sem->id,
//            'organization_id' => $org->id,
//        ]);
//
//        Subject::create([
//            'subject_code' => 'EG1103SH',
//            'subject' => 'Engineering Mathematics I',
//            'semester_id' => $sem->id,
//            'organization_id' => $org->id,
//        ]);








    }
}

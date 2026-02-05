<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\SchoolClass;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Student;

class InitialDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * IMPORTANT: Only creates admin account and initial data.
     * Teachers are created by admin through the admin panel.
     * Students are created by admin through the admin panel.
     */
    public function run(): void
    {
        // Create ONLY admin account (no teachers - admin creates them)
        Admin::create([
            'name' => 'System Administrator',
            'email' => 'admin@edutrack.com',
            'password' => Hash::make('password'),
        ]);

        // Create Classes: Grade 1 and Grade 2
        $class1 = SchoolClass::create(['name' => 'Grade 1']);
        $class2 = SchoolClass::create(['name' => 'Grade 2']);

        // Create Sections: A and B for each class
        $class1_sectionA = Section::create(['name' => 'A', 'class_id' => $class1->id]);
        $class1_sectionB = Section::create(['name' => 'B', 'class_id' => $class1->id]);
        $class2_sectionA = Section::create(['name' => 'A', 'class_id' => $class2->id]);
        $class2_sectionB = Section::create(['name' => 'B', 'class_id' => $class2->id]);

        // Create Subjects: Math and Physics for each class
        Subject::create(['name' => 'Math', 'class_id' => $class1->id]);
        Subject::create(['name' => 'Physics', 'class_id' => $class1->id]);
        Subject::create(['name' => 'Math', 'class_id' => $class2->id]);
        Subject::create(['name' => 'Physics', 'class_id' => $class2->id]);

        // Create Sample Students (12 total - 3 per section)
        // Note: In production, admin will create students through admin panel

        // Grade 1 - Section A
        Student::create(['name' => 'Alice Johnson', 'class_id' => $class1->id, 'section_id' => $class1_sectionA->id]);
        Student::create(['name' => 'Bob Smith', 'class_id' => $class1->id, 'section_id' => $class1_sectionA->id]);
        Student::create(['name' => 'Charlie Brown', 'class_id' => $class1->id, 'section_id' => $class1_sectionA->id]);

        // Grade 1 - Section B
        Student::create(['name' => 'Diana Prince', 'class_id' => $class1->id, 'section_id' => $class1_sectionB->id]);
        Student::create(['name' => 'Edward Norton', 'class_id' => $class1->id, 'section_id' => $class1_sectionB->id]);
        Student::create(['name' => 'Fiona Apple', 'class_id' => $class1->id, 'section_id' => $class1_sectionB->id]);

        // Grade 2 - Section A
        Student::create(['name' => 'George Martin', 'class_id' => $class2->id, 'section_id' => $class2_sectionA->id]);
        Student::create(['name' => 'Hannah Montana', 'class_id' => $class2->id, 'section_id' => $class2_sectionA->id]);
        Student::create(['name' => 'Ian McKellen', 'class_id' => $class2->id, 'section_id' => $class2_sectionA->id]);

        // Grade 2 - Section B
        Student::create(['name' => 'Julia Roberts', 'class_id' => $class2->id, 'section_id' => $class2_sectionB->id]);
        Student::create(['name' => 'Kevin Hart', 'class_id' => $class2->id, 'section_id' => $class2_sectionB->id]);
        Student::create(['name' => 'Laura Dern', 'class_id' => $class2->id, 'section_id' => $class2_sectionB->id]);
    }
}

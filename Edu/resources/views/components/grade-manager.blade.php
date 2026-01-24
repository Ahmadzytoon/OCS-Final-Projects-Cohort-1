<?php

use Livewire\Component;
use App\Models\Grade;
use App\Models\SchoolClass;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Student;

new class extends Component {
    public $class_id = '';
    public $section_id = '';
    public $subject_id = '';
    public $students = [];
    public $grades = [];
    public $classes = [];
    public $sections = [];
    public $subjects = [];

    public function mount()
    {
        $this->classes = SchoolClass::all();
    }

    public function updatedClassId($value)
    {
        if ($value) {
            $this->sections = Section::where('class_id', $value)->get();
            $this->subjects = Subject::where('class_id', $value)->get();
        } else {
            $this->sections = [];
            $this->subjects = [];
        }
        $this->section_id = '';
        $this->subject_id = '';
        $this->students = [];
    }

    public function loadStudents()
    {
        if ($this->class_id && $this->section_id && $this->subject_id) {
            $this->students = Student::where('class_id', $this->class_id)
                ->where('section_id', $this->section_id)
                ->get();

            $existing = Grade::where('subject_id', $this->subject_id)
                ->whereIn('student_id', $this->students->pluck('id'))
                ->pluck('mark', 'student_id')
                ->toArray();

            foreach ($this->students as $student) {
                $this->grades[$student->id] = $existing[$student->id] ?? '';
            }
        }
    }

    public function save()
    {
        foreach ($this->grades as $student_id => $mark) {
            if ($mark !== '' && $mark !== null) {
                Grade::updateOrCreate(
                    ['student_id' => $student_id, 'subject_id' => $this->subject_id],
                    ['teacher_id' => auth('teacher')->id(), 'mark' => $mark]
                );
            }
        }
        session()->flash('success', 'Grades saved successfully!');
    }

    public function render()
    {
        return view('components.grade-manager');
    }
};
?>

<div class="py-6">
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
    @endif

    <div class="bg-white p-6 rounded-lg shadow mb-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div>
                <label class="block text-sm font-medium mb-1">Class</label>
                <select wire:model.live="class_id" class="w-full px-3 py-2 border rounded-lg">
                    <option value="">Select Class</option>
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Section</label>
                <select wire:model="section_id" class="w-full px-3 py-2 border rounded-lg">
                    <option value="">Select Section</option>
                    @foreach ($sections as $section)
                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Subject</label>
                <select wire:model="subject_id" class="w-full px-3 py-2 border rounded-lg">
                    <option value="">Select Subject</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button wire:click="loadStudents" class="px-4 py-2 bg-indigo-600 text-white rounded-lg">Load Students</button>
    </div>

    @if (count($students) > 0)
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-4">Enter Grades (0-100)</h3>
            <div class="space-y-3">
                @foreach ($students as $student)
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                        <span class="font-medium">{{ $student->name }}</span>
                        <input wire:model="grades.{{ $student->id }}" type="number" min="0" max="100" step="0.01"
                            class="w-24 px-3 py-2 border rounded-lg" placeholder="Mark">
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                <button wire:click="save" class="px-6 py-2 bg-green-600 text-white rounded-lg">Save Grades</button>
            </div>
        </div>
    @endif
</div>
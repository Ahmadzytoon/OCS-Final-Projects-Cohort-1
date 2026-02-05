<?php

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Attendance;
use App\Models\SchoolClass;
use App\Models\Section;
use App\Models\Student;

new class extends Component {
    #[Validate('required|exists:classes,id')]
    public $class_id = '';

    #[Validate('required|exists:sections,id')]
    public $section_id = '';

    #[Validate('required|date')]
    public $date = '';

    public $students = [];
    public $attendance = [];
    public $classes = [];
    public $sections = [];

    public function mount()
    {
        $this->classes = SchoolClass::all();
        $this->date = date('Y-m-d');
    }

    public function updatedClassId($value)
    {
        $this->sections = $value ? Section::where('class_id', $value)->get() : [];
        $this->section_id = '';
        $this->students = [];
    }

    public function loadStudents()
    {
        $this->validate(['class_id' => 'required', 'section_id' => 'required', 'date' => 'required']);

        $this->students = Student::where('class_id', $this->class_id)
            ->where('section_id', $this->section_id)
            ->get();

        // Load existing attendance
        $existing = Attendance::where('date', $this->date)
            ->whereIn('student_id', $this->students->pluck('id'))
            ->pluck('status', 'student_id')
            ->toArray();

        foreach ($this->students as $student) {
            $this->attendance[$student->id] = $existing[$student->id] ?? 'present';
        }
    }

    public function save()
    {
        foreach ($this->attendance as $student_id => $status) {
            Attendance::updateOrCreate(
                [
                    'student_id' => $student_id,
                    'date' => $this->date,
                ],
                [
                    'teacher_id' => auth('teacher')->id(),
                    'status' => $status,
                ]
            );
        }

        session()->flash('success', 'Attendance recorded successfully!');
    }

    public function render()
    {
        return view('components.attendance-recorder');
    }
};
?>

<div class="py-6">
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">{{ session('success') }}</div>
    @endif

    <div class="bg-white p-6 rounded-lg shadow mb-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Class</label>
                <select wire:model.live="class_id" class="w-full px-3 py-2 border rounded-lg">
                    <option value="">Select Class</option>
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Section</label>
                <select wire:model="section_id" class="w-full px-3 py-2 border rounded-lg">
                    <option value="">Select Section</option>
                    @foreach ($sections as $section)
                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                <input wire:model="date" type="date" class="w-full px-3 py-2 border rounded-lg">
            </div>
        </div>

        <button wire:click="loadStudents" type="button"
            class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
            Load Students
        </button>
    </div>

    @if (count($students) > 0)
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-4">Mark Attendance</h3>
            <div class="space-y-3">
                @foreach ($students as $student)
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                        <span class="font-medium">{{ $student->name }}</span>
                        <div class="flex gap-4">
                            <label class="flex items-center">
                                <input wire:model="attendance.{{ $student->id }}" type="radio" value="present" class="mr-2">
                                <span class="text-green-600">Present</span>
                            </label>
                            <label class="flex items-center">
                                <input wire:model="attendance.{{ $student->id }}" type="radio" value="absent" class="mr-2">
                                <span class="text-red-600">Absent</span>
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                <button wire:click="save" type="button"
                    class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                    Save Attendance
                </button>
            </div>
        </div>
    @endif
</div>
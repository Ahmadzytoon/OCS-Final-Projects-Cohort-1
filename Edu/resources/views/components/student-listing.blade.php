<?php

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Student;
use App\Models\SchoolClass;
use App\Models\Section;

new class extends Component {
    use WithPagination;

    public $class_id = '';
    public $section_id = '';
    public $classes = [];
    public $sections = [];

    public function mount()
    {
        $this->classes = SchoolClass::all();
    }

    public function updatedClassId($value)
    {
        $this->sections = $value ? Section::where('class_id', $value)->get() : [];
        $this->section_id = '';
        $this->resetPage();
    }

    public function updatedSectionId()
    {
        $this->resetPage();
    }

    public function render()
    {
        $students = Student::with(['schoolClass', 'section'])
            ->when($this->class_id, fn($q) => $q->where('class_id', $this->class_id))
            ->when($this->section_id, fn($q) => $q->where('section_id', $this->section_id))
            ->paginate(10);

        return view('components.student-listing', ['students' => $students]);
    }
};
?>

<div class="py-6">
    <div class="bg-white p-6 rounded-lg shadow mb-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium mb-1">Filter by Class</label>
                <select wire:model.live="class_id" class="w-full px-3 py-2 border rounded-lg">
                    <option value="">All Classes</option>
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Filter by Section</label>
                <select wire:model.live="section_id" class="w-full px-3 py-2 border rounded-lg">
                    <option value="">All Sections</option>
                    @foreach ($sections as $section)
                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Class</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Section</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($students as $student)
                    <tr>
                        <td class="px-6 py-4">{{ $student->name }}</td>
                        <td class="px-6 py-4">{{ $student->schoolClass->name }}</td>
                        <td class="px-6 py-4">{{ $student->section->name }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-gray-500">No students found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4">
            {{ $students->links() }}
        </div>
    </div>
</div>
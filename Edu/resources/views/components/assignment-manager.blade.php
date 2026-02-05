<?php

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Assignment;
use App\Models\SchoolClass;
use App\Models\Subject;
use App\Models\Section;

new class extends Component {
    #[Validate('required|string|max:255')]
    public $title = '';

    #[Validate('nullable|string')]
    public $description = '';

    #[Validate('required|exists:classes,id')]
    public $class_id = '';

    #[Validate('required|exists:subjects,id')]
    public $subject_id = '';

    #[Validate('nullable|exists:sections,id')]
    public $section_id = '';

    #[Validate('required|date')]
    public $due_date = '';

    public $classes = [];
    public $subjects = [];
    public $sections = [];
    public $assignments = [];
    public $showForm = false;

    public function mount()
    {
        $this->loadAssignments();
        $this->classes = SchoolClass::all();
    }

    public function loadAssignments()
    {
        $this->assignments = Assignment::with(['schoolClass', 'subject', 'section'])
            ->where('teacher_id', auth('teacher')->id())
            ->latest()
            ->get();
    }

    public function updatedClassId($value)
    {
        if ($value) {
            $this->subjects = Subject::where('class_id', $value)->get();
            $this->sections = Section::where('class_id', $value)->get();
        } else {
            $this->subjects = [];
            $this->sections = [];
        }
        $this->subject_id = '';
        $this->section_id = '';
    }

    public function save()
    {
        $validated = $this->validate();

        Assignment::create([
            ...$validated,
            'teacher_id' => auth('teacher')->id(),
        ]);

        session()->flash('success', 'Assignment created successfully!');

        $this->reset(['title', 'description', 'class_id', 'subject_id', 'section_id', 'due_date', 'showForm']);
        $this->loadAssignments();
    }

    public function toggleForm()
    {
        $this->showForm = !$this->showForm;
    }

    public function render()
    {
        return view('components.assignment-manager');
    }
};
?>

<div class="py-6">
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-6">
        <button wire:click="toggleForm" type="button"
            class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
            {{ $showForm ? 'Cancel' : 'Create New Assignment' }}
        </button>
    </div>

    @if ($showForm)
        <div class="mb-8 p-6 bg-white rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-4">New Assignment</h3>
            <form wire:submit="save">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                        <input wire:model="title" type="text"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                        @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Class</label>
                        <select wire:model.live="class_id"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">Select Class</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                        @error('class_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
                        <select wire:model="subject_id"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">Select Subject</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                        @error('subject_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Section (Optional)</label>
                        <select wire:model="section_id"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">All Sections</option>
                            @foreach ($sections as $section)
                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                            @endforeach
                        </select>
                        @error('section_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Due Date</label>
                        <input wire:model="due_date" type="date"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                        @error('due_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea wire:model="description" rows="3"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                        @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                        Save Assignment
                    </button>
                </div>
            </form>
        </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Class</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Subject</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Section</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Due Date</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($assignments as $assignment)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->schoolClass->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->subject->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $assignment->section ? $assignment->section->name : 'All' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->due_date->format('M d, Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">No assignments yet</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
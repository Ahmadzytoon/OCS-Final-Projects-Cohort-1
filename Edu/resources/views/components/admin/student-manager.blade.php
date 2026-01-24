<?php
use Livewire\Component;
use App\Models\Student;
use App\Models\SchoolClass;
use App\Models\Section;

new class extends Component {
    public $name = '';
    public $class_id = '';
    public $section_id = '';
    public $editId = null;
    public $showForm = false;

    // updatedClassId logic is handled by $class_id binding triggering re-render,
    // where $sections is re-computed

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'class_id' => 'required|exists:classes,id',
            'section_id' => 'required|exists:sections,id'
        ]);

        if ($this->editId) {
            Student::find($this->editId)->update([
                'name' => $this->name,
                'class_id' => $this->class_id,
                'section_id' => $this->section_id
            ]);
        } else {
            Student::create([
                'name' => $this->name,
                'class_id' => $this->class_id,
                'section_id' => $this->section_id
            ]);
        }

        session()->flash('success', 'Student saved successfully!');
        $this->reset(['name', 'class_id', 'section_id', 'editId', 'showForm']);
    }

    public function edit($id)
    {
        $student = Student::find($id);
        $this->editId = $id;
        $this->name = $student->name;
        $this->class_id = $student->class_id;
        // section_id options will be loaded in render based on class_id
        $this->section_id = $student->section_id;
        $this->showForm = true;
    }

    public function delete($id)
    {
        Student::find($id)->delete();
        session()->flash('success', 'Student deleted!');
    }

    public function render()
    {
        $students = Student::with(['schoolClass', 'section'])->get();
        $classes = SchoolClass::all();
        $sections = $this->class_id ? Section::where('class_id', $this->class_id)->get() : [];

        return view('components.admin.student-manager', compact('students', 'classes', 'sections'));
    }
};
?>
<div class="py-4">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('admin.students.create') }}" class="btn btn-primary shadow-sm">
            <i data-lucide="plus"
                style="width: 18px; display: inline-block; vertical-align: middle; margin-right: 4px;"></i> Add Student
        </a>
    </div>

    @if ($showForm)
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-body">
                <h5 class="card-title fw-bold mb-3">Edit Student</h5>
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input wire:model="name" type="text" placeholder="Student Name" class="form-control">
                    @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Class</label>
                        <select wire:model.live="class_id" class="form-select">
                            <option value="">Select Class</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                        @error('class_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Section</label>
                        <select wire:model="section_id" class="form-select">
                            <option value="">Select Section</option>
                            @foreach ($sections ?? [] as $section)
                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                            @endforeach
                        </select>
                        @error('section_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-end gap-2 mt-4">
                    <button wire:click="showForm = false; reset();" class="btn btn-light border">Cancel</button>
                    <button wire:click="save" class="btn btn-success text-white">Save Changes</button>
                </div>
            </div>
        </div>
    @endif

    <div class="card border-0 shadow-sm overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Name</th>
                        <th>Class</th>
                        <th>Section</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td class="ps-4 fw-medium">{{ $student->name }}</td>
                            <td><span
                                    class="badge bg-primary bg-opacity-10 text-primary border border-primary-subtle">{{ $student->schoolClass->name }}</span>
                            </td>
                            <td><span
                                    class="badge bg-info bg-opacity-10 text-info border border-info-subtle">{{ $student->section->name }}</span>
                            </td>
                            <td class="text-end pe-4">
                                <button wire:click="edit({{ $student->id }})"
                                    class="btn btn-sm btn-outline-primary me-2">Edit</button>
                                <button wire:click="delete({{ $student->id }})"
                                    onclick="return confirm('Delete this student?')"
                                    class="btn btn-sm btn-outline-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
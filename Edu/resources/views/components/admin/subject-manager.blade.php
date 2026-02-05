<?php
use Livewire\Component;
use App\Models\Subject;
use App\Models\SchoolClass;

new class extends Component {
    public $name = '';
    public $class_id = '';
    public $editId = null;
    public $showForm = false;

    public function save()
    {
        $this->validate(['name' => 'required', 'class_id' => 'required|exists:classes,id']);
        if ($this->editId)
            Subject::find($this->editId)->update(['name' => $this->name, 'class_id' => $this->class_id]);
        else
            Subject::create(['name' => $this->name, 'class_id' => $this->class_id]);
        session()->flash('success', 'Subject saved!');
        $this->reset(['name', 'class_id', 'editId', 'showForm']);
    }

    public function edit($id)
    {
        $subject = Subject::find($id);
        $this->editId = $id;
        $this->name = $subject->name;
        $this->class_id = $subject->class_id;
        $this->showForm = true;
    }

    public function delete($id)
    {
        Subject::find($id)->delete();
        session()->flash('success', 'Deleted!');
    }

    public function render()
    {
        $subjects = Subject::with('schoolClass')->get();
        $classes = SchoolClass::all();
        return view('components.admin.⚡subject-manager', compact('subjects', 'classes'));
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

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold m-0">Subjects</h2>
        <a href="{{ route('admin.subjects.create') }}" class="btn btn-primary shadow-sm">
            <i data-lucide="plus"
                style="width: 18px; display: inline-block; vertical-align: middle; margin-right: 4px;"></i> Add Subject
        </a>
    </div>

    @if ($showForm)
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-body">
                <h5 class="card-title fw-bold mb-3">{{ $editId ? 'Edit Subject' : 'Add Subject' }}</h5>
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input wire:model="name" type="text" placeholder="Name" class="form-control">
                    @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Class</label>
                    <select wire:model="class_id" class="form-select">
                        <option value="">Select Class</option>
                        @foreach ($classes as $class) <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                    @error('class_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <button wire:click="showForm = false; reset();" class="btn btn-light border">Cancel</button>
                    <button wire:click="save" class="btn btn-success text-white">Save</button>
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
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subjects as $subject)
                        <tr>
                            <td class="ps-4 fw-medium">{{ $subject->name }}</td>
                            <td><span
                                    class="badge bg-primary bg-opacity-10 text-primary border border-primary-subtle">{{ $subject->schoolClass->name }}</span>
                            </td>
                            <td class="text-end pe-4">
                                <button wire:click="edit({{ $subject->id }})"
                                    class="btn btn-sm btn-outline-primary me-2">Edit</button>
                                <button wire:click="delete({{ $subject->id }})" onclick="return confirm('Delete?')"
                                    class="btn btn-sm btn-outline-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
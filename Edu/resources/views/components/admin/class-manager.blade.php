<?php
use Livewire\Component;
use App\Models\SchoolClass;

new class extends Component {
    public $name = '';
    public $editId = null;
    public $showForm = false;

    // Remove mount/loadClasses to prevent state issues
    // Data is loaded fresh in render()

    public function create()
    {
        $this->validate(['name' => 'required|string|max:255']);
        SchoolClass::create(['name' => $this->name]);
        session()->flash('success', 'Class created!');
        $this->reset(['name', 'showForm']);
    }

    public function edit($id)
    {
        $class = SchoolClass::findOrFail($id);
        $this->editId = $id;
        $this->name = $class->name;
        $this->showForm = true;
    }

    public function update()
    {
        $this->validate(['name' => 'required|string|max:255']);
        SchoolClass::findOrFail($this->editId)->update(['name' => $this->name]);
        session()->flash('success', 'Class updated!');
        $this->reset(['name', 'editId', 'showForm']);
    }

    public function delete($id)
    {
        SchoolClass::findOrFail($id)->delete();
        session()->flash('success', 'Class deleted!');
    }

    public function render()
    {
        $classes = SchoolClass::withCount(['sections', 'subjects', 'students'])->get();
        return view('components.admin.class-manager', compact('classes'));
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
        <h2 class="fw-bold m-0">Classes</h2>
        <a href="{{ route('admin.classes.create') }}" class="btn btn-primary shadow-sm">
            <i data-lucide="plus"
                style="width: 18px; display: inline-block; vertical-align: middle; margin-right: 4px;"></i> Add Class
        </a>
    </div>

    @if ($showForm)
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-body">
                <h5 class="card-title fw-bold mb-3">{{ $editId ? 'Edit Class' : 'Add Class' }}</h5>
                <div class="mb-3">
                    <label class="form-label">Class Name</label>
                    <input wire:model="name" type="text" placeholder="Class Name" class="form-control">
                    @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <button wire:click="showForm = false; reset();" class="btn btn-light border">Cancel</button>
                    <button wire:click="{{ $editId ? 'update' : 'create' }}"
                        class="btn btn-success text-white">Save</button>
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
                        <th>Sections</th>
                        <th>Subjects</th>
                        <th>Students</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classes as $class)
                        <tr>
                            <td class="ps-4 fw-medium">{{ $class->name }}</td>
                            <td><span class="badge bg-light text-dark border">{{ $class->sections_count }}</span></td>
                            <td><span class="badge bg-light text-dark border">{{ $class->subjects_count }}</span></td>
                            <td><span class="badge bg-light text-dark border">{{ $class->students_count }}</span></td>
                            <td class="text-end pe-4">
                                <button wire:click="edit({{ $class->id }})"
                                    class="btn btn-sm btn-outline-primary me-2">Edit</button>
                                <button wire:click="delete({{ $class->id }})" onclick="return confirm('Delete this class?')"
                                    class="btn btn-sm btn-outline-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
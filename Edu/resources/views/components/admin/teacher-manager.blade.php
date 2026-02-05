<?php
use Livewire\Component;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;

new class extends Component {
    public $name = '';
    public $email = '';
    public $password = '';
    public $editId = null;
    public $showForm = false;

    public function save()
    {
        $rules = ['name' => 'required', 'email' => 'required|email|unique:teachers,email,' . $this->editId];
        if (!$this->editId || $this->password)
            $rules['password'] = 'required|min:8';
        $this->validate($rules);

        $data = ['name' => $this->name, 'email' => $this->email];
        if ($this->password)
            $data['password'] = Hash::make($this->password);

        if ($this->editId)
            Teacher::find($this->editId)->update($data);
        else
            Teacher::create($data);

        session()->flash('success', 'Teacher saved!');
        $this->reset(['name', 'email', 'password', 'editId', 'showForm']);
    }

    public function edit($id)
    {
        $teacher = Teacher::find($id);
        $this->editId = $id;
        $this->name = $teacher->name;
        $this->email = $teacher->email;
        $this->showForm = true;
    }

    public function delete($id)
    {
        Teacher::find($id)->delete();
        session()->flash('success', 'Deleted!');
    }

    public function render()
    {
        $teachers = Teacher::all();
        return view('components.admin.teacher-manager', compact('teachers'));
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
        <a href="{{ route('admin.teachers.create') }}" class="btn btn-primary shadow-sm">
            <i data-lucide="plus"
                style="width: 18px; display: inline-block; vertical-align: middle; margin-right: 4px;"></i> Add Teacher
        </a>
    </div>

    @if ($showForm)
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-body">
                <h5 class="card-title fw-bold mb-3">Edit Teacher</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <input wire:model="name" type="text" placeholder="Name" class="form-control">
                        @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input wire:model="email" type="email" placeholder="Email" class="form-control">
                        @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label">Password <span class="text-muted fw-normal small">(Leave blank too keep
                                current)</span></label>
                        <input wire:model="password" type="password" placeholder="New Password" class="form-control">
                        @error('password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
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
                        <th>Email</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $teacher)
                        <tr>
                            <td class="ps-4 fw-medium">{{ $teacher->name }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td class="text-end pe-4">
                                <button wire:click="edit({{ $teacher->id }})"
                                    class="btn btn-sm btn-outline-primary me-2">Edit</button>
                                <button wire:click="delete({{ $teacher->id }})" onclick="return confirm('Delete?')"
                                    class="btn btn-sm btn-outline-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
use Livewire\Component;
use App\Models\SchoolClass;
use App\Models\Section;
use Livewire\Attributes\Layout;

new #[Layout('layouts.admin')] class extends Component {
    public $name = '';
    public $class_id = '';
    public $classes = [];

    public function mount()
    {
        $this->classes = SchoolClass::all();
    }

    public function create()
    {
        $this->validate([
            'class_id' => 'required|exists:classes,id',
            'name' => 'required|string|max:255',
        ]);

        Section::create([
            'class_id' => $this->class_id,
            'name' => $this->name,
        ]);

        session()->flash('success', 'Section Created!');
        return redirect()->route('admin.sections');
    }

    public function render()
    {
        return view('components.admin.create-section');
    }
};
?>

<div class="main-content">
    <div class="flex items-center gap-2 mb-6 text-sm text-gray-500">
        <a href="{{ route('admin.dashboard') }}" class="hover:text-indigo-600">Dashboard</a>
        <x-lucide-chevron-right class="w-4 h-4" />
        <a href="{{ route('admin.sections') }}" class="hover:text-indigo-600">Sections</a>
        <x-lucide-chevron-right class="w-4 h-4" />
        <span class="text-gray-900">Add Section</span>
    </div>

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Add New Section</h1>
        <p class="text-gray-500 mt-1">Divide a class into manageable groups</p>
    </div>

    <div class="max-w-xl bg-white rounded-lg shadow-lg p-8">
        <form wire:submit="create">
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Select Class</label>
                <select wire:model="class_id"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2.5"
                    required>
                    <option value="" disabled selected>Select a class...</option>
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>
                @error('class_id') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Section Name</label>
                <input wire:model="name" type="text"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2.5"
                    placeholder="e.g. A, B, Red, Blue" required>
                @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                <p class="mt-2 text-xs text-gray-500">Usually a single letter (A, B, C) or name.</p>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Max Capacity (Optional)</label>
                <input type="number"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2.5"
                    placeholder="30">
            </div>

            <div class="flex justify-end gap-3 mt-8">
                <a href="{{ route('admin.sections') }}"
                    class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Create
                    Section</button>
            </div>
        </form>
    </div>
</div>
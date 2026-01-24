<?php
use Livewire\Component;
use App\Models\SchoolClass;
use Livewire\Attributes\Layout;

new #[Layout('layouts.admin')] class extends Component {
    public $name = '';
    public $showSuccess = false;

    public function create()
    {
        $this->validate(['name' => 'required|string|max:255']);
        SchoolClass::create(['name' => $this->name]);
        $this->showSuccess = true;
    }

    public function render()
    {
        return view('components.admin.⚡create-class');
    }
};
?>

<div class="main-content">
    <div class="flex items-center gap-2 mb-6 text-sm text-gray-500">
        <a href="{{ route('admin.dashboard') }}" class="hover:text-indigo-600">Dashboard</a>
        <x-lucide-chevron-right class="w-4 h-4" />
        <a href="{{ route('admin.classes') }}" class="hover:text-indigo-600">Classes</a>
        <x-lucide-chevron-right class="w-4 h-4" />
        <span class="text-gray-900">Add Class</span>
    </div>

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Add New Class</h1>
        <p class="text-gray-500 mt-1">Create a new grade level for the school</p>
    </div>

    <div class="max-w-xl bg-white rounded-lg shadow-lg p-8">
        @if (!$showSuccess)
            <form wire:submit="create">
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Class Name</label>
                    <input wire:model="name" type="text"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2.5"
                        placeholder="e.g. Grade 10" required>
                    @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    <p class="mt-2 text-xs text-gray-500">Enter the name of the grade or class level.</p>
                </div>

                <div class="flex justify-end gap-3 mt-8">
                    <a href="{{ route('admin.classes') }}"
                        class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Cancel</a>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Create
                        Class</button>
                </div>
            </form>
        @else
            <div class="flex flex-col items-center justify-center text-center py-4">
                <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center mb-4">
                    <x-lucide-check class="w-6 h-6" />
                </div>
                <h3 class="text-xl font-bold mb-2">Class Created Successfully!</h3>
                <p class="text-gray-500 mb-8">What would you like to do next?</p>

                <div class="flex flex-col gap-3 w-full max-w-xs">
                    <a href="{{ route('admin.sections.create') }}"
                        class="flex items-center justify-center gap-2 w-full px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                        <x-lucide-plus class="w-4 h-4" />
                        Add Sections to Class
                    </a>
                    <a href="{{ route('admin.subjects.create') }}"
                        class="flex items-center justify-center gap-2 w-full px-4 py-2 border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50">
                        <x-lucide-book class="w-4 h-4" />
                        Assign Subjects to Class
                    </a>
                    <a href="{{ route('admin.classes') }}" class="mt-2 text-sm text-gray-500 hover:text-gray-700">Return to
                        Classes List</a>
                </div>
            </div>
        @endif
    </div>
</div>
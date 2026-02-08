<?php

namespace App\Livewire\Instructor;

use Livewire\Component;
use App\Models\Course;
use App\Models\Module;
use App\Models\Topic;

class CourseCurriculum extends Component
{
    public $course;
    public $modules;

    public $isAddingModule = false;
    public $isEditingModule = false;
    public $moduleTitle;
    public $moduleDescription;
    public $moduleIdToEdit;

    protected $rules = [
        'moduleTitle' => 'required|min:3|max:255',
        'moduleDescription' => 'nullable|string',
    ];

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->refreshModules();
    }

    public function refreshModules()
    {
        $this->modules = $this->course->modules()->with('topics')->orderBy('order')->get();
    }

    public function openAddModuleModal()
    {
        $this->reset(['moduleTitle', 'moduleDescription', 'isAddingModule', 'isEditingModule']);
        $this->isAddingModule = true;
        $this->dispatch('open-add-module-modal');
    }

    public function saveModule()
    {
        $this->validate();

        $order = $this->course->modules()->max('order') + 1;

        Module::create([
            'course_id' => $this->course->id,
            'title' => $this->moduleTitle,
            'description' => $this->moduleDescription,
            'order' => $order
        ]);

        $this->refreshModules();
        $this->isAddingModule = false;
        $this->reset(['moduleTitle', 'moduleDescription']);
        $this->dispatch('close-modal');
        $this->dispatch('show-toast', ['type' => 'success', 'message' => 'Module added successfully!']);
    }

    public function editModule($id)
    {
        $module = Module::find($id);
        if ($module) {
            $this->moduleIdToEdit = $module->id;
            $this->moduleTitle = $module->title;
            $this->moduleDescription = $module->description;
            $this->isEditingModule = true;
            $this->dispatch('open-edit-module-modal');
        }
    }

    public function updateModule()
    {
        $this->validate();

        $module = Module::find($this->moduleIdToEdit);
        if ($module) {
            $module->update([
                'title' => $this->moduleTitle,
                'description' => $this->moduleDescription,
            ]);
        }

        $this->refreshModules();
        $this->isEditingModule = false;
        $this->reset(['moduleTitle', 'moduleDescription', 'moduleIdToEdit']);
        $this->dispatch('close-modal');
        $this->dispatch('show-toast', ['type' => 'success', 'message' => 'Module updated successfully!']);
    }

    public function deleteModule($id)
    {
        $module = Module::find($id);
        if ($module) {
            $module->delete();
            $this->refreshModules();
            $this->dispatch('show-toast', ['type' => 'success', 'message' => 'Module deleted successfully!']);
        }
    }

    public function deleteTopic($id)
    {
        $topic = Topic::find($id);
        if ($topic) {
            $topic->delete();
            $this->refreshModules();
            $this->dispatch('show-toast', ['type' => 'success', 'message' => 'Topic deleted successfully!']);
        }
    }

    public function render()
    {
        return view('livewire.instructor.course-curriculum');
    }
}

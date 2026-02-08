<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesFilter extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedCategories = [];
    public $selectedLevels = [];
    public $selectedPricing = [];
    public $sortBy = 'popular';

    protected $queryString = [
        'search' => ['except' => ''],
        'selectedCategories' => ['except' => []],
        'selectedLevels' => ['except' => []],
        'selectedPricing' => ['except' => []],
        'sortBy' => ['except' => 'popular'],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedSelectedCategories()
    {
        $this->resetPage();
    }

    public function updatedSelectedLevels()
    {
        $this->resetPage();
    }

    public function updatedSelectedPricing()
    {
        $this->resetPage();
    }

    public function updatedSortBy()
    {
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->search = '';
        $this->selectedCategories = [];
        $this->selectedLevels = [];
        $this->selectedPricing = [];
        $this->sortBy = 'popular';
        $this->resetPage();
    }

    public function render()
    {
        $categories = Category::all();

        $query = Course::with(['instructor', 'category', 'modules', 'projects', 'reviews', 'enrollments']);

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('short_description', 'like', '%' . $this->search . '%')
                    ->orWhere('full_description', 'like', '%' . $this->search . '%');
            });
        }

        if (!empty($this->selectedCategories)) {
            $query->whereIn('category_id', $this->selectedCategories);
        }

        if (!empty($this->selectedLevels)) {
            $query->whereIn('difficulty', $this->selectedLevels);
        }

        if (!empty($this->selectedPricing)) {
            $query->whereIn('pricing', $this->selectedPricing);
        }

        switch ($this->sortBy) {
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'popular':
            default:
                $query->withCount('enrollments')->orderBy('enrollments_count', 'desc');
                break;
        }

        $courses = $query->paginate(6);

        return view('livewire.courses-filter', [
            'courses' => $courses,
            'categories' => $categories,
        ]);
    }
}

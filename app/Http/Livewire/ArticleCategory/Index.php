<?php

namespace App\Http\Livewire\ArticleCategory;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\ArticleCategory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'name',
        ],
        'sortDirection' => [
            'except' => 'asc',
        ],
    ];

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount()
    {
        $this->sortBy            = 'name';
        $this->sortDirection     = 'asc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new ArticleCategory())->orderable;
    }

    public function render()
    {
        $query = ArticleCategory::advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $articleCategories = $query->paginate($this->perPage);

        return view('livewire.article-category.index', compact('articleCategories', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('article_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        ArticleCategory::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(ArticleCategory $articleCategory)
    {
        abort_if(Gate::denies('article_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $articleCategory->delete();
    }
}

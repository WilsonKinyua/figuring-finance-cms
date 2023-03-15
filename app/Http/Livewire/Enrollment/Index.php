<?php

namespace App\Http\Livewire\Enrollment;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Enrollment;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithSorting, WithConfirmation;

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
            'except' => 'module',
        ],
        'sortDirection' => [
            'except' => 'desc',
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
        $this->sortBy            = 'module';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new Enrollment())->orderable;
    }

    public function render()
    {
        $query = Enrollment::advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $enrollments = $query->paginate($this->perPage);

        return view('livewire.enrollment.index', compact('enrollments', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('enrollment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Enrollment::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Enrollment $enrollment)
    {
        abort_if(Gate::denies('enrollment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $enrollment->delete();
    }
}

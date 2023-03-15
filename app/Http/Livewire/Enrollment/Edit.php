<?php

namespace App\Http\Livewire\Enrollment;

use App\Models\Enrollment;
use Livewire\Component;

class Edit extends Component
{
    public Enrollment $enrollment;

    public function mount(Enrollment $enrollment)
    {
        $this->enrollment = $enrollment;
    }

    public function render()
    {
        return view('livewire.enrollment.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->enrollment->save();

        return redirect()->route('admin.enrollments.index');
    }

    protected function rules(): array
    {
        return [
            'enrollment.module' => [
                'string',
                'required',
            ],
            'enrollment.email' => [
                'string',
                'required',
                'unique:enrollments,email,' . $this->enrollment->id,
            ],
            'enrollment.phone_number' => [
                'string',
                'nullable',
            ],
        ];
    }
}

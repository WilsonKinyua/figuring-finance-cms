<?php

namespace App\Http\Livewire\Testimonial;

use App\Models\Testimonial;
use Livewire\Component;

class Create extends Component
{
    public Testimonial $testimonial;

    public function mount(Testimonial $testimonial)
    {
        $this->testimonial = $testimonial;
    }

    public function render()
    {
        return view('livewire.testimonial.create');
    }

    public function submit()
    {
        $this->validate();

        $this->testimonial->save();

        return redirect()->route('admin.testimonials.index');
    }

    protected function rules(): array
    {
        return [
            'testimonial.name' => [
                'string',
                'nullable',
            ],
            'testimonial.testimony_description' => [
                'string',
                'required',
            ],
        ];
    }
}

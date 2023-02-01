<?php

namespace App\Http\Livewire\ArticleCategory;

use App\Models\ArticleCategory;
use Livewire\Component;

class Create extends Component
{
    public ArticleCategory $articleCategory;

    public function mount(ArticleCategory $articleCategory)
    {
        $this->articleCategory = $articleCategory;
    }

    public function render()
    {
        return view('livewire.article-category.create');
    }

    public function submit()
    {
        $this->validate();

        $this->articleCategory->save();

        return redirect()->route('admin.article-categories.index');
    }

    protected function rules(): array
    {
        return [
            'articleCategory.name' => [
                'string',
                'required',
                'unique:article_categories,name',
            ],
        ];
    }
}

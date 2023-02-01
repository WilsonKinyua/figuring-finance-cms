<?php

namespace App\Http\Livewire\ArticleCategory;

use App\Models\ArticleCategory;
use Livewire\Component;

class Edit extends Component
{
    public ArticleCategory $articleCategory;

    public function mount(ArticleCategory $articleCategory)
    {
        $this->articleCategory = $articleCategory;
    }

    public function render()
    {
        return view('livewire.article-category.edit');
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
                'unique:article_categories,name,' . $this->articleCategory->id,
            ],
        ];
    }
}

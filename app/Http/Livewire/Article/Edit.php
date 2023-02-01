<?php

namespace App\Http\Livewire\Article;

use App\Models\Article;
use App\Models\ArticleCategory;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Article $article;

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    public function mount(Article $article)
    {
        $this->article = $article;
        $this->initListsForFields();
        $this->mediaCollections = [
            'article_article_image' => $article->article_image,
        ];
    }

    public function render()
    {
        return view('livewire.article.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->article->save();
        $this->syncMedia();

        return redirect()->route('admin.articles.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->article->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'article.title' => [
                'string',
                'required',
                'unique:articles,title,' . $this->article->id,
            ],
            'article.category_id' => [
                'integer',
                'exists:article_categories,id',
                'required',
            ],
            'article.description' => [
                'string',
                'required',
            ],
            'mediaCollections.article_article_image' => [
                'array',
                'required',
            ],
            'mediaCollections.article_article_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['category'] = ArticleCategory::pluck('name', 'id')->toArray();
    }
}

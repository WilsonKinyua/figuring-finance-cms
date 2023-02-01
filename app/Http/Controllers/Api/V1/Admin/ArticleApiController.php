<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Http\Resources\Admin\ArticleResource;
use App\Models\Article;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ArticleApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('article_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ArticleResource(Article::with(['category'])->get());
    }

    public function store(StoreArticleRequest $request)
    {
        $article = Article::create($request->validated());

        if ($request->input('article_article_image', false)) {
            $article->addMedia(storage_path('tmp/uploads/' . basename($request->input('article_article_image'))))->toMediaCollection('article_article_image');
        }

        return (new ArticleResource($article))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Article $article)
    {
        abort_if(Gate::denies('article_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ArticleResource($article->load(['category']));
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        $article->update($request->validated());

        if ($request->input('article_article_image', false)) {
            if (!$article->article_article_image || $request->input('article_article_image') !== $article->article_article_image->file_name) {
                if ($article->article_article_image) {
                    $article->article_article_image->delete();
                }
                $article->addMedia(storage_path('tmp/uploads/' . basename($request->input('article_article_image'))))->toMediaCollection('article_article_image');
            }
        } elseif ($article->article_article_image) {
            $article->article_article_image->delete();
        }

        return (new ArticleResource($article))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Article $article)
    {
        abort_if(Gate::denies('article_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $article->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

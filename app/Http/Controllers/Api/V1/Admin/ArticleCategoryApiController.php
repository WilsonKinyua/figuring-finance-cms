<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleCategoryRequest;
use App\Http\Requests\UpdateArticleCategoryRequest;
use App\Http\Resources\Admin\ArticleCategoryResource;
use App\Models\ArticleCategory;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ArticleCategoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('article_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ArticleCategoryResource(ArticleCategory::all());
    }

    public function store(StoreArticleCategoryRequest $request)
    {
        $articleCategory = ArticleCategory::create($request->validated());

        return (new ArticleCategoryResource($articleCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ArticleCategory $articleCategory)
    {
        abort_if(Gate::denies('article_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ArticleCategoryResource($articleCategory);
    }

    public function update(UpdateArticleCategoryRequest $request, ArticleCategory $articleCategory)
    {
        $articleCategory->update($request->validated());

        return (new ArticleCategoryResource($articleCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ArticleCategory $articleCategory)
    {
        abort_if(Gate::denies('article_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $articleCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

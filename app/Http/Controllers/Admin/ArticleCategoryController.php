<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ArticleCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('article_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.article-category.index');
    }

    public function create()
    {
        abort_if(Gate::denies('article_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.article-category.create');
    }

    public function edit(ArticleCategory $articleCategory)
    {
        abort_if(Gate::denies('article_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.article-category.edit', compact('articleCategory'));
    }

    public function show(ArticleCategory $articleCategory)
    {
        abort_if(Gate::denies('article_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.article-category.show', compact('articleCategory'));
    }
}

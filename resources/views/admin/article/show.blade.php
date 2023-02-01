@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.article.title_singular') }}:
                    {{ trans('cruds.article.fields.id') }}
                    {{ $article->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.article.fields.id') }}
                            </th>
                            <td>
                                {{ $article->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.article.fields.title') }}
                            </th>
                            <td>
                                {{ $article->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.article.fields.category') }}
                            </th>
                            <td>
                                @if($article->category)
                                    <span class="badge badge-relationship">{{ $article->category->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.article.fields.description') }}
                            </th>
                            <td>
                                {{ $article->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.article.fields.article_image') }}
                            </th>
                            <td>
                                @foreach($article->article_image as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('article_edit')
                    <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
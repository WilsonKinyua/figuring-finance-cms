@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.articleCategory.title_singular') }}:
                    {{ trans('cruds.articleCategory.fields.id') }}
                    {{ $articleCategory->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('article-category.edit', [$articleCategory])
        </div>
    </div>
</div>
@endsection
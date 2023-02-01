@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.contactUs.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('contact_us_create')
                    <a class="btn btn-indigo" href="{{ route('admin.contactuses.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.contactUs.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('contact-us.index')

    </div>
</div>
@endsection
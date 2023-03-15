@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.enrollment.title_singular') }}:
                    {{ trans('cruds.enrollment.fields.id') }}
                    {{ $enrollment->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('enrollment.edit', [$enrollment])
        </div>
    </div>
</div>
@endsection
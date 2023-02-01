@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.testimonial.title_singular') }}:
                    {{ trans('cruds.testimonial.fields.id') }}
                    {{ $testimonial->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('testimonial.edit', [$testimonial])
        </div>
    </div>
</div>
@endsection
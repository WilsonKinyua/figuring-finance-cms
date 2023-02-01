@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.testimonial.title_singular') }}:
                    {{ trans('cruds.testimonial.fields.id') }}
                    {{ $testimonial->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.testimonial.fields.id') }}
                            </th>
                            <td>
                                {{ $testimonial->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.testimonial.fields.name') }}
                            </th>
                            <td>
                                {{ $testimonial->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.testimonial.fields.testimony_description') }}
                            </th>
                            <td>
                                {{ $testimonial->testimony_description }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('testimonial_edit')
                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.enrollment.title_singular') }}:
                    {{ trans('cruds.enrollment.fields.id') }}
                    {{ $enrollment->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.enrollment.fields.id') }}
                            </th>
                            <td>
                                {{ $enrollment->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.enrollment.fields.module') }}
                            </th>
                            <td>
                                {{ $enrollment->module }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.enrollment.fields.email') }}
                            </th>
                            <td>
                                {{ $enrollment->email }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.enrollment.fields.phone_number') }}
                            </th>
                            <td>
                                {{ $enrollment->phone_number }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('enrollment_edit')
                    <a href="{{ route('admin.enrollments.edit', $enrollment) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.enrollments.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
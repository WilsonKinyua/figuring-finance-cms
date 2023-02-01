@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.contactUs.title_singular') }}:
                    {{ trans('cruds.contactUs.fields.id') }}
                    {{ $contactUs->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.contactUs.fields.id') }}
                            </th>
                            <td>
                                {{ $contactUs->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.contactUs.fields.name') }}
                            </th>
                            <td>
                                {{ $contactUs->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.contactUs.fields.email') }}
                            </th>
                            <td>
                                <a class="link-light-blue" href="mailto:{{ $contactUs->email }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $contactUs->email }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.contactUs.fields.phone') }}
                            </th>
                            <td>
                                {{ $contactUs->phone }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.contactUs.fields.message') }}
                            </th>
                            <td>
                                {{ $contactUs->message }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('contact_us_edit')
                    <a href="{{ route('admin.contactuses.edit', $contactUs) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.contactuses.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EnrollmentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('enrollment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.enrollment.index');
    }

    public function create()
    {
        abort_if(Gate::denies('enrollment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.enrollment.create');
    }

    public function edit(Enrollment $enrollment)
    {
        abort_if(Gate::denies('enrollment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.enrollment.edit', compact('enrollment'));
    }

    public function show(Enrollment $enrollment)
    {
        abort_if(Gate::denies('enrollment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.enrollment.show', compact('enrollment'));
    }
}

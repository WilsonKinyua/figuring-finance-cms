<?php

namespace App\Http\Requests;

use App\Models\Enrollment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEnrollmentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('enrollment_create'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'module' => [
                'string',
                'required',
            ],
            'email' => [
                'string',
                'required',
                'unique:enrollments,email',
            ],
            'phone_number' => [
                'string',
                'nullable',
            ],
        ];
    }
}

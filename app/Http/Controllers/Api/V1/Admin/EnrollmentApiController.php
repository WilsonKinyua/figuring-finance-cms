<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEnrollmentRequest;
use App\Http\Requests\UpdateEnrollmentRequest;
use App\Http\Resources\Admin\EnrollmentResource;
use App\Mail\FiguringFinanceMail;
use App\Models\Enrollment;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class EnrollmentApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('enrollment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EnrollmentResource(Enrollment::all());
    }

    public function store(Request $request)
    {
        $email = $request->email;
        $enrollment = Enrollment::where('email', $email)->first();
        if ($enrollment) {
            return response()->json([
                'message' => 'Email already exists.'
            ], 400);
        }

        $enrollment = Enrollment::create($request->validate([
            'email' => 'required|email',
            'module' => 'required|string',
            "phone_number" => "string",
        ]));

        $emailMessage = "A new subscriber has enrolled for " . $request->module . " on Figuring Finance website. Subscriber's email is " . $email . ". Subscriber's phone number is " . $request->phone_number . ". ";

        Mail::to('wilsonkinyuam@gmail.com')->send(new FiguringFinanceMail($emailMessage));

        return response()->json([
            'message' => 'Enrollment data sent successful.',
        ], 200);
    }

    public function show(Enrollment $enrollment)
    {
        abort_if(Gate::denies('enrollment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EnrollmentResource($enrollment);
    }

    public function update(UpdateEnrollmentRequest $request, Enrollment $enrollment)
    {
        $enrollment->update($request->validated());

        return (new EnrollmentResource($enrollment))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Enrollment $enrollment)
    {
        abort_if(Gate::denies('enrollment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $enrollment->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

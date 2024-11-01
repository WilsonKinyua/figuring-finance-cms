<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\SubscriptionResource;
use App\Mail\FiguringFinanceMail;
use App\Mail\SendGuide;
use App\Models\Subscription;
use Carbon\Carbon;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class SubscriptionApiController extends Controller
{
    public function index()
    {
        // abort_if(Gate::denies('subscription_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SubscriptionResource(Subscription::all());
    }

    public function store(Request $request)
    {
        // $request->request->add(['_token' => csrf_token()]);    

        $email = $request->email;
        $subscription = Subscription::where('email', $email)->first();
        if ($subscription) {
            return response()->json([
                'message' => 'Email already exists. Check your inbox for a guide that was sent on ' . Carbon::parse($subscription->created_at)->format('d M Y') . '.'
            ], 400);
        }

        $subscription = Subscription::create($request->validate([
            'email' => 'required|email',
            'name' => 'required|string',
        ]));

        // send email with guide file attached
        $email = $request->email;
        $name = $request->name;
        $subject = 'Your guide on Money Revamp Roadmap';
        $file = public_path() . '/docs/Money-Revamp-Figuring-Finance.pdf';

        Mail::to($email)->send(new SendGuide($subject, $name, $file)); // send email on subscription
        $emailMessage = "A new subscriber has subscribed to Your guide on Money Revamp Roadmap on Figuring Finance website. Subscriber's email is " . $email . ". Subscriber's name is " . $name . ".";
        Mail::to('hello@figuring-finance.com')->send(new FiguringFinanceMail($emailMessage));
        // if response successful, return success message 
        return response()->json([
            'message' => 'Email sent successfully. Check your inbox for the guide.',
        ], 200);
        // return (new SubscriptionResource($subscription))
        //     ->response()
        //     ->setStatusCode(Response::HTTP_CREATED);
    }

    public function destroy(Subscription $subscription)
    {
        // abort_if(Gate::denies('subscription_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscription->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

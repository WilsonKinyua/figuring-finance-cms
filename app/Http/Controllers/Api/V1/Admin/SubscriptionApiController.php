<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\SubscriptionResource;
use App\Models\Subscription;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubscriptionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('subscription_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SubscriptionResource(Subscription::all());
    }

    public function destroy(Subscription $subscription)
    {
        abort_if(Gate::denies('subscription_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscription->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

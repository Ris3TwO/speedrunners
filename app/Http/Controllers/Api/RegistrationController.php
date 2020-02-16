<?php

namespace App\Http\Controllers\Api;

use App\Events\RegistrationWasStored;
use App\Registration;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Http\Requests\StoreRegistrationRequest;

class RegistrationController extends ApiController
{
    /**
     * Store a new record in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegistrationRequest $request, Registration $registration)
    {
        try {
            // The data provided are saved.
            $res = $registration->create($request->all());

            // The mail is sent with the saved information
            RegistrationWasStored::dispatch($res);

            return $this->successResponse(trans('messages.successful_registration'), 200);
        } catch (QueryException $ex) {
            if (!config('app.debug')) {
                return $this->errorResponse(trans('messages.unexpected_problem'), 500);
            }
            return $this->errorResponse($ex->getMessage(), 500);
        }
    }
}

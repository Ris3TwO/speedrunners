<?php

namespace App\Http\Controllers\Api;

use App\ArgentinaRegistration;
use App\ChileRegistration;
use App\Events\RegistrationWasStored;
use App\Registration;
use App\ColombiaRegistration;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Http\Requests\StoreRegistrationRequest;
use App\MexicoRegistration;
use App\PanamaRegistration;
use App\PeruRegistration;
use App\Traits\adidasApi;

class RegistrationController extends ApiController
{
    use adidasApi;
    /**
     * Store a new record in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegistrationRequest $request, Registration $registration)
    {
        try {


            $url_parts = parse_url($request->url, PHP_URL_PATH);
            // The data provided are saved.
            $registration->create($request->all());

            if ($url_parts === '/colombia') {
                ColombiaRegistration::create($request->all());
            } elseif ($url_parts === '/brasil') {
                BrasilRegistration::create($request->all());
            } elseif ($url_parts === '/chile') {
                ChileRegistration::create($request->all());
            } elseif ($url_parts === '/argentina') {
                ArgentinaRegistration::create($request->all());
            } elseif ($url_parts === '/mexico') {
                MexicoRegistration::create($request->all());
            } elseif ($url_parts === '/peru') {
                PeruRegistration::create($request->all());
            } elseif ($url_parts === '/panama') {
                PanamaRegistration::create($request->all());
            }

            if (strtolower($request->gender) === "masculino")
            {
                $gender = "m";
            }else{
                $gender = "f";
            }

            $data = [
                'firstName' => $request->names,
                'lastName' => $request->last_names,
                'gender' => $gender,
                'email' => $request->email,
                'countryOfSite' => substr($url_parts, 1),
                'dateOfBirth' => $request->age,
                'receive_notification' => $request->email_notices,
            ];

            // Inyect data
            $this->createSubscription($data);

            return $this->successResponse(trans('messages.successful_registration'), 200);
        } catch (QueryException $ex) {
            if (!config('app.debug')) {
                return $this->errorResponse(trans('messages.unexpected_problem'), 500);
            }
            return $this->errorResponse($ex->getMessage(), 500);
        }
    }
}

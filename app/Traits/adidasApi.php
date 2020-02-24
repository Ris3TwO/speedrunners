<?php

namespace App\Traits;


use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Arr;

trait adidasApi
{
    private $_prefix = 'scvRESTServices';
    private $_source = "PENDIENTE";

    public function createSubscription($data)
    {
        $consentValue = 'N';
        if ($data['receive_notification'] == 1) {
            $consentValue = 'Y';
        }
        $data = Arr::only($data, ['firstName', 'lastName', 'gender', 'email', 'countryOfSite', 'dateOfBirth']);
        $data['gender'] = strtoupper($data['gender']);
        $data['clientId'] = config('services.adidas.client_id');
        $data['source'] = $this->_source;
        $data['newsletterTypeId'] = 100;

        $data['consents'] = [
            'consent' => [
                [
                    'consentType' => 'AMF',
                    'consentValue' => $consentValue,
                ]
            ]
        ];
        $response = Curl::to(config('services.adidas.endpoint') . '/' . $this->_prefix . '/account/createSubscription')
            ->withData($data)
            ->asJson()
            ->post();
        return [
            'request' => null,
            'response' => $response,
        ];
    }
}

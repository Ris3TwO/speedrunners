<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use \Illuminate\Http\Response as Res;
use Illuminate\Database\Eloquent\Model;

trait ApiResponser
{
    protected $statusCode = Res::HTTP_OK;

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param $message
     * @return json response
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    protected function successResponse($data, $message = '¡Registro exitoso!', $code)
    {
        return $this->respond([
            'status' => 'success',
            'status_code' => $code,
            'message' => $message,
            'data' => $data,
        ]);
    }

    protected function errorResponse($message = '¡Ups! Parece que algo no anda bien', $code)
    {
        return $this->respond([
            'status' => 'error',
            'status_code' => $code,
            'message' => $message,
        ]);
    }

    protected function errorResponseWithErrors($errors, $message = '¡Ups! Parece que algo no anda bien', $code)
    {
        return $this->respond([
            'status' => 'error',
            'status_code' => $code,
            'message' => $message,
            'errors' => $errors,
        ]);
    }

    public function respond($data, $headers = [])
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }
}

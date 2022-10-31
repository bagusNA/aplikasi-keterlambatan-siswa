<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function jsonRes($data, $status)
    {
        return response()->json($data, $status);
    }

    public function successRes($data)
    {
        return $this->jsonRes($data, Response::HTTP_OK);
    }

    public function unauthRes($message)
    {
        return $this->jsonRes([
            'message' => $message
        ], Response::HTTP_UNAUTHORIZED);
    }

    public function validationErrorRes($errors)
    {
        return $this->jsonRes([
            'message' => 'Invalid form field(s).',
            'errors' => $errors
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}

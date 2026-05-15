<?php

namespace App\Http\Exceptions;

use App\RestResponseTrait;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpFoundation\Response;

class Handler
{
    use RestResponseTrait;

    public function handle(Exception $e)
    {

        return $this->error(message: $e->getMessage(), code: $this->mapExceptionCode($e));
    }

    private function mapExceptionCode(Exception $e): int
    {
        if ($e instanceof AuthenticationException) {
            return Response::HTTP_UNAUTHORIZED;
        }

        return $e->getCode();
    }
}

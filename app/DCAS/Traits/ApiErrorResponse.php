<?php

namespace App\DCAS\Traits;

use Symfony\Component\HttpFoundation\Response as SymphonyResponse;

trait ApiErrorResponse
{
    /**
     * @var int
     */
    protected $StatusCode = SymphonyResponse::HTTP_OK;

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->StatusCode;
    }

    /**
     * @param mixed $StatusCode
     * @return $this
     */
    public function setStatusCode($StatusCode)
    {
        $this->StatusCode = $StatusCode;

        return $this;
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondNotFound($message = 'Not found.')
    {
        return $this->setStatusCode(SymphonyResponse::HTTP_NOT_FOUND)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondAccountAlreadyExists($message = 'Account already exists.')
    {
        return $this->setStatusCode(SymphonyResponse::HTTP_CONFLICT)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondAccountIsDisabled($message = 'Account is disabled.')
    {
        return $this->setStatusCode(SymphonyResponse::HTTP_FORBIDDEN)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondAuthenticationFailed($message = 'Authentication failed.')
    {
        return $this->setStatusCode(SymphonyResponse::HTTP_FORBIDDEN)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondInsufficientAccountPermissions($message = 'Insufficient account permissions.')
    {
        return $this->setStatusCode(SymphonyResponse::HTTP_NOT_FOUND)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondUnprocessableEntity($message = 'Unprocessable entity.')
    {
        return $this->setStatusCode(SymphonyResponse::HTTP_UNPROCESSABLE_ENTITY)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondUnsupportedQueryParameter($message = 'Unsupported query parameter.')
    {
        return $this->setStatusCode(SymphonyResponse::HTTP_NOT_FOUND)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondUnsupportedMediaType($message = 'Unsupported media type.')
    {
        return $this->setStatusCode(SymphonyResponse::HTTP_UNSUPPORTED_MEDIA_TYPE)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondNotImplemented($message = 'Not implemented.')
    {
        return $this->setStatusCode(SymphonyResponse::HTTP_NOT_IMPLEMENTED)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondMovedPermanently($message = 'Moved permanently.')
    {
        return $this->setStatusCode(SymphonyResponse::HTTP_MOVED_PERMANENTLY)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondMovedTemporarily($message = 'Moved temporarily.')
    {
        return $this->setStatusCode(302)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondResourceCreated($message = 'Resource created.')
    {
        return $this->setStatusCode(SymphonyResponse::HTTP_CREATED)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondTooManyRequests($message = 'Too many requests.')
    {
        return $this->setStatusCode(SymphonyResponse::HTTP_TOO_MANY_REQUESTS)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondNoDataReturned($message = 'No data returned.')
    {
        return $this->setStatusCode(SymphonyResponse::HTTP_NOT_MODIFIED)->respondWithError($message);
    }

    /**
     * @param $data
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function respond($data, $headers = [])
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }

    /**
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }
}
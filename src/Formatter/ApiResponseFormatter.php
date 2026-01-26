<?php
declare(strict_types=1);

namespace App\Formatter;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ApiResponseFormatter
{
    private $data = null;
    private string $message = 'OK';
    private array $errors = [];
    private int $statusCode = Response::HTTP_OK;
    private array $additionalData = [];

    public function withData($data): self
    {
        $this->data = $data;
        return $this;
    }

    public function format(): JsonResponse
    {
        return new JsonResponse([
            'data' => $this->data,
            'messages' => $this->message,
            'errors' => $this->errors ?: null,
            'statusCode' => (string)$this->statusCode,
            'additionalData' => $this->additionalData ?: null
        ], $this->statusCode);
    }
    public function createSuccessResponse(array $data, int $status = 200): JsonResponse
    {
        return new JsonResponse([
            'status' => 'success',
            'data' => $data
        ], $status);
    }

    public function createErrorResponse(string $message, int $status = 400): JsonResponse
    {
        return new JsonResponse([
            'status' => 'error',
            'message' => $message
        ], $status);
    }
}

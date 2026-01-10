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
}

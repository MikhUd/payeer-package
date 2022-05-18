<?php

declare(strict_types=1);

namespace MikhUd\PayeerPackage;

use MikhUd\PayeerPackage\Contracts\RequestContract;
use MikhUd\PayeerPackage\Exceptions\PayeerException;

/**
 * Класс Request.
 */
class Request implements RequestContract
{
    /**
     * Конструктор.
     *
     * @param string $api_id
     * @param string $api_secret
     * @param array $errors
     * 
     * @return void
     */
    public function __construct(
        private string $api_id,
        private string $api_secret,
        private array $errors
    ) {}

    /**
     * Отправка curl запроса на endpoint.
     *
     * @param array $request
     * 
     * @return array
     */
    public function sendRequest(array $request = []): array
    {
        $msec = round(microtime(true) * 1000);

        $request['post']['ts'] = $msec;

        $post = json_encode($request['post']);

        $sign = hash_hmac('sha256', $request['method'] . $post, $this->api_secret);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://payeer.com/api/trade/" . $request['method']);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "API-ID: " . $this->api_id,
            "API-SIGN: " . $sign
        ]);

        $response = json_decode(curl_exec($ch), true);
        curl_close($ch);

        if (!$response['success']) {
            $this->errors = $response['error'];

            match ($response['error']['code']) {
                'INVALID_SIGNATURE' => throw PayeerException::invalidSignature($this->api_id, $this->api_secret),
                default => throw new PayeerException('Something went wrong', $response['error']['code'])
            };
        }

        return $response;
    }

    /**
     * Получение ошибки curl запроса на endpoint.
     *
     * @return array
     */
    public function getError(): array
    {
        return $this->errors;
    }
}
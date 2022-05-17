<?php

declare(strict_types=1);

namespace MikhUd\PayeerPackage;

use Exception;
use MikhUd\PayeerPackage\Contracts\RequestContract;

class Request implements RequestContract
{
    const api_params = [
        'key' => 'api_secret_key',
        'id' => 'bd443f00-092c-4436-92a4-a704ef679e24'
    ];

    public function __construct(
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

        $sign = hash_hmac('sha256', $request['method'] . $post, self::api_params['key']);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://payeer.com/api/trade/" . $request['method']);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "API-ID: " . self::api_params['id'],
            "API-SIGN: " . $sign
        ]);

        $response = json_decode(curl_exec($ch), true);
        curl_close($ch);

        if ($response['success'] !== true) {
            $this->errors = $response['error'];
            throw new Exception($response['error']['code']);
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
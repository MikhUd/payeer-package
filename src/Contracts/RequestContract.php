<?php

declare(strict_types=1);

namespace MikhUd\PayeerPackage\Contracts;

interface RequestContract
{
    /**
     * Отправка curl запроса на endpoint.
     *
     * @param array $request
     * 
     * @return array
     */
    public function sendRequest(array $request): array;

    /**
     * Получение ошибки curl запроса на endpoint.
     *
     * @return array
     */
    public function getError(): array;
}
<?php

declare(strict_types=1);

namespace MikhUd\PayeerPackage\Exceptions;

use Exception;

/**
 * Класс PayeerException.
 */
class PayeerException extends Exception
{
    /**
     * Invalid signature exception.
     *
     * @param string $api_id
     * @param string $api_secret
     *
     * @return PayeerException
     */
    public static function invalidSignature(string $api_id, string $api_secret): self
    {
        return new static(
            'Invalid signature error, пожалуйста, проверьте правильность введенных api_id: ' . $api_id.', api_secret: ' . $api_secret
        );
    }
}
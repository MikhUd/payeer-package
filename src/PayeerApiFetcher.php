<?php

declare(strict_types=1);

namespace MikhUd\PayeerPackage;

use MikhUd\PayeerPackage\Contracts\PayeerApiFetcherContract;

class PayeerApiFetcher implements PayeerApiFetcherContract
{
    public function __construct(
        private Request $request
    ) {}

    /**
     * Проверка соединения, получение времени сервера.
     *
     * @return array
     */
    public function getTime(): array
    {
        return [];
    }

    /**
     * Получение лимитов, доступных пар и их параметров.
     *
     * @param array $request
     * 
     * @return array
     */
    public function getInfo(array $request = []): array
    {
        return [];
    }

    /**
     * Получение доступных ордеров по указанным парам.
     *
     * @param array $request
     * 
     * @return array
     */
    public function getOrders(array $request = []): array
    {
        return [];
    }

    /**
     * Получение баланса пользователя.
     * 
     * @return array
     */
    public function getAccount(): array
    {
        return [];
    }

    /**
     * Создание ордера поддерживаемых типов: лимит, маркет, стоп-лимит.
     * 
     * @param array $request
     * 
     * @return array
     */
    public function createOrder(array $request = []): array
    {
        return [];
    }

    /**
     * Отмена своего ордера по его id.
     * 
     * @param array $request
     * 
     * @return array
     */
    public function cancelOrder(array $request = []): array
    {
        return [];
    }

    /**
     * Отмена всех/части своих ордеров.
     * 
     * @param array $request
     * 
     * @return array
     */
    public function cancelOrders(array $request = []): array
    {
        return [];
    }

    /**
     * Получение подробной информации о своем ордере по его id.
     * 
     * @param array $request
     * 
     * @return array
     */
    public function getOrderStatus(array $request = []): array
    {
        return [];
    }

    /**
     * Получение своих открытых ордеров с воможностью фильтрации.
     * 
     * @param array $request
     * 
     * @return array
     */
    public function getMyOrders(array $request = []): array
    {
        return [];
    }

    /**
     * Получение статистики цен и их колебания за последние 24 часа.
     * 
     * @param array $request
     * 
     * @return array
     */
    public function getTickers(array $request = []): array
    {
        return [];
    }

    /**
     * Получение истории своих ордеров с возможностью фильтрации и постраничной загрузки.
     * 
     * @param array $request
     * 
     * @return array
     */
    public function getMyHistory(array $request = []): array
    {
        return [];
    }

    /**
     * Получение своих сделок с возможностью фильтрации и постраничной загрузки.
     * 
     * @param array $request
     * 
     * @return array
     */
    public function getMyTrades(array $request = []): array
    {
        return [];
    }
}
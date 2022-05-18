<?php

declare(strict_types=1);

namespace MikhUd\PayeerPackage;

use MikhUd\PayeerPackage\Contracts\PayeerApiFetcherContract;

/**
 * Класс PayeerApiFetcher.
 */
class PayeerApiFetcher implements PayeerApiFetcherContract
{
    /**
     * Конструктор.
     *
     * @param Request $request
     * 
     * @return void
     */
    public function __construct(
        private Request $request
    ) {}

    /**
     * Отправка запроса.
     *
     * @param string $method
     * @param array $request
     * 
     * @return array
     */
    private function sendRequest(string $method, array $request = []): array
    {
        $fields = [
            'method' => $method
        ];
        $fields += $request;

        return $this->request->sendRequest($fields); 
    }

    /**
     * Проверка соединения, получение времени сервера.
     *
     * @return array
     */
    public function getTime(): array
    {
        return $this->sendRequest('time');
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
        return $this->sendRequest('info', $request);
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
        return $this->sendRequest('orders', $request);
    }

    /**
     * Получение баланса пользователя.
     * 
     * @return array
     */
    public function getAccount(): array
    {
        return $this->sendRequest('account');
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
        return $this->sendRequest('order_create', $request);
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
        return $this->sendRequest('order_cancel', $request);
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
        return $this->sendRequest('orders_cancel', $request);
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
        return $this->sendRequest('order_status', $request);
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
        return $this->sendRequest('my_orders', $request);
    }

    /**
     * Получение статистики цен и их колебания за последние 24 часа.
     * 
     * @param array $request
     * 
     * @return array
     */
    public function getTicker(array $request = []): array
    {
        return $this->sendRequest('ticker', $request);
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
        return $this->sendRequest('my_history', $request);
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
        return $this->sendRequest('my_trades', $request);
    }
}
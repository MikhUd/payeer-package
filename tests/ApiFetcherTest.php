<?php

use MikhUd\PayeerPackage\PayeerApiFetcher;
use MikhUd\PayeerPackage\Request;

$apiFetcher = new PayeerApiFetcher(new Request('', '', []));

test('can send request to api time endpoint', function () use($apiFetcher) {
    $response = $apiFetcher->getTime();

    expect($response)->toBeArray();
});

test('can send request to api info endpoint with filters', function () use($apiFetcher) {
    $fields = [
        'post' => [
            'pair' => 'BTC_USD,BTC_RUB'
        ]
    ];
    
    $response = $apiFetcher->getInfo($fields);

    expect($response['pairs'])->toBeArray()->toHaveKeys(['BTC_USD', 'BTC_RUB']);
});

test('can send request to api orders endpoint with filters', function () use($apiFetcher) {
    $fields = [
        'post' => [
            'pair' => 'BTC_USD,BTC_RUB'
        ]
    ];
    
    $response = $apiFetcher->getOrders($fields);

    expect($response['pairs'])->toBeArray()->toHaveKeys(['BTC_USD', 'BTC_RUB']);
});

test('can send request to api account endpoint', function () use($apiFetcher) {
    $response = $apiFetcher->getAccount();

    expect($response)->toBeArray();
});

test('can send request to api create_order endpoint', function () use($apiFetcher) {
    $fields = [
        'post' => [
            'pair' => 'TRX_USD',
            'type' => 'limit',
            'action' => 'buy',
            'amount' => '10',
            'price' => '0.08'
        ]
    ];

    $response = $apiFetcher->createOrder($fields);

    expect($response)->toBeArray();
});

test('can send request to api order_cancel endpoint', function () use($apiFetcher) {
    $fields = [
        'post' => [
            'order_id' => '36942337'
        ]
    ];

    $response = $apiFetcher->cancelOrder($fields);

    expect($response)->toBeArray();
});

test('can send request to api orders_cancel endpoint', function () use($apiFetcher) {
    $fields = [
        'post' => [
            'pair' => 'TRX_RUB,DOGE_RUB',
            'action' => 'buy'
        ]
    ];

    $response = $apiFetcher->cancelOrders($fields);

    expect($response)->toBeArray();
});

test('can send request to api order_status endpoint', function () use($apiFetcher) {
    $fields = [
        'post' => [
            'order_id' => '36942337'
        ]
    ];

    $response = $apiFetcher->getOrderStatus($fields);

    expect($response)->toBeArray();
});

test('can send request to api my_orders endpoint', function () use($apiFetcher) {
    $fields = [
        'post' => [
            'pair' => 'TRX_RUB,DOGE_RUB',
            'action' => 'buy'
        ]
    ];

    $response = $apiFetcher->getMyOrders($fields);

    expect($response)->toBeArray();
});

test('can send request to api ticker endpoint', function () use($apiFetcher) {
    $fields = [
        'post' => [
            'pair' => 'BTC_USD,BTC_RUB',
        ]
    ];

    $response = $apiFetcher->getTicker($fields);

    expect($response)->toBeArray();
});

test('can send request to api my_history endpoint', function () use($apiFetcher) {
    $fields = [
        'post' => [
            'append' => 36989301,
            'limit' => 3
        ]
    ];

    $response = $apiFetcher->getMyHistory($fields);

    expect($response)->toBeArray();
});

test('can send request to api my_trades endpoint', function () use($apiFetcher) {
    $fields = [
        'post' => [
            'append' => 36989301,
            'limit' => 3
        ]
    ];

    $response = $apiFetcher->getMyTrades($fields);

    expect($response)->toBeArray();
});
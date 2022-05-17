<?php

use MikhUd\PayeerPackage\Request;

test('can send request to api endpoint', function () {
    $request = new Request([]);
    $params = [
        'method' => 'info'
    ];

    $response = $request->sendRequest($params);

    expect($response)->toBeArray();
});

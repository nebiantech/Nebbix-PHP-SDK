<?php

require("./vendor/autoload.php");
require("./nebbix/nebbix-php-client/src/Nebbix.php");

$nebbix = new Nebbix("SUstLcEqsoNVxi7", "c3e45968-8b3f-42a6-8873-6fedf5194150");

try {
    echo json_encode($nebbix->getWalletBalance(2));
} catch (\Throwable $th) {
    echo $th->getMessage();
}


/*

try {
    echo json_encode($nebbix->initializeTransactions([
        "amount" => "0.0001",
        "wallet_id" => "2",
        "custom_data" => [
            "custom_keys"=> "custom_value"
        ]
    ]));
} catch (\Throwable $th) {
    echo $th->getMessage();
}


try {
    echo json_encode($nebbix->paymentQuery("BjJtA7GpwsuiLi9"));
} catch (\Throwable $th) {
    //throw $th;
    echo $th->getMessage();
}

try {
    echo json_encode($nebbix->createBtcwalletAddress([
        "wallet_id" => 2
    ]));
} catch (\Throwable $th) {
    throw $th;
}

try {
    echo json_encode($nebbix->createBtcwalletAddress([
        "wallet_id" => "2"
    ]));
} catch (\Throwable $th) {
    echo $th->getMessage();
}

try {
    echo json_encode($nebbix->getBtcWallet("2"));
} catch (\Throwable $th) {
    echo $th->getMessage();
}

*/
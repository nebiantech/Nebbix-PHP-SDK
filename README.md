# ([A-Za-z_-]+):[\s]
# "$1" => 

### 1 
### Initialize a payment

```
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


```
// Example response

```
{
  "success": true,
  "data": {
    "transaction": {
      "title": "API transaction",
      "memo": "Memo",
      "amount": "0.00010000",
      "status": "pending",
      "phone": "Phone",
      "address": "tb1q57ca02t8uvafd5j7pk9rt0nuus8axw59z99grw",
      "ref": "BjJtA7GpwsuiLi9",
      "custom_data": "{\"custom_keys\":\"custom_value\"}",
      "created_by_type": "Client Api",
      "type": "btc",
      "sub_type": "api",
      "updated_at": "2021-04-07T15:36:54.000000Z",
      "created_at": "2021-04-07T15:36:50.000000Z",
      "id": 156,
      "dollar_value": 5.6577470000000005
    },
    "address": "tb1q57ca02t8uvafd5j7pk9rt0nuus8axw59z99grw",
    "reference_code": "BjJtA7GpwsuiLi9",
    "expiration_time": "15m",
    "qr_code": "https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=tb1q57ca02t8uvafd5j7pk9rt0nuus8axw59z99grw"
  },
  "message": "API transaction created successfully.",
  "ref": "BjJtA7GpwsuiLi9"
}

```

### 2 
### Query Payment
    
```
try {
    echo json_encode($nebbix->paymentQuery("BjJtA7GpwsuiLi9"));
} catch (\Throwable $th) {
    //throw $th;
    echo $th->getMessage();
}

```

    // Example response

```
{
    "id": 156,
    "title": "API transaction",
    "memo": "Memo",
    "amount": "0.00010000",
    "status": "pending",
    "type": "btc",
    "ref": "BjJtA7GpwsuiLi9",
    "deleted_at": null,
    "created_at": "2021-04-07T15:36:50.000000Z",
    "updated_at": "2021-04-07T15:36:54.000000Z",
    "phone": "Phone",
    "network": null,
    "sell_id": null,
    "charges": null,
    "address": "tb1q57ca02t8uvafd5j7pk9rt0nuus8axw59z99grw",
    "txid": null,
    "created_by_type": "Client Api",
    "custom_data": "{\"custom_keys\":\"custom_value\"}",
    "transaction_details": null,
    "sub_type": "api",
    "dollar_value": "5.657747"
}

```


### 3
###    Create Btc Wallet


```
    $nebbix->createBtcwallet([
        "name" => "Wallet Name"
    ]);
```

    // Example response

```
{
    "success": true,
    "data": {
        "name": "Admin Wallet",
        "address": "tb1qs74dsw9acl2kern2tcfy8kfkaj8j4qdkuekr6q",
        "privateKey": "cW13N92D2UzypXEvyckF1Nry9PBpaicx5PuXZeLerLgvGr25QYVt",
        "publicKey": "02f5729ef4004b112c7b826eb6a423c2068edcf0b1fd844528353fe3fbcfb046c3",
        "wallet_id": 2,
        "status": "active",
        "updated_at": "2021-04-07T15:41:07.000000Z",
        "created_at": "2021-04-07T15:41:07.000000Z",
        "id": 35,
        "balance": 0.01940739
    },
    "message": "Wallet created successfully.",
    "ref": "xi5HKTReMByJgGa"
}
```



### 4
### createBtcwalletAddress

```
    $nebbix->createBtcwalletAddress([
        "wallet_id" => "12"
    ]);
```

    // Example response
    
```
{
    "success": true,
    "data": {
        "name": "Admin Wallet",
        "address": "tb1qjath4jq6qqz9zwagnrrsf0z85q63jzwmkx2024",
        "privateKey": "cTpAaCqg6McqBEowSXa1bmCYP3GcTcXFkMnsZHsh43UEpbMr7QtA",
        "publicKey": "027072cf3ebe4911a557004c63c6709aae04bf1140cceb129fec5821c50b009dd1",
        "wallet_id": 2,
        "status": "active",
        "updated_at": "2021-04-07T15:43:43.000000Z",
        "created_at": "2021-04-07T15:43:43.000000Z",
        "id": 37,
        "balance": 0.01940739
    },
    "message": "Wallet created successfully.",
    "ref": "7JEndjDPtsQyAD7"
}
```


### 5
### getBtcWallet

```
    $nebbix->getBtcWallet("12");

```

// Example response 

```
{
  "success": true,
  "data": [
    {
      "txid": "83259921d80f41292cf632a61add0d2092467e6014eb13c3110db2150e821705",
      "vout": 0,
      "address": "tb1qs53sg352q25l4rft564ndtfax727fwywald57y",
      "label": "wallet",
      "scriptPubKey": "0014852304468a02a9fa8d2ba6ab36ad3d3795e4b88e",
      "amount": 0.000019,
      "confirmations": 4045,
      "spendable": true,
      "solvable": true,
      "desc": "wpkh([67000e2d/0'/0'/0']03a8a801d9835ae586041ba1ba560d8852046c7de4fc4943a1d9834968e0d497d0)#unyj3s9y",
      "safe": true
    },
    {
      "txid": "50e862177f7b08513faf7a8655e134b70930d4e093aba00253926795b4677909",
      "vout": 1,
      "address": "tb1qs53sg352q25l4rft564ndtfax727fwywald57y",
      "label": "wallet",
      "scriptPubKey": "0014852304468a02a9fa8d2ba6ab36ad3d3795e4b88e",
      "amount": 0.000019,
      "confirmations": 965,
      "spendable": true,
      "solvable": true,
      "desc": "wpkh([67000e2d/0'/0'/0']03a8a801d9835ae586041ba1ba560d8852046c7de4fc4943a1d9834968e0d497d0)#unyj3s9y",
      "safe": true
    },
  ]
}
```


### 6
### getBtcWallets

```
    $nebbix->getBtcWallets();
```


### 7
### createLtcwallet

```
    $nebbix->createLtcwallet([]);

```


### 8
### createLtcwalletAddress

```
    $nebbix->createLtcwalletAddress([]);
```

### 9
### getLtcWallet`

```
    $nebbix->getLtcWallet("wallet_id");

```
### 10
### sendBtc

```
    $nebbix->sendBtc([
        "address" => "tb1qpq7ypa334wj07f92x6avv0zt7m2tjawgh5wk8f",
        "wallet_id" => "1",
        "amount" => "0.0001",
        "set_fee" => "0.00001000",
        "memo" => "Any text here (optional)"
    ]);
```

// Example response

```
[
    "success" => true,
    "data" => "bb5bc545a7cd8ea4e487c6833dbc75ef80a9c67b04f09f3b8544e8cc190f5eb0",
    "message" => "Btc sent successfully.",
    "ref" => "8bVE65teUO29fmZ"
]
```

### 11
### sendLtc

```
    $nebbix->sendLtc([
        "address" => "tb1qpq7ypa334wj07f92x6avv0zt7m2tjawgh5wk8f",
        "wallet_id" => "1",
        "amount" => "0.0001",
        "set_fee" => "0.00001000",
        "memo" => "Any text here (optional)"
    ]);
```

// Example response

```
[
    "success" => true,
    "data" => "bb5bc545a7cd8ea4e487c6833dbc75ef80a9c67b04f09f3b8544e8cc190f5eb0",
    "message" => "Ltc sent successfully.",
    "ref" => "8bVE65teUO29fmZ"
]
```
### 12
### sendDoge

```
    $nebbix->sendDoge([
        "address" => "tb1qpq7ypa334wj07f92x6avv0zt7m2tjawgh5wk8f",
        "wallet_id" => "1",
        "amount" => "0.0001",
        "set_fee" => "0.00001000",
        "memo" => "Any text here (optional)"
    ]);
```

// Example response

```
[
    "success" => true,
    "data" => "bb5bc545a7cd8ea4e487c6833dbc75ef80a9c67b04f09f3b8544e8cc190f5eb0",
    "message" => "Doge sent successfully.",
    "ref" => "8bVE65teUO29fmZ"
]
```

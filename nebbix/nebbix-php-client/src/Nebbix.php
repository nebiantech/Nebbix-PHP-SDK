<?php

use Guzzle\Http\Exception\ClientErrorResponseException;

require 'Exception.php';


class Nebbix
{
  private $BASE_URL = 'http://localhost:8000/userApi'; //'https://core.nebbix.com/userApi';

  private $userAccessToken = "";
  private $clientId = "";

  public function __construct($userAccessToken, $clientId)
  {
    $this->userAccessToken = $userAccessToken;
    $this->clientId = $clientId;
    if (is_null($this->userAccessToken) || is_null($this->clientId))
      throw new NebbixClientException('Required "userAccessToken" && "clientId" key not supplied');
  }
    

  /**
   * getWallets
   *
   * @return void
   */
  public function getCoinsWithWallet() {
    return $this->sendRequest('/coins', [], 'GET');
  }

  /**
   * getWalletBalance
   *
   * @param  mixed $id
   * @return void
   */
  public function getWalletBalance($id) {
    return $this->sendRequest("/balance/$id", [], 'GET');
  }

  /**
   * initializeTransactions
   *
   * @param  mixed $body
   * @return void
   */
  public function initializeTransactions($body) {
      return $this->sendRequest("/payment/initialize", $body);
  }
  
  /**
   * paymentQuery
   *
   * @param  string $ref
   * @return void
   */
  public function paymentQuery (string $ref) {
      return $this->sendRequest("/payment/query?reference_code=$ref", [], "GET");
  }
    
  /**
   * createBtcwallet
   *
   * @param  mixed $body
   * @return void
   */
  public function createBtcwallet ($body) {
      return $this->sendRequest("/wallet/btc/create", $body);
  }
    
  /**
   * createBtcwalletAddress
   *
   * @param  mixed $body
   * @return void
   */
  public function createBtcwalletAddress ($body) {
      return $this->sendRequest("/wallet/btc/create_address", $body);
  }
  
  /**
   * getBtcWallets
   *
   * @return void
   */
  public function getBtcWallets () {
      return $this->sendRequest(`/wallet/btc`, [], "GET");
  }

  /**
   * getBtcWallet
  */
  
  public function getBtcWalletAddressesWithBalance ($wallet_id) {
      return $this->sendRequest("/wallet/btc/getWalletDetails/$wallet_id", [], "GET");
  }

  /**
   * createLtcwallet
  */
  
  public function createLtcwallet ($body) {
      return $this->sendRequest("/wallet/ltc/create", $body);
  }

  /**
   * createLtcwalletAddress
  */
  
  public function createLtcwalletAddress ($body) {
      return $this->sendRequest("/wallet/ltc/create_address", $body);
  }
  
    
  /**
   * getLtcWalletAddressesWithBalance
   *
   * @param  mixed $wallet_id
   * @return void
   */
  public function getLtcWalletAddressesWithBalance ($wallet_id) {
      return $this->sendRequest("/wallet/ltc/get_wallets?wallet_id=$wallet_id", [], "GET");
  }
  
  /**
   * createDogewallet
   *
   * @param  mixed $body
   * @return void
   */
  public function createDogewallet ($body) {
      return $this->sendRequest("/wallet/doge/create", $body);
  }
  
  /**
   * createDogewalletAddress
   *
   * @param  mixed $body
   * @return void
   */
  public function createDogewalletAddress ($body) {
      return $this->sendRequest("/wallet/doge/create_address", $body);
  }
  
  /**
   * getDogeWallet
   *
   * @param  mixed $wallet_id
   * @return void
   */
  public function getDogeWallet ($wallet_id) {
      return $this->sendRequest(`/wallet/doge/get_wallets?wallet_id=$wallet_id`, [], "GET");
  }
  
  /**
   * sendBtc
   *
   * @param  mixed $body
   * @return void
   */
  public function sendBtc($body) {
      return $this->sendRequest("/wallet/btc/send", $body);
  }

  /**
   * sendLtc
  */

  public function sendLtc($body) {
      return $this->sendRequest("/wallet/ltc/send", $body);
  }

  /**
   * sendDoge
  */

  public function sendDoge($body) {
      return $this->sendRequest("/wallet/doge/send", $body);
  }
  /**
   * sendRequest
   * Send POST or GET request to BASE_URL;
  */
  

  private function sendRequest($url, $body, $method = "POST")
  {
    $client = new \GuzzleHttp\Client();
    try {
      if (strtoupper($method) == "GET") {
        $response = $client->request('GET', $this->BASE_URL.$url, [
          'headers'        => [
              'user-access-token' => $this->userAccessToken,
              'client-id' => $this->clientId
          ]
        ]);
      } else {
        $response = $client->request('POST', $this->BASE_URL.$url, [
          'headers'        => [
              'user-access-token' => $this->userAccessToken,
              'client-id' => $this->clientId
          ],
          'form_params' => $body
        ]);
      }

      if ($response->getStatusCode() == 200) {
        return json_decode($response->getBody(), true);
      }
    } catch (\Exception $th) {
      throw new NebbixClientException($th->getResponse()->getBody(true));
    }
  }

}

<?php
class FioClient {

  const FORMAT = 'json';
  const TYPE = 'transactions';

  private $url;
  private $token;

  public function __construct($url, $token) {
    $this->url = $url;
    $this->token = $token;
  }

  public function call($action, array $params) {
    // baseUrl/action/token/params/transactions.format
    $urlSegments = [$this->url, $action, $this->token];
    $urlSegments = array_merge($urlSegments, $params, [self::TYPE . '.' . self::FORMAT]);
    $url = implode('/', $urlSegments);
    return file_get_contents($url);
  }

}

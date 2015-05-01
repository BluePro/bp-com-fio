<?php
class FioClient {

  const FORMAT = 'json';
  const TYPE = 'transactions';

  private $cache;
	private $url;
  private $token;

  public function __construct(FioCache $cache, $url, $token) {
		$this->cache = $cache;
    $this->url = $url;
    $this->token = $token;
  }

  public function call($action, array $params) {
		$url = $this->getUrl($action, $params);
		$data = $this->cache->get(array($this, 'request'), $url);
    return json_decode($data);
  }

	public function request($url) {
		return file_get_contents($url);
	}

	private function getUrl($action, array $params) {
    // baseUrl/action/token/params/transactions.format
    $urlSegments = [$this->url, $action, $this->token];
    $urlSegments = array_merge($urlSegments, $params, [self::TYPE . '.' . self::FORMAT]);
    $url = implode('/', $urlSegments);
		return $url;
	}

}

<?php
class FioCache {

  private $db;
	private $lifetime;

	public function __construct($db, $lifetime) {
		$this->db = $db;
		$this->lifetime = $lifetime;
	}
	
	public function get(callable $callback, $request) {
		$this->clearCache($request);
		$response = $this->fromCache($request);
		if (!$response) {
			$response = call_user_func($callback, $request);
			if ($response) {
				$this->toCache($request, $response);
			}
		}
    return $response;
  }

	private function fromCache($request) {
		$query = $this->db->getQuery(true);
		$query->select('response')
			->from('#__fioexport_cache')
			->where($this->db->quoteName('request') . '='. $this->db->quote($request));
		$this->db->setQuery($query);    
		$responseList = $this->db->loadObjectList();
		return count($responseList) ? $responseList[0]->response : null;
	}

	private function toCache($request, $response) {
		$query = $this->db->getQuery(true);
		$columns = array('request', 'response');
		$values = array($this->db->quote($request), $this->db->quote($response));
		$query
			->insert($this->db->quoteName('#__fioexport_cache'))
			->columns($this->db->quoteName($columns))
			->values(implode(',', $values));
		$this->db->setQuery($query);
		$this->db->execute();
	}

	private function clearCache($request) {
		$query = $this->db->getQuery(true);
		$conditions = array(
				$this->db->quoteName('request') . '=' . $this->db->quote($request),
				'TIMESTAMPDIFF(MINUTE, ' . $this->db->quoteName('time') . ', NOW()) > ' . $this->db->quote($this->lifetime));
		$query
				->delete($this->db->quoteName('#__fioexport_cache'))
				->where($conditions);
		$this->db->setQuery($query);    
		$this->db->execute();
	}

}

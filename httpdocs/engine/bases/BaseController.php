<?
class BaseController {

	public $db;
	public $uri;
	
	public $data;
	
	public function __construct() {
		global $db, $uri;
		$this->db = $db;
		$this->uri = $uri;
	}

}
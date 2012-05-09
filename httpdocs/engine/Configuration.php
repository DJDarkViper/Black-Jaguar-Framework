<?
class DBConfiguration {
	public $connect	= false;
	public $condition = false;
	public $config	= array();
}
class Configuration {
	public $DefaultController = null;
	public $db				  = null;
	public $Controllers		  = array();
	public $Models			  = array();
	public $Assistants		  = array();
	public $Plugins			  = array();
	public $Views			  = array();
	public $SecurePages		  = array();
	public $DocRoot			  = null;
	public $Root			  = null;
	
	public function __construct() {
		$this->db = new DBConfiguration();
	}
}
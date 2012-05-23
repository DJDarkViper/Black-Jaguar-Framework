<?
class PaginationPage {
	public $page = 0;
	public $uri = "";
	
	public function __construct($page = null, $uri = null) {
		if($page != null) $this->setPage($page);
		if($uri != null) $this->setUri($uri);
	}
	
	public function setPage($int) { $this->page = $int; }
	public function setUri($str) { $this->uri = $str; }
	public function getPage() { return $this->page; }
	public function getUri() { return $this->uri; }
}
class Paginate {

	const RENDER_ARRAY 				= 1;
	const RENDER_CONDENSED_ARRAY 	= 2;
	const RENDER_HTML				= 3;
	const RENDER_CONDENSED_HTML 	= 4;

	public $records = 0;
	public $perPage = 1;
	public $uriTemplate = "[#]";
	
	public function __construct($records = null, $perPage = null, $uriTemplate = null) {
		if($records != null) $this->setRecordCount($records);
		if($perPage != null) $this->setPerPageCount($perPage);
		if($uriTemplate != null) $this->setUriTemplate($uriTemplate);
	}
	
	public function setRecordCount($int) { $this->records = $int; return $this; }
	public function setPerPageCount($int) { $this->perPage = $int; return $this; }
	public function setUriTemplate($str) { $this->uriTemplate = $str; return $this; }
	public function getRecordCount() { return $this->records; }
	public function getPerPageCount() { return $this->perPage; }
	public function getUriTemplate() { return $this->uriTemplate; }
	
	public function parse($page) {
		return str_replace(
			array("[#]"),
			array($page),
			$this->getUriTemplate()
		);
	}
	
	public function render($mode = self::RENDER_ARRAY) {
		$rend = array();
		switch($mode) {
			case self::RENDER_ARRAY:
				
				for($i = 1; $i <= (ceil( $this->getRecordCount()/$this->getPerPageCount() ) ); $i++) {
					$rend[] = new PaginationPage($i, $this->parse($i));
				}
				
				break;
			case self::RENDER_CONDENSED_ARRAY:
				
				
				
				break;
			
			case self::RENDER_HTML:
				
				$arr = $this->render();
				$rend = "";
				foreach($arr as $p) $rend .= "<a class='pagination-page' href='".$p->getUri()."'>".$p->getPage()."</a> ";
				
				break;
		}
		
		return $rend;
	}

}
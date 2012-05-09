<?
class Upload {
	
	public $name 				= null;
	public $tmpName				= null;
	public $fileName 			= null;
	public $fileExt 			= null;
	public $fileType 			= null;
	public $error 				= null;
	public $size 				= null;
	public $finalPath 			= "/";
	public $force				= false;
	
	public function __construct($filearr = null) {
		if($filearr != null) $this->parse($filearr);
	}
	
	public function parse($filearr) {
		var_dump($filearr);
		$arr = (object)$filearr;
		$this->name = $arr->name;
		$this->tmpName = $arr->tmp_name;
		$this->fileType = $arr->type;
		$this->error = $arr->error;
		$this->size = $arr->size;
	}
	
	public function getName() { return $this->name; }
	public function getTmpName() { return $this->tmpName; }
	public function getError() { return $this->error; }
	public function getSize() { return $this->size; }
	public function getType() { return $this->type; }
	public function getPath() { return $this->finalPath; }
	
	public function getFileName() { return $this->fileName; }
	
	public function setName($str) { $this->fileName = $str; }
	public function setPath($str) { $this->finalPath = $str; }
	
	
	
	/**
	* This will force checking if the directory exists, if it doesnt, will create it, and set permissions automatically
	*/
	public function forcePath() { $this->force = true; }
	
	public function parseType() {
		$type = "unknown";
		switch($this->fileType) {
			// Images
			case "image/png":
				$type = "png";
				break;
			case "image/jpg":
			case "image/jpeg":
				$type = "jpg";
				break;
			case "image/gif":
				$type = "gif";
				break;
			default:
				$type = explode(".", $this->getName());
				$type = array_pop($type);
				break;
		}
		
		return $type;
	}
	public function isImage() {
		switch($this->parseType()) {
			case "png":
			case "jpg":
			case "gif":
				return true;
				break;
			default: 
				return false;
				break;
		}
	}
	
	public function isDoc() {
	}
	
	public function isPDF() {
	}
	
	public function exec() {
		if($this->force) {
			$currentPath = "";
			$folders = explode("/", $this->getPath());
			chdir($_SERVER['DOCUMENT_ROOT']."/");
			$currentPath = $_SERVER['DOCUMENT_ROOT']."/";
			// check each directory exists
			foreach($folders as $folder) {
				if(trim($folder) != '') {
					if(!chdir($folder)) { // failed to get to the folder, make it
						mkdir($folder);
						chmod($folder, 0777);
						if(!chdir($folder)) {
							die("Somethings going terribly wrong");
						} else {
							$currentPath .= $folder."/";
						}
					} else {
						$currentPath .= $folder."/";
					}
				}
			}
			//echo $currentPath;
		}
		
		
		return move_uploaded_file($this->getTmpName(), $_SERVER['DOCUMENT_ROOT']."/".$this->getPath().$this->getFileName());
	}
	
	public static function getFiles($index = null) {
		$files = array();
		
		if($index == null) foreach($_FILES as $k=>$file) $files[$k] = $file;
		else return $_FILES[$index];
		
		return $files;
	}
}
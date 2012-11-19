<?php
/**
 * 
 */
class GitStatusFile extends Git {
	
	public $fileName;
	public $XY;
	public $fileStatus;
	
	public function __construct($fileName, $XY) {
		$this->fileName = $fileName;
		$this->XY = $XY;
		
		$this->translateXY();
	}
	
	public function translateXY() {
		if(stripos($this->XY,"U") !== false) {
			$this->fileStatus = "Conflict";
		} elseif(stripos($this->XY,"?") !== false) {
			$this->fileStatus = "New";
		} elseif(stripos($this->XY,"!") !== false) {
			$this->fileStatus = "Ignore";
		}
	}
	
	/**
	 * @return GitStatusFile
	 */
	public static function cast($statusFile){
		return $statusFile;
	}
}

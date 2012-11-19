<?php
/**
 * 
 */
class GitStatus extends Git {
	
	public $status;
	public $hasChanges;
	public $files = array();
	
	const NOTHING = "Nothing to commit";
	const CHANGED = "Changes not staged for commit";
	
	function __construct() {
		$statusString = $this->gitStatusCommand();
		if($statusString) {
			$list = explode("\n", $statusString);
			
			if($list) {
				foreach ($list as $key => $value) {
					$value = trim($value);
					if($value) {
						$file = explode(" ", $value);
						
						$statusFile = new GitStatusFile($file[1], $file[0]);
						$this->addFile($statusFile);	
					}
				}	
			}
			$this->status = self::CHANGED;
			$this->hasChanges = true;
		} else {
			$this->status = self::NOTHING;	
		}
		
	}
	
	public function addFile(GitStatusFile $file) {
		$this->files[] = $file;
	}
	
	private function gitStatusCommand() {
		$output = $this->execute("status -su");
		return $output;
	}
}

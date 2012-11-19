<?php
/**
 * 
 */
class GitStatus extends Git {
	
	public $status;
	
	function __construct() {
		$statusString = $this->gitStatusCommand();
		$list = explode("\n", $statusString);
		
		if($list) {
			foreach ($list as $key => $value) {
				print $value;	
			}	
		}
		
		$this->status = $statusString;
		
	}
	
	/**
	 * @return GitCommit
	 */
	public function headCommit(){
		return $this->commitsList[0];
	}
	
	public function addCommit($commit) {
		$this->commitsList[] = $commit;
	}
	
	private function gitStatusCommand() {
		$output = $this->execute("status -su");
		return $output;
	}
}

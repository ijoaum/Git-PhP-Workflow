<?php
/**
 * 
 */
class GitLog extends Git {
	
	public $commitsList = array();
	
	function __construct(GitBranch $branch) {
		$logJson = json_decode($this->gitLogCommand($branch));
		if($logJson) {
			foreach ($logJson as $key => $value) {
				$commit = new GitCommit($value);
				
				$this->addCommit($commit);
			}	
		}
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
	
	private function gitLogCommand(GitBranch $branch) {
		$output = $this->execute("log --pretty=format:'\"%h\": {%n  \"commit\": \"%H\",%n  \"author\": \"%an <%ae>\",%n  \"date\": \"%ad\",%n  \"message\": \"%s\"%n},' ".$branch->name." --");
		$output = substr($output, 0, -1);
		$output = str_ireplace("\\", null, $output);
		return "{" . $output . "}";
	}
}

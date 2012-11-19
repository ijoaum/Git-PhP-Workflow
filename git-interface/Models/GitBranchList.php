<?php
/**
 * Lista de branches
 * @property GitBranch $branchList
 * @property GitBranch $activeBranch
 */
class GitBranchList extends Git {
	
	private $branchList = array();
	private $activeBranch;
	
	public function __construct() {
		
		$git_branch_string = $this->gitBranchCommand();
			
		$list = explode("\n", $git_branch_string);
		
		foreach ($list as $key => $value) {
			if($value) {
				$branch = new GitBranch($value);
				$this->addBranch($branch);
				
				if($branch->isActive()) {
					$this->activeBranch = $branch;
				}	
			}
		}
		
	}
	
	public function addBranch(GitBranch $branch) {
		$this->branchList[] = $branch;
	}
	
	/**
	 * @return GitBranch
	 */
	public function branchList(){
		return $this->branchList;
	}
	
	/**
	 * @return GitBranch
	 */
	public function activeBranch(){
		return $this->activeBranch;
	}
	
	private function gitBranchCommand(){
		return $this->execute("branch");
	}

	
}

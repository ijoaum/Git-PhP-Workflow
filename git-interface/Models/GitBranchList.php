<?php
require 'Models/GitBranch.php';
/**
 * Lista de branches
 * @property GitBranch $branchList
 * @property GitBranch $activeBranch
 */
class GitBranchList {
	
	private $branchList = array();
	private $activeBranch;
	
	public function __construct($git_branch_string) {
			
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
	
}

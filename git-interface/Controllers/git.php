<?php

$shellReturn = "";

if($_POST) {
	if($_POST['action'] == "commit") {
		Git::execute("add .");
		$commitReturn = GitCommit::doCommit($_POST['message']);
		
		$branchList = new GitBranchList();
		$syncReturn = $branchList->activeBranch()->sync();	
		$shellReturn .= $commitReturn->shellReturn . $syncReturn->shellReturn;
		
		
	}
}

$branchList = new GitBranchList();
$gitStatus  = new GitStatus();

?>
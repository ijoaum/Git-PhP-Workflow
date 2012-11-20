<?php

if($_POST) {
	if($_POST['action'] == "commit") {
		Git::execute("add .");
		$commitReturn = GitCommit::doCommit($_POST['message']);
	}
}

$branchList = new GitBranchList();
$gitStatus  = new GitStatus();

?>
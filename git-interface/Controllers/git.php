<?php

if($_POST) {
	if($_POST['action'] == "commit") {
		print Git::execute("add ...");
		print GitCommit::doCommit($_POST['message']);
	}
}

$branchList = new GitBranchList();
$gitStatus  = new GitStatus();

?>
<?php

require 'Models/GitBranchList.php';

$cmd = "git branch";
$output = shell_exec($cmd);

$branchList = new GitBranchList($output);

var_dump($branchList);


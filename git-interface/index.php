<?php

ini_set("display_errors", 1);

require 'Models/Git.php';
require 'Models/GitLog.php';
require 'Models/GitBranch.php';
require 'Models/GitCommit.php';
require 'Models/GitBranchList.php';

$branchList = new GitBranchList();

GitCommit::doCommit("commit do php");exit;

print $branchList->activeBranch()->name;

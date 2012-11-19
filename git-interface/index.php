<?php

ini_set("display_errors", 1);

//define("REPOSITORY_PATH","/www/picpay-backend");

require 'Models/Git.php';
require 'Models/GitLog.php';
require 'Models/GitStatus.php';
require 'Models/GitBranch.php';
require 'Models/GitCommit.php';
require 'Models/GitBranchList.php';

$branchList = new GitBranchList();
$gitStatus  = new GitStatus();

$active_controller = isset($_GET['controller']) ? $_GET['controller'] : 'git';
define("ACTIVE_CONTROLLER",$active_controller);

include 'Views/main.php';

// GitCommit::doCommit("commit do php '");exit;



<?php

ini_set("display_errors", 1);

// define("REPOSITORY_PATH","/www/picpay-webservice");
define("REPOSITORY_PATH","/www/Git-PhP-Workflow");

require 'Models/Git.php';
require 'Models/GitLog.php';
require 'Models/GitStatus.php';
require 'Models/GitStatusFile.php';
require 'Models/GitBranch.php';
require 'Models/GitCommit.php';
require 'Models/GitBranchList.php';



$active_controller = isset($_GET['controller']) ? $_GET['controller'] : 'git';
define("ACTIVE_CONTROLLER",$active_controller);

include 'ControllerS/' . ACTIVE_CONTROLLER . '.php';
include 'Views/main.php';

// GitCommit::doCommit("commit do php '");exit;



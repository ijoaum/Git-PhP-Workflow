<?php

/**
 * Comandos git
 */
class Git {
	
	public static function execute($command) {

		if(defined("REPOSITORY_PATH")) {
			$path = "--git-dir=" . REPOSITORY_PATH . "/.git --work-tree=".REPOSITORY_PATH;	
		} else {
			$path = "";
		}
		
		
		$command = "git " . $path . " " . $command;
		//print $command;exit;
		$output = shell_exec($command);
		return $output;
	}
}

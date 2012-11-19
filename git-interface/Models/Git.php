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
		
		/**/
		$command = "git " . $path . " " . $command;
		$output = shell_exec($command);
		return $output;
	}
}

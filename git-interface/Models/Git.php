<?php

/**
 * Comandos git
 */
class Git {
	
	public function execute($command) {
		$command = "git ".$command;
		$output = shell_exec($command);
		
		return $output;
	}
}

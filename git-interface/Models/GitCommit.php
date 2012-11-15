<?php

/**
 * 
 */
class GitCommit extends Git {
	
	public $id;
	public $sha1;
	public $author;
	public $date;
	public $message;
	
	function __construct($commit) {
		$this->id 		= substr($commit->commit, 0, 6);
		$this->sha1		= $commit->commit;
		$this->author 	= $commit->author;
		$this->date 	= $commit->date;
		$this->message	= $commit->message;
	}
	
	public static function doCommit($message){
		return self::execute('commit -am "' . ($message) . '"');
	} 
}

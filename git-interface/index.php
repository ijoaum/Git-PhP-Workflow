<?php

echo "<pre>";

$cmd = "git status";
$output = shell_exec($cmd);

print $output;

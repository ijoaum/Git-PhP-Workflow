<?php

echo "<pre>";

$cmd = "git add ../.";
$output = shell_exec($cmd);

$cmd = "git commit -am a";
$output = shell_exec($cmd);

print $output;

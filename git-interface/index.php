<?php

echo "<pre>";

$cmd = "git add .";
$output = shell_exec($cmd);

print $output;


$cmd = "git commit -am comit";
$output = shell_exec($cmd);

print $output;
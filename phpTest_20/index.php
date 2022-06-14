<?php

require "vendor/autoload.php";

$templates = new League\Plates\Engine('templates');

echo $templates->render('template_login', ['name' => 'LoginTest']);

?>
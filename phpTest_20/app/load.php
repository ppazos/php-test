<?php

require_once  'vendor\autoload.php';

$templates = new League\Plates\Engine('..\templates');

echo $templates->render('template_load');

?>
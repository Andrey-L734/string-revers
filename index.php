<?php

require_once './vendor/autoload.php';

use Src\StringRevers;

$input = 'Cat';

$stringRevers = new StringRevers();

echo $stringRevers->handler($input);
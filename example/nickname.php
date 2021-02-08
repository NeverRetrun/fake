<?php

use Fake\Fake;

require_once '../vendor/autoload.php';

var_dump(
    Fake::instance()->nickname->random()
);
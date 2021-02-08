<?php

use Fake\Fake;

require_once '../vendor/autoload.php';


file_put_contents(
    'foo.png',
    Fake::instance()->avatar->fileContent()
);
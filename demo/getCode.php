<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Code\Code;


//获取验证码
$width = '350';
$height = '50';
$font_size = '20';
echo Code::getCode($width, $height, $font_size);

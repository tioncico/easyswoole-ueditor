<?php
/**
 * Created by PhpStorm.
 * User: Tioncico
 * Date: 2020/4/23 0023
 * Time: 16:33
 */

include "./vendor/autoload.php";

$result = \EasySwoole\Utility\File::moveFile('dev.php',"./a/dev.php");
var_dump($result);

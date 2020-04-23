<?php
/**
 * Created by PhpStorm.
 * User: Tioncico
 * Date: 2020/4/23 0023
 * Time: 16:33
 */

$config = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "", file_get_contents("config.json")), true);
foreach ($config as $key=>$value){
    echo "protected \${$key} = ".var_export($value,1).";\n";


}

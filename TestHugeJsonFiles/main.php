<?php
/**
 * Created by IntelliJ IDEA.
 * User: grmartin
 * Date: 7/22/15
 * Time: 10:29
 */

define('DS', DIRECTORY_SEPARATOR);

$dir = dir(dirname(__file__).DS.'input');

$out = array();

/** @noinspection PhpExpressionResultUnusedInspection */
while (($d = $dir->read()) !== false) {
    if ($d == '.' || $d == '..') continue;

    $data = utf8_encode(file_get_contents(dirname(__file__).DS.'input'.DS.$d));

    $out[] = array("name" => $d, "data"=>$data, "size" => strlen($data));

    unset($data);
}

$json = json_encode($out, JSON_PRETTY_PRINT);

unset($out);

file_put_contents("./out.json", $json);

unset($json);

`rm out.json.bz2 `;

`bzip2 -9vvk out.json`;

?>
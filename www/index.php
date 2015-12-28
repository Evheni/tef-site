<?php
/**
 * Created by PhpStorm.
 * User: Evheni
 * Date: 12/25/2015
 * Time: 17:17
 */
include_once "setting.php";

$params = Parameters::getInstance();
if($_SERVER['REQUEST_URI'] == '/') {
    $params['page'] = 'index';
    $params['module'] = 'index';
} else {
    $url_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $url_parts = explode('/', trim($url_path, " /"));
    $params['page'] = array_shift($url_parts);
    $params['module'] = array_shift($url_parts);
    if(!empty($module)) {
        for($i = 0; $i < count($url_parts); $i++) {
            $params[$url_parts[$i]] = $url_parts[++$i];
        }
    }
}
include_once($params['page']);
echo "home page <br/>";
echo "page = " . $params['page'] . "<br />";
echo "module = " . $params['module'] . "<br />";
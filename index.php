<?php

define("MYSite", true);

require("view.php");
require("model.php");
require("controller.php");

$controller = new controller;

$page = (isset($_GET["page"]) AND !empty($_GET["page"])) ? $_GET["page"] : "index";

if (method_exists($controller, $page)) {
	$controller->$page();
} else {
	$controller->index();
}

?>
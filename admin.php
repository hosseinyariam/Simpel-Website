<?php

define("MYSite", true);

require("admin/view.php");
require("admin/model.php");
require("admin/controller.php");

$controller = new controller;

$page = (isset($_GET["page"]) AND !empty($_GET["page"])) ? $_GET["page"] : "login";

if (method_exists($controller, $page)) {
	$controller->$page();
} else {
	$controller->login();
}

?>
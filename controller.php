<?php

if (!defined("MYSite")) {
	die("شمامجوز دسترسی به این فایل را ندارید");
}

class controller {
	
	protected $view;
	protected $model;
	protected $category;
	protected $config;
	
	public function __construct() {
		if (empty(session_id())) {
			session_start();
		}
		date_default_timezone_set("Asia/Tehran");
		$this->model = new model;
		$this->config = $this->model->get_config();
		$this->category = $this->model->get_category();
		$this->view = new view($this->config, $this->category);
	}
	public function index() {
		if (isset($_GET["id"]) AND !empty($_GET["id"])) {
			$data = $this->model->get_body($_GET["id"]);
			$this->view->blog($data);
		} else {
			if (isset($_GET["text"]) AND !empty($_GET["text"])) {
				$text = $_GET["text"];
				$category = NULL;
			} else {
				$text = NULL;
				if (isset($_GET["category"]) AND !empty($_GET["category"])) {
					$category = $_GET["category"];
				} else {
					$category = NULL;
				}
			}
			$data = $this->model->get_posts($text, $category);
			$this->view->index($data);
		}
	}
	
	public function about() {
		$this->view->about();
	}
	
	public function contactus() {
		if (isset($_POST["submit"])) {
			if (isset($_POST["name"]) AND !empty($_POST["name"]) AND isset($_POST["email"]) AND !empty($_POST["email"]) AND isset($_POST["text"]) AND !empty($_POST["text"]) AND isset($_POST["security_code"]) AND !empty($_POST["security_code"])) {
				if (strtolower($_POST["security_code"])==$_SESSION["security_code"]) {
					if ($this->model->contactus($_POST["name"], $_POST["email"], $_POST["text"])) {
						$text = "پیام شما با موفقیت ثبت گردید.";
						$class = "alert-success";
					} else {
						$text = "خطا در ثبت پیام! دقایقی دیگر تلاش کنید.";
						$class = "alert-danger";
					}
				} else {
					$text = "کد امنیتی اشتباه است.";
					$class = "alert-danger";
				}
			} else {
				$text = "تکمیل کردن کلیه موارد الزامی است.";
				$class = "alert-danger";
			}
		} else {
			$text = "";
			$class = "";
		}
		$this->view->contactus($text, $class);
	}
	
	public function captcha() {
		header("Location: captcha.php");
	}
	
}

?>
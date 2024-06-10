<?php

if (!defined("MYSite")) {
	die("شمامجوز دسترسی به این فایل را ندارید");
}

class controller {
	
	protected $view;
	protected $model;
	protected $config;
	
	public function __construct() {
		if (empty(session_id())) {
			session_start();
		}
		date_default_timezone_set("Asia/Tehran");
		$this->model = new model;
		$this->config = $this->model->get_config();
		$this->view = new view($this->config);
	}
	
	public function is_admin() {
		if (isset($_SESSION["admin"]) AND !empty($_SESSION["admin"])) {
			if ($this->model->is_admin($_SESSION["admin"])) {
				return true;
			} else {
				$_SESSION["admin"] = NULL;
				unset($_SESSION["admin"]);
				return false;
			}
		} else {
			return false;
		}
	}
	
	public function login() {
		if ($this->is_admin()) {
			header("Location: admin.php?page=index");
		} else {
			if (isset($_POST["submit"])) {
				if (isset($_POST["email"]) AND !empty($_POST["email"]) AND isset($_POST["password"]) AND !empty($_POST["password"]) AND isset($_POST["security_code"]) AND !empty($_POST["security_code"])) {
					if ($_SESSION["security_code"]==strtolower($_POST["security_code"])) {
						$data = $this->model->get_admin_by_email($_POST["email"]);
						if ($data AND password_verify($_POST["password"], $data["password"])) {
							$_SESSION["admin"] = $data["id"];
							$this->model->admin_login_update($data["id"]);
							header("Location: admin.php?page=index");
						} else {
							$message = "اطلاعات کاربری اشتباه است.";
						}
					} else {
						$message = "کد امنیتی اشتباه است.";
					}
				} else {
					$message = "تکمیل کردن کلیه موارد الزامی است.";
				}
				$this->view->login($message);
			} else {
				$this->view->login();
			}
		}
	}
	
	public function index() {
		if ($this->is_admin()) {
			$this->view->index();
		} else {
			header("LOcation: admin.php");
		}
	}
	
	public function admin() {
		if ($this->is_admin()) {
			$data = $this->model->get_admins();
			$this->view->admin($data);
		} else {
			header("Location: admin.php");
		}
	}
	
	public function adminnew() {
		if ($this->is_admin()) {
			if (isset($_POST["submit"])) {
				if (isset($_POST["name"]) AND !empty($_POST["name"]) AND isset($_POST["email"]) AND !empty($_POST["email"]) AND isset($_POST["password"]) AND !empty($_POST["password"])) {
					if ($this->model->adminnew($_POST["name"], $_POST["email"], $_POST["password"])) {
						setcookie("admin-message-modal", "مدیر با موفقیت افزوده شد.", time()+60, "/");
					} else {
						setcookie("admin-message-modal", "خطا در افزودن مدیر جدید!", time()+60, "/");
					}
				} else {
					setcookie("admin-message-modal", "تکمیل کردن کلیه موارد الزامی است.", time()+60, "/");
				}
				header("Location: admin.php?page=admin");
			} else {
				$this->view->adminnew();
			}
		} else {
			header("Location: admin.php");
		}
	}

	public function adminedit(){
		if (isset($_POST["submit"])) {
			if (isset($_POST["id"]) AND !empty($_POST["id"]) AND isset($_POST["name"]) AND !empty($_POST["name"]) AND isset($_POST["email"]) AND !empty($_POST["email"])){
				if (isset($_GET["password"]) AND !empty($_GET["password"])) {
					$this->model->update_admin($_POST["id"],$_POST["name"],$_POST["email"],$_POST["password"]);

				}else{
					$this->model->update_admin($_POST["id"],$_POST["name"],$_POST["email"]);
				}
			}else{
				//ERROR ...
			}
			header("Location: admin.php?page=admin");
		}elseif (isset($_GET["id"]) AND !empty($_GET["id"])) {
			$data = $this->model->get_admin_detail($_GET["id"]);
			if($data){
				$this->view->adminnew($_GET["id"],$data["name"],$data["email"]);
			}else{
			//ERROR ...	
			}
		} else{
			//ERROR ...
		}
	}

	public function admindelete(){
		if(isset($_GET["id"]) AND !empty($_GET["id"])) {
			$this->model->delete_admin($_GET["id"]);
		} else{

		}
		header("Location: admin.php?page=admin");
	}
	
	public function blog() {
		if ($this->is_admin()) {
			$data = $this->model->get_blogs();
			$this->view->blog($data);
		} else {
			header("LOcation: admin.php");
		}
	}

	
	public function blognew() {
		if ($this->is_admin()) {
			if (isset($_POST["submit"])) {
				if (isset($_POST["category"]) AND !empty($_POST["category"]) AND isset($_POST["title"]) AND !empty($_POST["title"]) AND isset($_POST["summary"]) AND !empty($_POST["summary"]) AND isset($_POST["body"]) AND !empty($_POST["body"]) AND isset($_POST["time"]) AND !empty($_POST["time"]) AND isset($_POST["admin"]) AND !empty($_POST["admin"]) AND isset($_POST["author"]) AND !empty($_POST["author"]) AND isset($_POST["image"]) AND !empty($_POST["image"])) {
					if ($this->model->blognew($_POST["category"], $_POST["title"], $_POST["summary"], $_POST["body"], $_POST["time"], $_POST["admin"], $_POST["author"], $_POST["image"])) {
						setcookie("admin-message-modal", "مقاله با موفقیت افزوده شد.", time()+60, "/");
					} else {
						setcookie("admin-message-modal", "خطا در افزودن مقاله جدید!", time()+60, "/");
					}
				} else {
					setcookie("admin-message-modal", "تکمیل کردن کلیه موارد الزامی است.", time()+60, "/");
				}
				header("Location: admin.php?page=blog");
			} else {
				$this->view->blognew();
			}
		} else {
			header("Location: admin.php");
		}
	}

	public function blogedit(){
		if (isset($_POST["submit"])) {
			if (isset($_POST["id"]) AND !empty($_POST["id"]) AND isset($_POST["category"]) AND !empty($_POST["category"]) AND isset($_POST["title"]) AND !empty($_POST["title"]) AND isset($_POST["summary"]) AND !empty($_POST["summary"]) AND isset($_POST["body"]) AND !empty($_POST["body"]) AND isset($_POST["time"]) AND !empty($_POST["time"]) AND isset($_POST["admin"]) AND !empty($_POST["admin"]) AND isset($_POST["author"]) AND !empty($_POST["author"]) AND isset($_POST["image"]) AND !empty($_POST["image"])) {
				$this->model->update_blog($_POST["id"],$_POST["category"],$_POST["title"],$_POST["summary"],$_POST["body"],$_POST["time"],$_POST["admin"],$_POST["author"],$_POST["image"]);

			}else{
				//ERROR ...
			}
			header("Location: admin.php?page=blog");
		}elseif (isset($_GET["id"]) AND !empty($_GET["id"])) {
			$data = $this->model->get_blog_detail($_GET["id"]);
			if($data){
				$this->view->blognew($_GET["id"],$data["category"],$data["title"],$data["summary"],$data["body"],$data["time"],$data["admin"],$data["author"],$data["image"]);
			}else{
			//ERROR ...	
			}
		} else{
			//ERROR ...
		}
	}

	public function blogdelete(){
		if(isset($_GET["id"]) AND !empty($_GET["id"])) {
			$this->model->delete_blog($_GET["id"]);
		} else{

		}
		header("Location: admin.php?page=blog");
	}
	
	public function logout() {
		if ($this->is_admin()) {
			$_SESSION["admin"] = NULL;
			unset($_SESSION["admin"]);
		}
		header("Location: admin.php");
	}
	
}

?>
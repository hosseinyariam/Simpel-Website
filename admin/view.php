<?php

if (!defined("MYSite")) {
	die("شمامجوز دسترسی به این فایل را ندارید");
}

class view {
	
	protected $config;
	
	public function __construct($config) {
		$this->config = $config;
	}
	//header
	public function header($panel = false, $title = "", $icon = "") {
?>
<!doctype html>
<html dir="rtl">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=$this->config["title"]?></title>
<meta name="description" content="<?=$this->config["description"]?>" />
<meta name="keywords" content="<?=$this->config["keywords"]?>" />
<link href="assets/bootstrap-icons-v1.10.5/bootstrap-icons.min.css" rel="stylesheet">
<link href="assets/bootstrap-v5.2.3/css/bootstrap.rtl.min.css" rel="stylesheet">
<link href="admin/custom.css" rel="stylesheet" />
<link rel="title icon" type="image/svg" href="images/Logo.png">
</head>
<body>
<?php
		if ($panel) {
			$shamsi_date = new IntlDateFormatter("fa_IR@calendar=persian", IntlDateFormatter::FULL, IntlDateFormatter::FULL, "Asia/Tehran", IntlDateFormatter::TRADITIONAL, "EEEE، dd MMM y");
			$miladi_date = new IntlDateFormatter("en_US", IntlDateFormatter::FULL, IntlDateFormatter::FULL, "Asia/Tehran", IntlDateFormatter::GREGORIAN, "EEEE، dd MMM y");
?>
<div class="row g-0">
<div id="panel-sidebar" style="z-index:1;" class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-8 d-md-block d-none position-fixed top-0 start-0">
<div class="d-flex flex-nowrap vh-100">
<div class="d-flex flex-column align-items-stretch bg-white w-100">
<div id="date" class="align-items-center p-3 text-center text-white winter lh-lg">
<div><?=$shamsi_date->format(time())?></div>
<div style="font-family: Tahoma;"><?=$miladi_date->format(time())?></div>
<div><?=date("H:i:s")?></div>
</div>
<div class="list-group list-group-flush border-end h-100 overflow-auto">
<a href="admin.php?page=index" class="list-group-item list-group-item-action lh-lg<?=(isset($_GET["page"]) AND $_GET["page"]=="index") ? " active" : ""?>" aria-current="true"><i class="bi bi-speedometer"></i> داشبورد</a>
<a href="admin.php?page=admin" class="list-group-item list-group-item-action lh-lg<?=(isset($_GET["page"]) AND $_GET["page"]=="admin") ? " active" : ""?>" aria-current="true"><i class="bi bi-person-fill"></i> مدیران سایت</a>
<a href="admin.php?page=blog" class="list-group-item list-group-item-action lh-lg<?=(isset($_GET["page"]) AND $_GET["page"]=="blog") ? " active" : ""?>" aria-current="true"><i class="bi bi-file-earmark-fill"></i> وبلاگ</a>
<a href="admin.php?page=logout" class="list-group-item list-group-item-action lh-lg d-md-none d-block" aria-current="true"><i class="bi bi-power"></i> خروج</a>
</div>
</div>
</div>
</div>
<div id="panel-content" class="col-xl-10 col-lg-9 col-md-8 position-fixed top-0 end-0">
<div class="d-flex flex-nowrap vh-100">
<div class="d-flex flex-column align-items-stretch w-100">
<nav class="navbar navbar-expand-sm navbar-dark bg-primary border-bottom">
<div class="container-fluid justify-content-start">
<div class="text-nowrap text-truncate">
<a class="text-white fs-5" id="sidebar-toggler" href="javascript:void(0);" title=""><i class="bi bi-list align-middle"></i></a>
<a class="navbar-brand fw-bold ms-1 fs-6" href="index.php"> پنل ادمین مجله همیار کمپینگ </a>
</div>
<div class="collapse navbar-collapse">
<ul class="navbar-nav ms-auto">
<li class="nav-item">
<a id="fullscreen-btn" class="nav-link" href="#"><i class="bi bi-fullscreen"></i></a>
</li>
<li class="nav-item"><a class="nav-link" href="admin.php?page=logout" data-bs-toggle="modal" data-bs-target="#panel-modal" data-bs-modal="confirm" data-bs-message="آیا مایل به خروج از سایت هستید؟"><i class="bi bi-power"></i> خروج</a></li>
</ul>
</div>
</div>
</nav>
<header class="bg-white border-bottom p-4 shadow-sm">
<h2 class="m-0 text-truncate text-nowrap w-100"><i class="<?=$icon?>"></i> <?=$title?></h2>
</header>
<div class="d-flex flex-column overflow-auto h-100">
<div class="p-3">
<?php
		}
	}
	//footer
	public function footer($panel = false) {
		if ($panel) {
?>
</div>
<footer class="p-3 bg-white border-top mt-auto w-100">
<div class="row justify-content-lg-between justify-content-center">
<div class="col-auto text-center"></div>
<div class="col-auto text-center">اجرا : <a class="badge text-bg-primary" href="https://www.hosseinyariam.ir" title=" حسین یاری باباجان " target="_blank"> حسین یاری باباجان </a></div>
</div>
</footer>
</div>
</div>
</div>
</div>
<div class="bg-dark vh-100 vw-100 position-fixed opacity-50 d-md-none d-none" id="sidebar-overlay"></div>
</div>
<div class="modal fade" id="panel-modal">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<form action="" method="POST" enctype="multipart/form-data">
<div class="modal-header">
<h1 class="modal-title fw-bold fs-5"></h1>
</div>
<div class="modal-body"></div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" id="submit" name="submit">تایید</button>
<button type="button" class="btn btn-danger" data-bs-dismiss="modal">انصراف</button>
</div>
</form>
</div>
</div>
</div>
<?php
		}
?>
<script src="assets/bootstrap-v5.2.3/js/bootstrap.bundle.min.js"></script>
<script src="assets/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function () {
	$("#sidebar-overlay").click(function() {
		$("#sidebar-toggler").click();
	});
	$("#sidebar-toggler").click(function() {
		$("#panel-sidebar").toggleClass("d-md-none d-md-block d-none");
		$("#panel-content").toggleClass("col-xl-10 col-lg-9 col-md-8 col-xl-12 col-lg-12 col-md-12");
		$("#sidebar-overlay").toggleClass("d-none");
	});
	$("#fullscreen-btn").click(function() {
		var elem = document.documentElement;
		if (window.fullScreen) {
			if (document.exitFullscreen) {
				document.exitFullscreen();
			} else if (document.webkitExitFullscreen) {
				document.webkitExitFullscreen();
			} else if (document.msExitFullscreen) {
				document.msExitFullscreen();
			}
		} else {
			if (elem.requestFullscreen) {
				elem.requestFullscreen();
			} else if (elem.webkitRequestFullscreen) {
				elem.webkitRequestFullscreen();
			} else if (elem.msRequestFullscreen) {
				elem.msRequestFullscreen();
			}
		}
	});
	$(window).on("fullscreenchange", function() {
		$("#fullscreen-btn .bi").toggleClass("bi-fullscreen bi-fullscreen-exit");
	});
	$("#panel-modal").on("show.bs.modal", function(e){
		var button = $(e.relatedTarget);
		if (typeof button.data("bs-size") !== "undefined" && button.data("bs-size") !== false) {
			$("#panel-modal .modal-dialog").attr("class", "modal-dialog modal-dialog-centered modal-" + button.data("bs-size"));
		} else {
			$("#panel-modal .modal-dialog").attr("class", "modal-dialog modal-dialog-centered");
		}
		if (typeof button.data("bs-readonly") !== "undefined" && button.data("bs-readonly") !== false) {
			$("#panel-modal .modal-footer .btn-primary").hide();
			$("#panel-modal .modal-footer .btn-danger").html("بستن");
		} else {
			$("#panel-modal .modal-footer .btn-primary").show();
			$("#panel-modal .modal-footer .btn-danger").html("انصراف");
		}
		if (button.attr("title")) {
			$("#panel-modal .modal-title").html(button.attr("title"));
		} else {
			$("#panel-modal .modal-title").html("پیام سایت");
		}
		if (button.data("bs-message")) {
			$("#panel-modal .modal-body").html(button.data("bs-message"));
		} else {
			$("#panel-modal .modal-body").load(button.attr("href"));
		}
		$("#panel-modal form").attr("action", button.attr("href"));
	});
	$("#panel-modal .modal-footer .btn-primary").click(function() {
		var process = '<div class="spinner-border spinner-border-sm align-middle" role="status"></div> در حال پردازش ...';
		$(this).html(process);
		$(this).removeClass("btn-primary");
		$(this).addClass("disabled");
		$(this).addClass("btn-warning");
		return true;
	});
	var value = ("; " + document.cookie).split("; admin-message-modal=").pop().split(";")[0];
	if (value) {
		$("#panel-modal .modal-body").html(decodeURIComponent(value.replace(/\+/g, " ")));
		$("#panel-modal .modal-footer .btn-danger").html("بستن");
		$("#panel-modal .modal-footer .btn-primary").hide();
		$("#panel-modal .modal-title").html("پیام سایت");
		$("#panel-modal").modal("show");
		document.cookie = "admin-message-modal=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
	}
});
</script>
</body>
</html>
<?php
	}
	
	public function login($message = "") {
		$this->header();
?>
<div class="container vh-100">
<div class="row h-100 justify-content-center align-items-center">
<div class="col-xl-4 col-lg-5 col-md-7">
<div class="card shadow border-secondary my-3">
<div class="card-header bg-secondary text-white fw-bold">ورود به پنل مدیریت</div>
<div class="card-body">
<?php
		if ($message) {
?>
<div class="alert alert-danger"><?=$message?></div>
<?php
		}
?>
<form action="admin.php" method="POST">
<div class="mb-3">
<label class="form-label fw-bold" for="email">پست الکترونیکی:</label>
<input type="email" class="form-control" id="email" name="email" placeholder="لطفا ایمیل خود را وارد کنید" required />
</div>
<div class="mb-3">
<label class="form-label fw-bold" for="password">گذرواژه:</label>
<input type="password" class="form-control" id="password" name="password" placeholder="لطفا رمز خود را وارد کنید" autocomplete="off" required />
</div>
<div class="mb-3">
<label class="form-label fw-bold" for="security_code">کد امنیتی:</label>
<div class="row g-3">
<div class="col-auto"><img class="img-fluid border rounded" src="index.php?page=captcha" alt="کد امنیتی" /></div>
<div class="col"><input type="text" class="form-control" id="security_code" name="security_code" placeholder="لطفا کد امنیتی را وارد کنید" autocomplete="off" required /></div>
</div>
</div>
<div class="d-grid">
<input type="submit" class="btn btn-outline-primary btn-block" id="submit" name="submit" value="ورود" />
</div>
</form>
</div>
<div class="card-footer bg-secondary text-center"><a class="text-white" href="index.php" title="">  بازگشت به همیار کمپینگ </a></div>
</div>
</div>
</div>
</div>
<?php
		$this->footer();
	}
	
	public function index() {
		$this->header(true, "داشبورد", "bi bi-speedometer");
?>
<div class="alert alert-success shadow-sm">به پنل مدیریت خوش آمدید.</div>
<?php
		$this->footer(true);
	}
	
	public function admin($data) {
	$this->header(true, "مدیران سایت", "bi bi-person-fill");
?>
<div class="card shadow-sm">
<div class="card-header">
<a class="btn btn-success" href="admin.php?page=adminnew" title="افزودن مدیر جدید" data-bs-toggle="modal" data-bs-target="#panel-modal">افزودن مدیر جدید</a>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered table-hover mb-0">
<thead>
<tr><th class="text-nowrap">نام</th><th class="text-nowrap">پست الکترونیکی</th><th class="text-nowrap">آخرین ورود</th><th class="text-nowrap">آخرین آی پی</th><th class="text-nowrap">انتخاب‌ها</th></tr>
</thead>
<tbody>
<?php
		if ($data) {
			$shamsi_date = new IntlDateFormatter("fa_IR@calendar=persian", IntlDateFormatter::FULL, IntlDateFormatter::FULL, "Asia/Tehran", IntlDateFormatter::TRADITIONAL, "HH:mm:ss - y/MM/dd");
			foreach ($data AS $item) {
?>
<tr>
<td><?=$item["name"]?></td>
<td><?=$item["email"]?></td>
<td><?=$shamsi_date->format($item["last_login"]) ? $shamsi_date->format($item["last_login"]):"عدم ورود"?></td>
<td><?=$item["last_ip"]?></td>
<td class="text-nowrap"><a class="btn btn-primary btn-sm" href="admin.php?page=adminedit&id=<?=$item["id"]?>" title="ویرایش مدیر" data-bs-toggle="modal"data-bs-target="#panel-modal" data-bs-modal="ajax" ><i class="bi bi-pencil"></i></a>
<a class="btn btn-danger btn-sm <?= ($item["id"]==1) ?"disabled":"" ?>" href="admin.php?page=admindelete&id=<?=$item["id"]?>" title="حذف مدیر" data-bs-toggle="modal"data-bs-target="#panel-modal" data-bs-modal="confirm" data-bs-message="آیا مایل به حذف این مدیر هستید؟"><i class="bi bi-trash"></i></a>
</td>
</tr>
<?php
			}
		} else {
?>
<tr><td class="text-center text-danger fw-bold text-nowrap">آیتمی برای نمایش وجود ندارد.</td></tr>
<?php
		}
?>
</tbody>
</table>
</div>
</div>
</div>
<?php
		$this->footer(true);
	}
	
	public function adminnew($id = 0, $name="",$email="") {
?>
<div class="mb-3">
<label class="form-label fw-bold" for="name">نام و نام خانوادگی:</label>
<input type="text" class="form-control" id="name" value="<?=$name?>" name="name" placeholder="لطفا نام خود را وارد کنید" autocomplete="off" required>
</div>
<div class="mb-3">
<label class="form-label fw-bold" for="email">پست الکترونیکی:</label>
<input type="email" class="form-control" id="email" name="email" value="<?=$email?>" placeholder="لطفا ایمیل خود را وارد کنید" autocomplete="off" required >
</div>
<div>
<label class="form-label fw-bold" for="password">گذرواژه:</label>
<input type="password" class="form-control" id="password" name="password" <?=($id) ? "  placeholder=\"لطفا پسورد را واردکنید\" " : "" ?> autocomplete="off" <?=($id) ? "":"required"?>>
</div>
<?php
if($id){
?>
<input type="hidden" name="id" value="<?=$id?>">
<?php
}
	}
	
public function blog($data) {
$this->header(true, "مقالات سایت", "bi bi-file-earmark-fill");
?>
<div class="card shadow-sm">
<div class="card-header">
<a class="btn btn-success" href="admin.php?page=blognew" title="افزودن مقاله جدید" data-bs-toggle="modal" data-bs-target="#panel-modal">افزودن مقاله جدید</a>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered table-hover mb-0">
<thead>
<tr><th class="text-nowrap">تعداد</th><th class="text-nowrap"> دسته بندی  مقاله</th><th class="text-nowrap">  عنوان مقاله</th><th class="text-nowrap">  خلاصه مقاله</th><th class="text-nowrap">  متن کامل </th><th class="text-nowrap"> تاریخ انتشار </th><th class="text-nowrap"> ادمین  </th><th class="text-nowrap">نویسنده</th><th class="text-nowrap"> تصویر مقاله </th><th class="text-nowrap"> انتخاب ها </th></tr>
</thead>
<tbody>
<?php
		if ($data) {
			$shamsi_date = new IntlDateFormatter("fa_IR@calendar=persian", IntlDateFormatter::FULL, IntlDateFormatter::FULL, "Asia/Tehran", IntlDateFormatter::TRADITIONAL, "HH:mm:ss - y/MM/dd");
			foreach ($data AS $item) {
?>
<tr>
<td><?=$item["id"]?></td>
<td><?=$item["category"]?></td>
<td><?=$item["title"]?></td>
<td><?=$item["summary"]?></td>
<td><?=$item["body"]?></td>
<td><?=$shamsi_date->format($item["time"])?></td>
<td><?=$item["admin"]?></td>
<td><?=$item["author"]?></td>  
<td><?=$item["image"]?></td>
<td class="text-nowrap"><a class="btn btn-primary btn-sm" href="admin.php?page=blogedit&id=<?=$item["id"]?>" title="ویرایش نوشته" data-bs-toggle="modal"data-bs-target="#panel-modal" data-bs-modal="ajax" ><i class="bi bi-pencil"></i></a>
<a class="btn btn-danger btn-sm" href="admin.php?page=blogdelete&id=<?=$item["id"]?>" title="حذف نوشته" data-bs-toggle="modal"data-bs-target="#panel-modal" data-bs-modal="confirm" data-bs-message="آیا مایل به حذف این نوشته هستید؟"><i class="bi bi-trash"></i></a>
</td>
</tr>
<?php
			}
		} else {
?>
<tr><td class="text-center text-danger fw-bold text-nowrap">آیتمی برای نمایش وجود ندارد.</td></tr>
<?php
		}
?>
</tbody>
</table>
</div>
</div>
</div>
<?php
       $this->footer(true);
	}

	public function blognew($id = 0,$category="", $title="", $summary="", $body="", $time="", $admin="", $author="", $image="") {
		?>
		<div>
		<div class="mb-3">
		<label class="form-label fw-bold" for="category">دسته بندی:</label>
		<input type="text" class="form-control" id="category" name="category" value="<?=$category?>"  placeholder="دسته بندی را وارد کنید" autocomplete="off" required />
		</div>
		<div>
		<div class="mb-3">
		<label class="form-label fw-bold" for="title">عنوان:</label>
		<input type="text" class="form-control" id="title" name="title" value="<?=$title?>"  placeholder="عنوان را وارد کنید" autocomplete="off" required />
		</div>
		<div>
		<div class="mb-3">
		<label class="form-label fw-bold" for="summary">خلاصه مقاله:</label>
		<input type="text" class="form-control" id="summary" name="summary" value="<?=$summary?>"  placeholder="خلاصه مقاله را وارد کنید" autocomplete="off" required />
		</div>
		<div>
		<div class="mb-3">
		<label class="form-label fw-bold" for="body">متن کامل:</label>
		<input type="text" class="form-control" id="body" name="body"  value="<?=$body?>" placeholder="متن کامل را وارد کنید" autocomplete="off" required />
		</div>
		<div>
		<div class="mb-3">
		<label class="form-label fw-bold" for="time">تاریخ انتشار:</label>
		<input type="text" class="form-control" id="time" name="time" value="<?=$time?>"  placeholder="تاریخ انتشار را وارد کنید" autocomplete="off" required />
		</div>
		<div>
		<div class="mb-3">
		<label class="form-label fw-bold" for="admin"> ادمین:</label>
		<input type="text" class="form-control" id="admin" name="admin" value="<?=$admin?>"  placeholder="ادمین را وارد کنید" autocomplete="off" required />
		</div>
		<div class="mb-3">
		<label class="form-label fw-bold" for="author"> نویسنده:</label>
		<input type="text" class="form-control" id="author" name="author" value="<?=$author?>"  placeholder="نویسنده را وارد کنید" autocomplete="off" required />
		</div>
		<div class="mb-3">
		<label class="form-label fw-bold" for="image"> تصویر مقاله:</label>
		<input type="text" class="form-control" id="image" name="image" value="<?=$image?>"  placeholder="تصویر مقاله را وارد کنید" autocomplete="off" required />
		</div>
		<?php
		if($id){
			?>
			<input type="hidden" name="id" value="<?=$id?>">
			<?php
			}
			}
	
}

?>
<?php

if (!defined("MYSite")) {
	die("شمامجوز دسترسی به این فایل را ندارید");
}

class view {
    
protected $config;
protected $category;

public function __construct( $config , $category) {
$this->config =$config;
$this->category =$category;
}

//header
public function header() {
?>
<!doctype html>
<html dir="rtl">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=$this->config["title"]?></title>
<meta name="description" content="<?=$this->config["description"]?>" />
<meta name="keywords" content="<?=$this->config["keywords"]?>" />
<link rel="title icon" type="image/svg" href="images/Logo.png">
<link href="assets/bootstrap-icons-v1.10.5/bootstrap-icons.min.css" rel="stylesheet">
<link href="assets/bootstrap-v5.2.3/css/bootstrap.rtl.min.css" rel="stylesheet">
<link href="assets/custom.css" rel="stylesheet" />
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light shadow-sm mb-3">
<div class="container">
<img src="images/Logo.png" width="120" height="120" alt="">
<a class="navbar-brand" href="index.php"><?=$this->config["title"]?></a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
<li class="nav-item"><a class="nav-link" href="index.php">صفحه اصلی</a></li>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">دسته بندی ها</a>
<ul class="dropdown-menu">
<?php
foreach ($this ->category AS $CatItem) {
?> 
<li><a class="dropdown-item" href="index.php?category=<?=$CatItem["id"]?>"><?=$CatItem["name"]?></a></li>
<?php
   }

?>
</ul>
</li>
<li class="nav-item"><a class="nav-link" href="index.php?page=about">درباره ما</a></li>
<li class="nav-item"><a class="nav-link" href="index.php?page=contactus">تماس با ما</a></li>
<li class="nav-item"><a class="nav-link" href="admin.php">ثبت نام / ورود</a></li>
</ul>
<form class="d-flex" role="search" action="index.php" metod="GET">
<input class="form-control me-2" type="text" name="text" placeholder="عبارت مورد نظر ..." require/>
<button class="btn btn-outline-primary" type="submit">
<i class="bi bi-search"></i>
</button>
</form>
</div>
</div>
</nav>
<div class="container">
<div class="row">
<div class="col">
<div id="carouselExampleControls" class="carousel slide mb-3" data-bs-ride="carousel">
<div class="carousel-indicators">
<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
</div>
<div class="carousel-inner">
<div class="carousel-item active">
<img src="images/1.png" class="d-block w-100" alt="...">
<div class="carousel-caption d-none d-md-block">
<h5>تجهیزات کمپینگ | نکات کلیدی + وسایل ضروری | همیار کمپینگ</h5>
<p>کمپ کردن برای هر شخصی معنای خاص خودش را دارد. بعضی‌ها دوست دارند تا با ...</p>
<a href="index.php?id=1" class="btn btn-primary"> ادامه مطلب </a>
</div>
</div>
<div class="carousel-item">
<img src="images/3.png" class="d-block w-100" alt="...">
<div class="carousel-caption d-none d-md-block">
<h5>راهنمای سفر به هلند | کشور لاله ها | معرفی + عکس | همیار کمپینگ</h5>
<p>شاید برات جالب باشد که امروز قرار است راجب کشوری صحبت کنیم که روزگاری ...</p>
<a href="index.php?id=3" class="btn btn-primary"> ادامه مطلب </a>
</div>
</div>
<div class="carousel-item">
<img src="images/5.png" class="d-block w-100" alt="...">
<div class="carousel-caption d-none d-md-block">
<h5>جاهای دیدنی کیش | ۱۰ جای دیدنی که در سفر به کیش باید دید | همیار کمپینگ</h5>
<p>جزیره کیش جاهای دیدنی زیادی دارد اما همه آن‌ها برای شما به درد شما نمی ...</p>
<a href="index.php?id=5" class="btn btn-primary"> ادامه مطلب </a>
</div>
</div>
<div class="carousel-item">
<img src="images/8.png" class="d-block w-100" alt="...">
<div class="carousel-caption d-none d-md-block">
<h5>معرفی بهترین خودرو های مخصوص آفرود + انواع آن | همیار کمپینگ</h5>
<p>تنوع در بازار ماشین‌های پرقدرت آفرودی به حدی زیاد هست که شاید نشود یک ...</p>
<a href="index.php?id=8" class="btn btn-primary"> ادامه مطلب </a>
</div>
</div>
<div class="carousel-item">
<img src="images/10.png" class="d-block w-100" alt="...">
<div class="carousel-caption d-none d-md-block">
<h5>سفری جذاب و خاطره انگیر با قطار گردشگری به جاهای دیدنی ایران</h5>
 <p>اگر تا به حال نام قطار گردشگری رو نشنیدید باید بدانید که چند شهر کشورم ...</p>
<a href="index.php?id=10" class="btn btn-primary"> ادامه مطلب </a>
</div>
</div>
<div class="carousel-item">
<img src="images/11.png" class="d-block w-100" alt="...">
<div class="carousel-caption d-none d-md-block">
<h5>معرفی انواع اتاق در هتل‌های ایران + لیست بهترین هتل ها | همیار کمپینگ</h5>
<p>هر جای دنیا هم که بروید، هتل‌ها دارای اتاق‌های مختلف به همراه امکانات ...</p>
<a href="index.php?id=11" class="btn btn-primary"> ادامه مطلب </a>
</div>
</div>
</div>
<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="visually-hidden">Next</span>
</button>
</div>
</div>
</div>
<?php
     }

//footer
public function footer() {

?>
<footer class="text-center text-white bg-primary py-4">
 <div class="container">
<div class="row flex-column">
<div>
<p class=""> کلیه حقوق محتوا این سایت متعلق به مجله اینترنتی همیار کمپینگ می باشد. </p>
</div>
<div>
<a href="#"><i class="bi bi-facebook text-white mr-2"></i></a>
<a href="#"><i class="bi bi-instagram text-white"></i></a>
<a href="#"><i class="bi bi-telegram text-white"></i></a>
</div>
</div>
</div>
</footer>
<script src="assets/bootstrap-v5.2.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php

   }

//Sidebar
public function sidebar(){
?>
<div class="col-md-4">
<div class="list-group mb-3">
<a href="#" class="list-group-item list-group-item-action active">
دسته بندی ها
</a>
<?php
foreach ($this ->category AS $CatItem) {
?> 
<a class="list-group-item list-group-item" href="index.php?category=<?=$CatItem["id"]?>"><?=$CatItem["name"]?></a>
<?php
}
?> 
</a>
</div>
<div class="card bg-light mb-3 p-3 shadow-sm">
<div class="card-body ">
<h5 class="card-title"> عضویت در خبر نامه همیار کمپینگ </h5>
<form action="index.php" method="POST">
<div class="mb-3">
<label class="form-label fw-bold" for="name">نام و نام خانوادگی:</label>
<input type="text" class="form-control" id="name" name="name" placeholder="لطفا نام و نام خانوادگی خود را وارد کنید" required />
</div>
<div class="mb-3">
<label class="form-label fw-bold" for="email">پست الکترونیکی:</label>
<input type="email" class="form-control" id="email" name="email" placeholder="لطفا ایمیل خود را وارد کنید" required />
</div>
<button type="submit" name="subscribe" class="btn btn-outline-primary btn-block">مشترک شدن</button>
</form>     
</div>
</div>
    

<div class="card mb-3 p-3 shadow-sm">
<div class="card-body">
<h2> درباره ما </h2>
<p class="text-justify">
مجله اینترنتی همیار کمپینگ با هدف توسعه صنعت اکوتوریسم (گردشگری طبیعت) در ایران از ابتدای مهرماه 1399 و همزمان با روز جهانی گردشگری شروع به کار کرد. رویکرد همیار کمپینگ در فاز نخست فعالیت، معرفی و فروش لوازم و تجهیزات کمپینگ و در فاز دوم معرفی تورهای طبیعت گردی و آفرود و تجمیع فعالان این حوزه است.
</p>
</div>
</div>
</div>
</div>
</div>
<?php

  }

//index
public function index($data) {
$this->header();
if($data){

//Right column
?>
<div class="container">
<div class="row">
<div class="col-md-4">
<?php
$intldate = new IntlDateFormatter("fa_IR@calendar=persian", IntlDateFormatter::FULL, IntlDateFormatter::FULL, "Asia/Tehran", IntlDateFormatter::TRADITIONAL, "HH:mm:ss - yyyy/MM/dd");
for($i=0; count($data)>=6 && $i<6 || $i<count($data) && $i<6; $i++) {
			
?>
<div class="card mb-3 shadow-sm">
<img src="./images/<?=$data[$i]["image"] ?>" class="card-img-top" alt="...">
<div class="card-header fw-bold"><?=$data[$i]["title"]?></div>
<div class="card-body"><?=(mb_strlen($data[$i]["summary"])>70) ? mb_substr($data[$i]["summary"], 0, 70)." ..." : $data[$i]["summary"]?>
<div class="text-end">
<a class="btn btn-primary" href="index.php?id=<?=$data[$i]["id"]?>" title="ادامه مطلب"> ادامه مطلب</a>
</div></div>
<div class="card-footer">  نویسنده :  <?=$data[$i]["author"]?></div>
<div class="card-footer">  تاریخ انتشار :  <?=$intldate ->format($data[$i]["time"])?></div>
</div>
<?php	
}
$intldate = NULL;
unset($intldate);
?>
</div>
<?php

//Left column

?>
<div class="col-md-4">
<?php
$intldate = new IntlDateFormatter("fa_IR@calendar=persian", IntlDateFormatter::FULL, IntlDateFormatter::FULL, "Asia/Tehran", IntlDateFormatter::TRADITIONAL, "HH:mm:ss - yyyy/MM/dd");
for($i=6; $i<count($data); $i++) {
?>
<div class="card mb-3 shadow-sm">
<img src="./images/<?=$data[$i]["image"] ?>" class="card-img-top" alt="...">
<div class="card-header fw-bold"><?=$data[$i]["title"]?></div>
<div class="card-body"><?=(mb_strlen($data[$i]["summary"])>70) ? mb_substr($data[$i]["summary"], 0, 70)." ..." : $data[$i]["summary"]?>
<div class="text-end">
<a class="btn btn-primary" href="index.php?id=<?=$data[$i]["id"]?>" title="ادامه مطلب"> ادامه مطلب</a>
</div></div>
<div class="card-footer">  نویسنده :  <?=$data[$i]["author"]?></div>
<div class="card-footer">  تاریخ انتشار :  <?=$intldate ->format($data[$i]["time"])?></div>
</div>
<?php
}
 $intldate = NULL;
unset($intldate);
?>
</div>
<?php
$this->sidebar();
$this->footer();
 }

else{
 ?>
<div class="container">
<div class="row">
<div class="col-md-8">
<div class="card mb-3 shadow-sm">
<div class="alert alert-primary shadow-sm mb-0">دسته بندی با شناسه فوق یافت نشد.</div>
</div>
</div>
<?=$this->sidebar();?>
</div>
</div>          
<?php
   }

    }
    
//Single Page Blog
public function blog($item_body){
$this->header();
if($item_body){
$intldate = new IntlDateFormatter("fa_IR@calendar=persian", IntlDateFormatter::FULL, IntlDateFormatter::FULL, "Asia/Tehran", IntlDateFormatter::TRADITIONAL, "HH:mm:ss - yyyy/MM/dd");
?> 
<div class="container">
<div class="row">
<div class="col-md-8">
<div class="card mb-3 shadow-sm">
<img src="./images/<?=$item_body["image"] ?>" class="card-img-top" alt="...">
<div class="card-header fw-bold"><?=$item_body["title"]?></div>
<div class="card-body">
<div class="border p-2 mb-2 bg-light rounded"><?=$item_body["summary"]?></div> 
<div class="text-justify"><?=$item_body["body"]?></div>
</div>
<div class="card-footer">  نویسنده :  <?=$item_body["author"]?></div>
<div class="card-footer">  تاریخ انتشار :  <?=$intldate ->format($item_body["time"])?></div>
</div>
</div>
<?=$this->sidebar();?>
</div>
</div>
<?php 
$intldate = NULL;
 unset($intldate);

 }else{
?>
<div class="container">
<div class="row">
<div class="col-md-8">
<div class="card mb-3 shadow-sm">
<div class="alert alert-primary shadow-sm mb-0">مقاله ای با شناسه فوق یافت نشد.</div>
</div>
</div>
<?=$this->sidebar();?>
</div>
</div>
            
<?php
   }

$this->footer();

   }

   public function about() {
    $this->header();
?>
<div class="container">
<div class="row">
<div class="col-md-8">
<div class="card shadow-sm">
<div class="card-header"><strong>درباره ما</strong></div>
<div class="card-body text-justify"> مجله اینترنتی همیار کمپینگ با هدف توسعه صنعت اکوتوریسم (گردشگری طبیعت) در ایران از ابتدای مهرماه 1399 و همزمان با روز جهانی گردشگری شروع به کار کرد. رویکرد همیار کمپینگ در فاز نخست فعالیت، معرفی و فروش لوازم و تجهیزات کمپینگ و در فاز دوم معرفی تورهای طبیعت گردی و آفرود و تجمیع فعالان این حوزه است.</div>
</div>
</div>
<?=$this->sidebar();?>
</div>
</div>
<?php
    $this->footer();
}

public function contactus($text = "", $class = "") {
    $this->header();
?>
<div class="container">
<div class="row">
<div class="col-md-8">
<div class="card shadow-sm">
<div class="card-header"><strong>تماس با ما</strong></div>
<div class="card-body">
<?php
    if ($text) {
?>
<div class="alert <?=$class?>"><?=$text?></div>
<?php
    }
?>
<form action="index.php?page=contactus" method="POST">
<div class="mb-3">
<label class="form-label fw-bold" for="name">نام و نام خانوادگی:</label>
<input type="text" class="form-control" id="name" name="name" placeholder="لطفا نام و نام خانوادگی خود را وارد کنید" required />
</div>
<div class="mb-3">
<label class="form-label fw-bold" for="email">پست الکترونیکی:</label>
<input type="email" class="form-control" id="email" name="email" placeholder="لطفا ایمیل خود را وارد کنید" required />
</div>
<div class="mb-3">
<label class="form-label fw-bold" for="text">پیام:</label>
<textarea class="form-control" id="text" name="text" placeholder="لطفا پیام  خود را وارد کنید" rows="6" required></textarea>
</div>
<div class="mb-3">
<label class="form-label fw-bold" for="security_code">کد امنیتی:</label>
<div class="row g-3">
<div class="col-auto"><img class="img-fluid border rounded" src="index.php?page=captcha" alt="کد امنیتی" /></div>
<div class="col"><input type="text" class="form-control" id="security_code" name="security_code" placeholder="لطفا کد امنیتی را وارد کنید"  autocomplete="off" required /></div>
</div>
</div>
<input type="submit" class="btn btn-primary" name="submit" value="ارسال" />
<input type="reset" class="btn btn-danger" name="reset" value="بازنشانی" />
</form>
</div>
</div>
</div>
<?=$this->sidebar();?>
</div>
</div>
<?php
    
    $this->footer();
}
		
 }
	
?>
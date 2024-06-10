<?php

if (!defined("MYSite")) {
	die("شمامجوز دسترسی به این فایل را ندارید");
}

class model {

	protected $pdo;
	
	public function __construct() {
		try {
			$this->pdo = new PDO("mysql:host=localhost;dbname= enter your database name ;charset=utf8;", "enter your database user name", "enter your database password");
		} catch (PDOException $e) {
			die("Connection Error: ".$e->getMessage());
		}
	}
	
	public function get_config() {
		$query = $this->pdo->query("SELECT name, value FROM config ORDER BY name");
		return $query->fetchAll(PDO::FETCH_KEY_PAIR);
	}
	
	public function get_admin_by_email($email) {
		$query = $this->pdo->prepare("SELECT id, password FROM admin WHERE email=?");
		$query->execute(array($email));
		return $query->fetch();
	}
	
	public function admin_login_update($id) {
		$query = $this->pdo->prepare("UPDATE admin SET last_login=?, last_ip=? WHERE id=?");
		return $query->execute(array(time(), $_SERVER["REMOTE_ADDR"], $id));
	}
	
	public function is_admin($id) {
		$query = $this->pdo->prepare("SELECT COUNT(id) AS total FROM admin WHERE id=?");
		$query->execute(array($id));
		return $query->fetch()["total"];
	}
	
	public function get_admins() {
		$query = $this->pdo->query("SELECT id, name, email, last_login, last_ip FROM admin ORDER BY id DESC");
		return $query->fetchAll();
	}
	
	public function adminnew($name, $email, $password) {
		$query = $this->pdo->prepare("INSERT INTO admin (name, email, password) VALUES (?, ?, ?)");
		return $query->execute(array($name, $email, password_hash($password, PASSWORD_DEFAULT)));
	}

	public function get_admin_detail($id) {
		$query = $this->pdo->prepare("SELECT name, email FROM admin WHERE id=?");
		$query->execute(array($id));
		return $query->fetch();
	}

	public function update_admin($id, $name, $email, $password ="") {
		if($password){
		$query = $this->pdo->prepare("UPDATE  admin SET name=?, email=?,password=?  WHERE id=?");
		return $query->execute(array($name,$email,password_hash($password,PASSWORD_DEFAULT),$id));
	}else{
		$query = $this->pdo->prepare("UPDATE  admin SET name=?, email=?  WHERE id=?");
		return $query->execute(array($name,$email,$id));
	}
	}

	public function delete_admin($id) {
		$query = $this->pdo->prepare("DELETE FROM admin WHERE id=?");
		return $query->execute(array($id));
	}


	public function get_blogs() {
		$query = $this->pdo->query("SELECT * FROM blog ORDER BY id ASC");
		return $query->fetchAll();
	}
	
	public function blognew( $category, $title, $summary, $body, $time, $admin, $author, $image ) {
		$query = $this->pdo->prepare("INSERT INTO blog (category, title, summary,body, time, admin,author, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
		return $query->execute(array($category, $title, $summary, $body, $time, $admin, $author, $image));
	}

	public function get_blog_detail($id) {
		$query = $this->pdo->prepare("SELECT category, title, summary,body, time, admin,author, image FROM blog WHERE id=?");
		$query->execute(array($id));
		return $query->fetch();
	}
	

	public function delete_blog($id) {
		$query = $this->pdo->prepare("DELETE FROM blog WHERE id=?");
		return $query->execute(array($id));
	}

	public function update_blog($id, $category, $title, $summary, $body, $time, $admin, $author, $image) {
		$query = $this->pdo->prepare("UPDATE  blog SET category=?,title=?,summary=?,body=?,time=?,admin=?,author=?,image=? WHERE id=?");
		return $query->execute(array($category, $title, $summary, $body, $time, $admin, $author, $image,$id));
	}
	
	public function __destruct() {
		$this->pdo = NULL;
	}
	
}

?>
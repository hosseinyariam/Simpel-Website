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
			die("Connection Error:".$e->getMessage());
		}
	}

	public function get_config() {
		$query = $this->pdo->query("SELECT name, value FROM config ORDER BY name");
		return $query->fetchAll(PDO::FETCH_KEY_PAIR);
	}

	public function get_posts( $text="" ,$category = 0 ) {
	if ($text){
	$query = $this->pdo->prepare("SELECT id, title, summary ,author,image, time FROM blog WHERE title Like ? OR summary Like ? ORDER BY id ");
	$query->execute(array("%$text%", "%$text%"));
	}else{
	if($category) {
	$query = $this->pdo->prepare("SELECT id, title, summary ,author,image, time FROM blog WHERE category = ? ORDER BY id ");
	$query->execute(array($category));
	} else {
	$query = $this->pdo->query("SELECT id, title, summary ,author,image, time FROM blog ORDER BY id LIMIT 12");
	}
    }

	 return $query->fetchAll();
	}

	public function get_category() {
		$query = $this->pdo->query("SELECT id, name FROM category ORDER BY id ");
		return $query->fetchAll();
	}

	public function get_body($id) {
		$query = $this->pdo->prepare("SELECT * FROM blog WHERE id=?");
		$query->execute(array($id));
		return $query->fetch();
	}
	
	public function contactus($name, $email, $text) {
		$query = $this->pdo->prepare("INSERT INTO contactus (name, email, text, time, ip) VALUES (?, ?, ?, ?, ?)");
		return $query->execute(array($name, $email, $text, time(), $_SERVER["REMOTE_ADDR"]));
	}
	

	
	public function __destruct() {
		$this->pdo = NULL;
	}
	
}

?>





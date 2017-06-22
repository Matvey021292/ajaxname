<?php

	class User{
		public $login;
		public $password;
		public $name;
		public $age;

		public function __construct($login,$pass,$name,$age){
			$this->login = $login;
			$this->password = $pass;
			$this->name = $name;
			$this->age = $age;
			
		}
		public function register(){
				$db = new DB();
				var_dump("INSERT INTO `users`(`login`, `password`, `name`, `age`) VALUES ('$this->login','$this->password','$this->name','$this->age')");
				return $db->insert("INSERT INTO `users`(`login`, `password`, `name`, `age`) VALUES ('$this->login','$this->password','$this->name','$this->age')");
		}
		static function validate($login){
				$db = new DB();
				return $db->findAll("SELECT `id` FROM `users` WHERE `login` = '$login';")->num_rows;
		}
	
	}

?>
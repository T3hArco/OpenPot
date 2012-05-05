<?php

	class db
	{
		private $host;
		private $user;
		private $pass;
		private $name;
		
		private $link;
		
		public static function build($config)
		{
			$db = new db($config['host']);
			$db->connect($config['user'], $config['pass']);
			$db->select($config['name']);
			return $db;
		}
		
		function __construct($host)
		{
			$this->host = $host;
		}
		
		public function connect($user, $pass)
		{
			$this->user = $user;
			$this->pass = $pass;
			$this->link = mysql_connect($this->host, $this->user, $this->pass, true) or die(mysql_error());
			if(!$this->link) return false;
			else return true;
		}
		
		public function select($name)
		{
			$this->name = $name;
			return mysql_select_db($this->name, $this->link) or die(mysql_error());
		}
		
		public function query($query)
		{
			$result = mysql_query($query, $this->link) or die(mysql_error());
			return $result;
		}
		
		public function close()
		{
			mysql_close($this->link) or die(mysql_error());
		}
		
	}
	
?>
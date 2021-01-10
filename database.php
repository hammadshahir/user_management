<?php
	class Database 
		{
			public $host = DB_HOST;
			public $user = DB_USER;
			public $pass = DB_PASS;
			public $dbname = DB_NAME;

			public $link;
			public $error;

			public function __construct()
			{
				$this->connectDB();
			} // end of construct method

			private function connectDB() 

			{
				$this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
				if(!$this->link)
					{
						$this->error = "connection fail" . $this->link->connect_error;
						return false;	
					}
			} // end of connectDB method

			public function insert($query)
			{
				$insert_row = $this->link->query($query) or die ($this->link->error.__LINE__);
				if($insert_row) {
					header("Location: index.php?msg=".urlencode('Data inserted successfully'));
					exit();
				} else {
					die("Error: (".$this->link->erron.")".$this->link->error);
				}
			} // end of insert method	


			public function select($query)
			{
				$result = $this->link->query($query) or die($this->link->error.__LINE__);
				if($result->num_rows > 0) {
					return $result;
				} else {
					return false;
				}
			} // end of select method

			
		 public function update($query)
		 {
			 $update_row = $this->link->query($query) or die($this->link->error.__LINE__);
			 if($update_row) {
				 header("Location: index.php?msg=".urlencode('Data updated successfully'));
				 exit();
			 } else {
				 die("Error: (".$this->link->erron.")".$this->link->error);
			 }
		  } // end of update method
		
		public function delete($query) 
		{
			$delete_row = $this->link->query($query) or die ($this->link->error.__LINE__);
			if($delete_row) {
				header("Location: index.php?msg=".urlencode("Data deleted successfully"));
			} else {
				die("Error: (".$this->link->erron.")".$this->link->error);
			}
		} // end of delete method
		
		
		} // end of Database Class
?>
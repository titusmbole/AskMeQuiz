<?php 
session_start();
ini_set('display_errors', 1);

class Action
{
	
	function __construct()
	{
		ob_start();
		include "api/config/Database.php";
		$this->connection = new Database();
		$this->conn = $this->connection->connect();
		ob_end_flush();
	}

	function __destruct()
	{
		$this->conn->close();
		ob_end_flush();
	}

	private function get_logged_user($str){
		$username = "";
		$query = $this->conn->query("SELECT * FROM users WHERE u_email = '". $str ."'");
		while($row = mysqli_fetch_array($query)){
			$username .= $row['u_name'];
		}
		return $username;
	
	}

	public function add_question(){
		extract($_POST);
		$out = "";
		$question_id = rand(111111, 999999);
		$question_asked_date = date("d/m/Y");
		$question_asked_by = $this->get_logged_user($_SESSION['user']);
		$sql = $this->conn->query("INSERT INTO questions (question_category, question, question_moreinfo, question_file_attachment, question_id, question_ask_date, question_asked_by, question_tags) VALUES ('" .$_POST['question_category']. "', '" .$_POST['question']. "', '" .$_POST['question_moreinfo']. "', '', '" . $question_id . "', '" .$question_asked_date. "', '" .$question_asked_by. "', '" .$_POST['question_tags']. "')");
		if ($sql) {
			$out = "Question Added";
		} else {
			$out = 'Question Failed to Add';
		}
		return $out;
	}


	public function create_account(){
		extract($_POST);
		// Check for the email Existence
		$chk_email = $this->conn->query("SELECT u_email FROM users WHERE u_email = '". $_POST['u_email'] ."'")->num_rows;
		
		if ($chk_email > 0) {
			return json_encode(array("msg"=>"Email Used"));
			exit();
		}
		// Check for Password equality
		if($_POST['u_pass'] != $_POST['u_pass1']){
			return json_encode(array("msg"=>"Password dont Match"));
			exit();
		}

		$query = $this->conn->query("INSERT INTO users (u_name, u_email, u_pass) VALUES ('". $_POST['u_name'] ."', '". $_POST['u_email'] ."', '". sha1($_POST['u_pass']) ."')");
		if ($query) {
			return json_encode(array('msg'=>'Account Created'));
		}else{
			return json_encode(array('msg'=>'Failed to create Account'));
		}
	}

	public function login_user(){
		extract($_POST);
		$chk_user = $this->conn->query("SELECT * FROM users WHERE u_email = '". $_POST['u_email'] ."' AND u_pass = '". sha1($_POST['u_pass']) ."'")->num_rows;
		if($chk_user > 0){
			$_SESSION['user'] = $_POST['u_email'];
			return json_encode(array('msg'=>'ok'));
			
		}else{
			return json_encode(array('msg'=>'Incorrect Password'));
		}
		// return json_encode(array('msg'=>$chk_email));
	}

	



	











}





?>
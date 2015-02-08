<?php
class User extends Database{
	public $tbl = 'user';
	
	public function getAll(){
		$str = " SELECT * FROM $this->tbl ";
		return $this->selectAll($str);
	}

	public function getUserByEmail($email){
		$str = " SELECT * FROM $this->tbl WHERE email = :email ";
		$arr = array('email'=>$email);
		return $this->select($str, $arr);
	}
}
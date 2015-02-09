<?php
class Subsubpage extends Database{
	public $tbl = 'sub_subpages';
	
	public function getAll(){
		$str = " SELECT * FROM $this->tbl ";
		return $this->selectAll($str);
	}

	public function getCurrentPage($name){
		$str = " SELECT * FROM $this->tbl WHERE name = :name ";
		$arr = array('name'=>$name);
		return $this->select($str, $arr);
	}

	public function updatePage($tbl, $name, $title, $body, $id, $locked){
		$str = " UPDATE $tbl SET title = :title,
		body = :body,
		name = :name,
		id = :id,
		locked = :locked
		WHERE id = :id ";
		$arr = array('title'=>$title,
					'body'=>$body,
					'name'=>$name,
					'id'=>$id,
					'locked'=>$locked);
		$this->update($str, $arr);
	}

}
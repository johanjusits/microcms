<?php
class Page extends Database{
	public $tbl = 'pages';
	
	public function getAll(){
		$str = " SELECT * FROM $this->tbl ";
		return $this->selectAll($str);
	}

	public function getCurrentPage($name){
		$str = " SELECT * FROM $this->tbl WHERE name = :name ";
		$arr = array('name'=>$name);
		return $this->select($str, $arr);
	}

	public function updatePage($name, $title, $body, $id, $locked){
		$str = " UPDATE $this->tbl SET title = :title,
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
<?php

include "FolderInterface.php";

/**
* 
*/
class Folder implements FolderInterface
{
	
	private $name;
	private $created;
	private $path;

	/**
	* @return string
	*/
	public function getName() {
		return $this->name;
	}

	/**
	* @param string $name
	*
	* @return $this
	*/
	public function setName($name) {
		$this->name = $name;
	}

	/**
	* @return DateTime
	*/
	public function getCreatedTime() {
		return $this->created;
	}

	/**
	* @param DateTime $created
	*
	* @return $this
	*/
	public function setCreatedTime($created) {
		$this->created = $created;
	}

	/**
	* @return string
	*/
	public function getPath(){
		return $this->path;
	}

	/**
	* @param string $path
	*
	* @return $this
	*/
	public function setPath($path) {
		$this->path = $path;
	}

}
?>
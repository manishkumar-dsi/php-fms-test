<?php 
	include 'FileInterface.php';
	/**
	* 
	*/
	class File implements FileInterface
	{
		private $name;
		private $size;
		private $created;
		private $modified;
		private $parentFolder;
		private $path;
		private $fp;

		public function getFileHandle() {
			return $this->fp;
		}

		public function setFileHandle($fp) {
			$this->fp = $fp;
		}
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
		* @return int
		*/
		public function getSize() {
			return $this->size;
		}

		/**
		* @param int $size
		*
		* @return $this
		*/
		public function setSize($size) {
			$this->size = $size;
		}

		/**
		* @return DateTime
		*/
		public function getCreatedTime() {
			return $created;
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
		* @return DateTime
		*/
		public function getModifiedTime() {
			return $this->modified;
		}

		/**
		* @param DateTime $modified
		*
		* @return $this
		*/
		public function setModifiedTime($modified) {
			$this->modified = $modified;
		}

		/**
		* @return FolderInterface
		*/
		public function getParentFolder() {
			return $this->parentFolder;
		}

		/**
		* @param FolderInterface $parent
		*
		* @return $this
		*/
		public function setParentFolder(FolderInterface $parent) {
			$this->parentFolder = $parent;
		}

		/**
		* @return string
		*/
		public function getPath() {
			return $this->path;
		}

	}
?>
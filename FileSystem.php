<?php

include 'FileSystemInterface.php';
include 'File.php';
include 'Folder.php';

class FileSystem implements FileSystemInterface {
	/**
   * @param FileInterface   $file
   * @param FolderInterface $parent
   *
   * @return FileInterface
   */
	public function createFile(FileInterface $file, FolderInterface $parent) {
		$fileName = $file->getName();
		$path = $parent->getPath();
		$filePath = $path . '/' . $fileName;
		$fp = @fopen($filePath, 'w+');
		// set file handle
		$file->setFileHandle($fp);
	}

	/**
	* @param FileInterface $file
	*
	* @return FileInterface
	*/
	public function updateFile(FileInterface $file) {

	}

	/**
	* @param FileInterface $file
	* @param               $newName
	*
	* @return FileInterface
	*/
	public function renameFile(FileInterface $file, $newName) {
		$oldName = $file->getName();
		// Check Old name and New Name is same
		if ($oldName == $newName) {
			return 'SAME_NAME';
		}
		// Check old file is existing or not
		$status = file_exists($oldName);
		if (!$status) {
			return 'FILE_MISSING';
		}

		//Rename
		$status = rename($oldName, $newName);
		if ($status) {
			return 'SUCCESS';
		}
		return 'FAIL';
	}

	/**
	* @param FileInterface $file
	*
	* @return bool
	*/
	public function deleteFile(FileInterface $file) {
		$filePath = $file->getName();

		//check file exist or not
		$status = file_exists($filePath);
		if (!$status) {
			return 'FILE_MISSING';
		}
		$status = unlink($filePath);
		
		if ($status) {
			return 'SUCCESS';	
		} else {
			return 'FAIL';
		}
	}

	/**
	* @param FolderInterface $folder
	*
	* @return FolderInterface
	*/
	public function createRootFolder(FolderInterface $folder) {

	}

	/**
	* @param FolderInterface $folder
	* @param FolderInterface $parent
	*
	* @return FolderInterface
	*/
	public function createFolder(FolderInterface $folder, FolderInterface $parent) {

	}

	/**
	* @param FolderInterface $folder
	*
	* @return bool
	*/
	public function deleteFolder(FolderInterface $folder) {

	}

	/**
	* @param FolderInterface $folder
	* @param                 $newName
	*
	* @return FolderInterface
	*/
	public function renameFolder(FolderInterface $folder, $newName) {

	}

	/**
	* @param FolderInterface $folder
	*
	* @return int
	*/
	public function getFolderCount(FolderInterface $folder) {

	}

	/**
	* @param FolderInterface $folder
	*
	* @return int
	*/
	public function getFileCount(FolderInterface $folder) {

	}

	/**
	* @param FolderInterface $folder
	*
	* @return int
	*/
	public function getDirectorySize(FolderInterface $folder) {

	}

	/**
	* @param FolderInterface $folder
	*
	* @return FolderInterface[]
	*/
	public function getFolders(FolderInterface $folder) {

	}

	/**
	* @param FolderInterface $folder
	*
	* @return FileInterface[]
	*/
	public function getFiles(FolderInterface $folder) {

	}
}
?>
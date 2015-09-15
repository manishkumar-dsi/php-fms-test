<?php
include_once 'FileSystem.php';
include_once 'File.php';
include_once 'Folder.php';

if (PHP_SAPI != 'cli') {
	exit();
}
// check arguments
if ($argc <= 1) {
	echo "\nPlease pass proper arguments.\n";
	echo "arg 1 ===> Command (create, update)\n";
	echo "arg 2 ===> File Path (ex : \home\manish\\folder\)\n";
	echo "arg 3 ===> File name\n";
	exit();
}

$command = $argv[1];

switch ($command) {
	case 'create':
		$filename = isset($argv[3]) ? $argv[3] : null;
		$path = isset($argv[2]) ? $argv[2] : null;

		if (!isset($filename) || is_null($filename)) {
			echo "\nPlease provide file name.\n";
			exit();
		}

		if (!isset($path) || is_null($path)) {
			$path = '.';
		}

		createFile($filename, $path);
		break;
	case 'renameFile':
		$oldFileName 	= isset($argv[2]) ? $argv[2] : null;
		$newFileName 	= isset($argv[3]) ? $argv[3] : null;
		$path 			= isset($argv[4]) ? $argv[4] : null;
		
		if (!isset($oldFileName) || is_null($oldFileName)) {
			echo "\nPlease provide old file name.\n";
			exit();
		}
		if (!isset($newFileName) || is_null($newFileName)) {
			echo "\nPlease provide new file name.\n";
			exit();
		}
		if (!isset($path) || is_null($path)) {
			echo "\nPlease provide file path name.\n";
			exit();
		}

		renameFile($oldFileName, $newFileName, $path);
		break;
	
	default:
		# code...
		break;
}

function createFile($filename, $path) {
	$fileObj = new File();
	$fileObj->setName($filename);
	$folderObj = new Folder();
	$folderObj->setPath($path);
	$fileSystemObj = new FileSystem();
	$fileSystemObj->createFile($fileObj,$folderObj);
}

function renameFile($old, $new, $path) {
	
	$oldFile = $path . '/' . $old;
	$newFile = $path . '/' . $new;

	// Rename the file
	$fileObj = new File();
	$fileObj->setName($oldFile);

	$fileSystemObj = new FileSystem();
	$status = $fileSystemObj->renameFile($fileObj, $newFile);
	if ($status == 'SAME_NAME') {
		echo "\nOld name and New name is same. Please provide different new file name.\n";
		return;
	}
	if ($status == 'FILE_MISSING') {
		echo "\n Given File does not exist. Please check your File Path.\n";
		return;
	}
	
	if ($status == 'SUCCESS') {
		echo "\n File name changed successfully. \n";
	} else {
		echo "\n File name could not changed. Please try again.\n";
	}
}


?>
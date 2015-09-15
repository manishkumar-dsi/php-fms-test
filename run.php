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

$command = isset($argv[1]) ? $argv[1] : 'create';
$filename = isset($argv[3]) ? $argv[3] : null;
$path = isset($argv[2]) ? $argv[2] : null;

if (!isset($filename) || is_null($filename)) {
	echo "\nPlease provide file name.\n";
	exit();
}

if (!isset($path) || is_null($path)) {
	$path = '.';
}

switch ($command) {
	case 'create':
		createFile($filename, $path);
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
?>
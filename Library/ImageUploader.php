<?php
namespace Library;

class ImageUploader 
{
	public static function upload_file(
		$file,
		$upload_dir= '../webroot/img', 
		$allowed_types= array('image/png','image/x-png','image/jpeg','image/webp','image/gif')
	){

		$filename = $_FILES['imgfile']['name'];		
		$blacklist = array(".php", ".phtml", ".php3", ".php4");
		$ext = substr($filename, strrpos($filename,'.'), strlen($filename)-1); 

		if(in_array($ext,$blacklist )){
			return array('error' => 'Запрещено загружать исполняемые файлы');
		}

		$upload_dir = dirname(__FILE__).DIRECTORY_SEPARATOR.$upload_dir.DIRECTORY_SEPARATOR;
		$max_filesize = 8388608; 
		$prefix = date('Ymd-is_');
		$filename = $file['name']; 

		if(!is_writable($upload_dir)) 
			return array('error' => 'Невозможно загрузить файл в папку "'.$upload_dir.'". Установите права доступа - 777.');

		if(!in_array($file['type'], $allowed_types))
			return array('error' => 'Данный тип файла не поддерживается.');

		if(filesize($file['tmp_name']) > $max_filesize)
			return array('error' => 'файл слишком большой. максимальный размер '.intval($max_filesize/(1024*1024)).'мб');

		if(!move_uploaded_file($file['tmp_name'],$upload_dir.$prefix.$filename)) 
			return array('error' => 'При загрузке возникли ошибки. Попробуйте ещё раз.');

		return Array('filename' => $prefix.$filename);
	}
}
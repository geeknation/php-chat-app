<?php 
	/**
	 *Class that holds all general purpose functions used across the application
	 */
	class Util{

		function __construct(){

		}
		public function zipFiles($filespath,$zippath){
			$files=array_diff(scandir($filespath), array(".",".."));
			$zip = new ZipArchive();
			$zip->open($zippath, ZipArchive::CREATE);
			foreach($files as $file){
			  $zip->addFile($filespath.$file,$file);
			  //echo $files['file_name'];
			}
			$zip->close();
		}
		/**
		 *function to reset the global path of the storage cluster and return path elements of the the given *file path
		 *@param string
		 *@return array
		 */
		public function globalizeAttachmentsPath($path){
			$root=$_SERVER['DOCUMENT_ROOT'];
			$frags=explode("/", $path);
			$rootlevel=implode("/", array_diff($frags, array("..")));
			$globalClusterPath='';
			if($_SERVER['SERVER_NAME']=="localhost"){
				$globalClusterPath = $root."/writesoft/cluster/";

			}else{
				$globalClusterPath="/cluster/";

			}

			$user_folder_path=$globalClusterPath.$frags[2]."/";
			$order_folder_path=$user_folder_path.$frags[3]."/";
			$attachmentsPath=$order_folder_path."attachments/";

			$paths=array(
				"cluster"=>$globalClusterPath,
				"userpath" => $user_folder_path,
				"orderPath" => $order_folder_path,
				"fullFilesPath" => $attachmentsPath
				);
			return $paths;
		}

		/**
		 *function to remove a directory and its contents
		 *@param directory path
		 *@return null
		 */

		function deleteDirectory($dir) {
		    if (!file_exists($dir)) {
		        return true;
		    }
		    if (!is_dir($dir)) {
		        return unlink($dir);
		    }
		    foreach (scandir($dir) as $item) {
		        if ($item == '.' || $item == '..') {
		            continue;
		        }

		        if (!$this->deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
		            return false;
		        }

		    }
		    return rmdir($dir);
		}
		/**
		 *function to delete only the folder contents on the given folder path
		 *@param folder path
		 *@return boolean.
		 */
			function deleteDirectoryContents($path){
				if (is_file($path)) {
				     return @unlink($path);
				}
				else
				 if (is_dir($path)) {
		            array_map(function($value) {
		                $this->deleteDirectory($value);
		            },glob($path . '/*', GLOB_ONLYDIR));
		            array_map('unlink', glob($path."/*"));
		        }
			}
			/**
			 *function to rename a folder.
			 *@param oldname, newname
			 *@return boolean
			*/
			function renameDir($oldname,$newname){
				rename($oldname, $newname);
			}

			/**
			 *standard for returning server responses in json
			 *@param message
			 *@return json
			 */

			function jsonServerResponse($message,$status,$data=''){
				$responsearray=array(
					"message" => $message,
					"status" => $status,
					"data" => $data
				);
				return json_encode($responsearray);
			}

			/**
			 *current url parser
			 *@param null
			 *@return array
			 */
			function getUrl($action){
				$server_name=$_SERVER['SERVER_NAME'];
				$rootFolder='';
				switch ($action) {
					case 'root-folder':
						if($server_name=="localhost"){
							$rootFolder="localhost/writesoft/";
						}else{
							$rootFolder=$server_name."/";
						}
						return $rootFolder;

						break;
					
					default:
						# code...
						break;
				}
			}

			function arrayToJson($arrayObject){
				$array = [];
				for ($i=0; $i <count($arrayObject) ; $i++) { 
					# code...
					array_push($array,$arrayObject[$i]);
				}
				return $array;
			}

			function rootFolder($startFolder){
				$pathArr = explode("/", __DIR__);
				$root = join("/",array_slice($pathArr,(array_search($startFolder,$pathArr))));
				echo $root;
			}

			

	}
 ?>
 
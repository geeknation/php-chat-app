<?php
include "models/php-activerecord/ActiveRecord.php";
class ORMloader{

		
		public $onlineUser = "root";
		public $onlineDB = "goodnews";
		public $onlinepsk = "Kerugoya1234!";

		public $mchUser="root";
		public $mchDB = "goodnews";
		public $mchpsk = "Kerugoya1234!";
		public $ORMconn='';
		public $connString = '';

	public function __construct(){
		
		$connections = array(
			"development"=>"mysql://".$this->mchUser.":".$this->mchpsk."@localhost/".$this->mchDB,
			'production' =>"mysql://".$this->onlineUser.":".$this->onlinepsk."@localhost/".$this->onlineDB
		);

		$cfg = ActiveRecord\Config::instance();
		//  $cfg->set_model_directory('/path/to/your/model_directory');
		$cfg->set_connections($connections);

		# default connection is now production
		$cfg->set_default_connection('development');
 
	}	

	function printConn(){
		print_r($this->connString);
	}
}

?>
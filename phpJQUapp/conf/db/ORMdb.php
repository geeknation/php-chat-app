<?php

include "models/php-activerecord/ActiveRecord.php";
include "models/tblModels.php";

class ORMdb{


    public $onlineUser = "hevimspb_allnews";
    public $onlineDB = "hevimspb_allnews";
    public $onlinepsk = "Kerugoya1234!";

    public $mchUser="root";
    public $mchDB = "allnews";
    public $mchpsk = "Oppositeihub14#";
    public $ORMconn='';
    public $connString = '';
 
    public $tblArticles='';
    public $tblEntities='';
    public $tblHistory='';
    public $tblSites='';
    public $tblUsers='';
    public $cfg='';
    function __construct(){

        $connections = array(
			"development"=>"mysql://".$this->mchUser.":".$this->mchpsk."@localhost/".$this->mchDB,
			'production' =>"mysql://".$this->onlineUser.":".$this->onlinepsk."@localhost/".$this->onlineDB
		);
        
		$cfg = ActiveRecord\Config::instance();
		//  $cfg->set_model_directory('/path/to/your/model_directory');
		$cfg->set_connections($connections);

		# default connection is now production
		$cfg->set_default_connection('development');
        
        $this->cfg = $cfg;
        
        $this->tblArticles=new Articles();
        $this->tblEntites=new Entities();
        $this->tblHistory = new History();
        $this->tblSites = new Sites();
        $this->tblUsers = new Users();
    }


}
?>
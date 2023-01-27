<?php
error_reporting(0);
require '../vendor/autoload.php';

// include "../vendor/smarty/smarty/libs/Smarty.class.php";

$smarty = new Smarty();

$smarty->setTemplateDir('templates');
// $smarty->setConfigDir('/some/config/dir');
// $smarty->setCompileDir('/some/compile/dir');
// $smarty->setCacheDir('/some/cache/dir');
$smarty->assign("welcomeMessage",'WELCOM TO SMARTY KENYA');
$smarty->display('smarty-test.tpl');

?>
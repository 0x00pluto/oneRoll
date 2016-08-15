<?php



/**
 *      [2yyg!] (C)2010-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *		author: enixlee
 */





 

 /*
 *---------------------------------------------------------------
 * SYSTEM VERSION TYPE
 *---------------------------------------------------------------
 */
  
 define('G_BANBEN_TYPE',"9aabCQkBVlQABwcEU1wDD1NWUVcCClBaAwcAC1GK3fvfn5besLlKgbis04z5gr+wSoSF3Nmz09657BTWi+KC263Wu7EV19Pv2Jii0+rt");
 
 /*
 *---------------------------------------------------------------
 * SYSTEM FOLDER NAME
 *---------------------------------------------------------------
 */
$system_path = 'system';

 /*
 *---------------------------------------------------------------
 * STATICS FOLDER NAME
 *---------------------------------------------------------------
 */
$statics_path = 'statics';


 /*
 *---------------------------------------------------------------
 * APP START PATH
 *---------------------------------------------------------------
 */
define('G_APP_PATH',dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR);

/*
 * --------------------------------------------------------------
 * LOAD THE BOOTSTRAP FILE
 * --------------------------------------------------------------
 */
include  G_APP_PATH.$system_path.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'global.php';

/*
 * --------------------------------------------------------------
 * APP START
 * --------------------------------------------------------------
 */

include_once G_APP_PATH.$system_path.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

System::CreateApp();

?>

<!-- <a href="http://onerollweibo.tomatofuns.com/mobile/user/weiboLogin">新浪登陆</a> -->

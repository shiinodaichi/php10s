<?php
/**
 * Ajaxによるリクエストかどうか
 * @return boolean True or False
 */
function isAjax(){
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
        return true;
    }
    return false;
}
//Ajaxアクセス以外は処理しない。
if( isAjax()==false ){
    exit;
}
//上記に書いておくと、Ajax以外を弾きます。










?>
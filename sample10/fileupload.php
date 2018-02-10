<?php
//受信側のチェック
//Fileアップロードチェック
if (isset($_FILES["upfile"] ) && $_FILES["upfile"]["error"] ==0 ) { //送信先のnameと、FILESのnameを一致させる
    //情報取得 名前、一時保存フォルダtmpのパス、保管先のパス　アプリ名でもいいのでは。
    $file_name = $_FILES["upfile"]["name"];         //"1.jpg"ファイル名取得
    $tmp_path  = $_FILES["upfile"]["tmp_name"]; //"/usr/www/tmp/1.jpg"アップロード先のTempフォルダ
    $file_dir_path = "upload/";  //画像ファイル保管先

    
    //***File名の変更***
    $extension = pathinfo($file_name, PATHINFO_EXTENSION); //拡張子取得(jpg, png, gif)
    $uniq_name = date("YmdHis").md5(session_id()) . "." . $extension;  //ユニークファイル名作成 日付とセッションIDをmd5でハッシュ化。「xxxx.jpg」
    $file_name = $file_dir_path.$uniq_name; //ユニークファイル名とパス
   

    $img="";  //画像表示orError文字を保持する変数
    // FileUpload [--Start--]
    if ( is_uploaded_file( $tmp_path ) ) {
        if ( move_uploaded_file( $tmp_path, $file_name ) ) {
            chmod( $file_name, 0644 );　//アクセス権限を0644に変更　画像表示権限を与える
            $img = '<img src="'. $file_name . '" >'; //画像表示用HTML
        } else {
            $img = "Error:アップロードできませんでした。"; //Error文字
        }
    }
    // FileUpload [--End--]
}else{
    $img = "画像が送信されていません"; //Error文字
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FileUploadテスト</title>
</head>
<body>
    <?=$img?>
</body>
</html>

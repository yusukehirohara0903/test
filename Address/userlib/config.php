<?php

// データベースアカウント情報の設定
define('DBTYPE', 'mysql');
define('DBUSER', 'mysql_user');
define('DBSERVER', 'localhost');
define('DBPASSWORD', 'himitsu');
define('DBNAME', 'addbook2_db');

// Facebookアクセスで必要な値
define('FB_APP_ID', '795684983869900'); 
define('FB_APP_SECRET', '0ce03493e30f5282cbaaa2efafa8013c'); 

// ディレクトリパス
define('LIBPATH', './userlib/');
define('MODULEPATH', './pagemodule/');
define('TEMPLATESPATH', './template/');
define('COMPILEPATH', './template/compile/');

// 戻り値判定
define('RESFLAG', 0);
define('RESDATA', 1);

// $_SESSIONのキー
define('USER_ID', 'user_id');

// モジュール名
define('DEFAULT_MODULE', 'addlist');
define('ADDDETAIL', 'adddetail');
define('LOGIN', 'login');
define('USERSET', 'user_setting');
define('ADDSET', 'address_setting');
define('ADDSEARCH', 'search');

// オプションのキー
define('ID', 'id');
define('MODULE', 'module');

// $_POSTのキー
define('P_USERID', 'uname');
define('P_USERPASS', 'upass');
define('P_USERSET', 'user_set');
define('P_ADDDETAIL', 'detail');
define('P_ADDID', 'id');
define('P_ADDNEW', 'new');
define('P_ADDSEARCH', 'search');
define('P_ADDEDIT', 'edit');
define('P_ADDDELETE', 'del');
define('P_LOGOUT','logout');

// メッセージ定数
define('LOGINERR', "正しいユーザIDとパスワードを入力してください");
define('USERIDEMPTY', "ユーザIDが空白です");
define('USERIDERR', "ユーザIDが不正です");
define('PASSEMPTY', "パスワードが空白です");
define('PASSSIMEMPTY', "現在のパスワードが空白です");
define('PASSNEWEMPTY', "新規パスワードが空白です");
define('PASSCONFEMPTY', "パスワードの確認が空白です");
define('FBERR', "Facebook情報を取得できません");
define('FBNOTFOUND', " is Not found");
define('GMAPERR', "無効な住所です");
define('NAMEEMPTY', "名前が空白です");
define('READNAMEEMPTY', "ふりがなが空白です");
define('TELREGEX', "電話番号は半角数字で入力してください");
define('TELSUBREGEX', "電話番号（サブ）は半角数字で入力してください");
define('POSTREGEX', "郵便番号は半角数字で入力してください");
define('MAILREGEX', "メールアドレスは半角英数字で入力してください");
define('MAILSUBREGEX', "メールアドレス（サブ）は半角英数字で入力してください");
define('FBAREGEX', "Facebookアカウントは半角英数字で入力してください");
define('PASSREGEX', "新規パスワードは半角英数字で入力してください");
define('NAMEMAX', "名前が長すぎます");
define('READNAMEMAX', "ふりがなが長すぎます");
define('TELMAX', "電話番号が長すぎます");
define('TELSUBMAX', "電話番号（サブ）が長すぎます");
define('MAILMAX', "メールアドレスが長すぎます");
define('MAILSUBMAX', "メールアドレス（サブ）が長すぎます");
define('POSTMAX', "郵便番号が長すぎます");
define('FBAMAX', "Facebookアカウントが長すぎます");
define('NAMELENGTH', "名前は4文字以上、16文字以内で設定してください");
define('PASSLENGTH', "パスワードは4文字以上、16文字以内で設定してください");
define('PASSNEWCOMPARE', "新規パスワードが確認と一致しません");
define('PASSSIMCOMPARE', "既存のパスワードが一致しません");
define('USERCOMPARE', "ユーザ名が一致しません");
define('ADDINSERTOK', "アドレスの新規作成が完了しました");
define('ADDINSERTNG', "アドレスの新規作成ができませんでした");
define('ADDUPDATEOK', "アドレスの編集が完了しました");
define('ADDUPDATENG', "アドレスの編集ができませんでした");
define('USERUPDATEOK', "ユーザ設定の更新が完了しました");
define('USERUPDATENG', "ユーザ設定の更新に失敗しました");
define('DELERR', "アドレスを削除できませんでした");

?>

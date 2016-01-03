<?php

require_once('smarty/libs/Smarty.class.php');

class view {

	
	//コンストラクタ
	
	function __construct() {

		return $this->getSmarty();

	}// 

	
	//Smartyインスタンス作成
	
	function getSmarty(){

		// Smartyインスタンス作成
		$smarty = new Smarty();		
		// Smartyのテンプレートディレクトリ
		$smarty->template_dir = TEMPLATESPATH;
		// Smartyのテンプレートのキャッシュファイル格納先を指定
		$smarty->compile_dir  = COMPILEPATH;
		
		return $smarty;

	}

	
	//リダイレクト処理
	function _redirect($module=null, $id=null){

		$url="index.php";
		if(isset($module)){
			$url.="?module=".$module;
			if(isset($id)){
				$url.="&id=".$id;
			}
		}
		header("Location:".$url);

	}
	
}

?>
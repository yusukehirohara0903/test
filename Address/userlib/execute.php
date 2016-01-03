<?php

class execute{

	// プロパティ
	var $_db;

	
	//コンストラクタ
	
	function __construct(){

		// セッションの開始
		session_start();

	}

	
	//値によって、各ページのモジュールを実行する
	
	function main(){

		// ログアウトの場合の処理
		$this->logout();

		// $_GETに値があるかを確認
		$this->checkGet();
		
		// $_GET[MODULE]の名前のインスタンス作成し、そのメイン関数実行
		$page_module = new $_GET[MODULE]();
		$page_module->main();

	}

	
	//$_GETに値がなかった場合の処理
	
	function checkGet(){

		// セッションID値があるとき
		if( !empty($_SESSION[USER_ID])){
			// $_GET[MODULE]に値がないとき
			if(empty($_GET[MODULE])){	
				// デフォルトモジュールへ移動する設定
				$_GET[MODULE] = DEFAULT_MODULE;
			}
		// セッションID値をもたない
		} else {
			// loginへ移動する
			$_GET[MODULE] = LOGIN;
		}
		// $_GET[MODULE]の名前に格納されている値のインスタンス作成
		require_once( MODULEPATH.'/'.$_GET[MODULE].'.php' );

	}

	
	//既存のセッションを消去し、ログイン画面への遷移設定を行う
	
	function scClearToLogin(){

		$_SESSION = array();

	}


	
	//ログアウトのときの処理
	
	function logout(){

		if(!empty($_POST[P_LOGOUT])){
			$this->scClearToLogin();
			$_POST = NULL;
		}

	}

}

?>
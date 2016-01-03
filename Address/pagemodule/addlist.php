<?php

require_once(LIBPATH.'address.php');

class addlist extends view {

	var $smarty;

	
	//コンストラクタ
	
	function __construct(){

		// smartyインスタンスの作成
		$this->smarty = parent::__construct();

	}

	
	//アドレス一覧表示
	
	function main(){

		
		// 詳細ボタンが押された場合
		if (isset($_POST[P_ADDDETAIL])){
			// アドレス帳詳細ページに移動
			$this->_redirect(ADDDETAIL, $_POST[P_ADDID]);
		}

		// アドレス新規作成ボタンが押された場合
		if (isset( $_POST[P_ADDNEW]) ){
			// アドレス帳一覧ページに移動
			$this->_redirect(ADDSET);
		}

		// アドレス検索ボタンが押された場合
		if (isset( $_POST[P_ADDSEARCH]) ){
			// アドレス帳一覧ページに移動
			$this->_redirect(ADDSEARCH);
		}
		
		// ユーザ設定ボタンが押された場合
		if (isset( $_POST[P_USERSET]) ){
			// アドレス帳一覧ページに移動
			$this->_redirect(USERSET);
		}

		// アドレス一覧を取得
		$add_ins = new AddressOperation;
		$addlist_res = $add_ins->getAddlist();

		// アドレス一覧が取得できた場合
		if ($addlist_res[RESFLAG] == TRUE){
			// テンプレートにアドレス情報の割り当て
			$this->smarty->assign('res', $addlist_res[RESDATA]);
			// テンプレート適用
			$this->smarty->display('addlist.html');

		// アドレス一覧が取得できなかった場合（項目名だけ表示）
		} else {
			// テンプレート適用
			$this->smarty->display('addlist.html');
		}
		// データベース切断
		$add_ins->dbend();

	}

}

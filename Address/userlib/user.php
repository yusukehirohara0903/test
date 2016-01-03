<?php

class UserOperation extends DataOperation {


	
	//コンストラクタ
	
	function __construct() {

		parent::__construct();

	}

	
	// ログインを確認する
	
	function userlogin ($user , $pass) {


		// ログインデータ格納
		$data = array ($user , $pass);

		$mdb2 = $this->_db;

		// SQL実行の準備
		$sql = "SELECT * FROM user_tbl WHERE user_c = ? and pass_c = ? ";
		$sth = $mdb2->prepare($sql, array('text', 'text'));
		// prepareエラーチェック
		if (MDB2::isError($sth)) die("prepare エラー: ".$sth->getMessage());
		// SQLの実行結果の返却
		$result = $sth->execute($data);

		// 行が存在した場合はログイン成功
		if ($result->numRows() > 0){
			return $this->resReturn(TRUE, $result->fetchRow());
		}else{
			return $this->resReturn(FALSE);
		}


	}


	
	//ユーザ名を確認する
	
	function userCheck($user){


		// ユーザデータ格納
		$data = array ($user);
		$mdb2 = $this->_db;
		
		// SQL実行の準備
		$sql = "SELECT user_c FROM user_tbl WHERE user_c = ? ";
		$sth = $mdb2->prepare($sql, array('text'));
		// prepareエラーチェック
		if (MDB2::isError($sth)) die("prepare エラー: ".$sth->getMessage());
		// SQLの実行結果の返却
		$result = $sth->execute($data);
		
		// 行が存在した場合はOK
		if ($result->numRows() > 0){
			return $this->resReturn(TRUE);
		}else{
			return $this->resReturn(FALSE);
		}


	}

	

	
	//パスワードを確認する
	function passCheck($pass){


		// ユーザデータ格納
		$data = array ($pass);
		$mdb2 = $this->_db;
		
		// SQL実行の準備
		$sql = "SELECT pass_c FROM user_tbl WHERE pass_c = ? ";
		$sth = $mdb2->prepare($sql, array('text'));
		// prepareエラーチェック
		if (MDB2::isError($sth)) die("prepare エラー: ".$sth->getMessage());
		// SQLの実行結果の返却
		$result = $sth->execute($data);
		
		// 行が存在した場合はTRUE
		if ($result->numRows() > 0){
			return $this->resReturn(TRUE);
		}else{
			return $this->resReturn(FALSE);
		}


	}

	

	
	//ユーザ設定アップデート
	
	function userUpdate($user, $pass, $sessionUser){


		// ユーザデータ格納
		$data = array ( $user, $pass, $sessionUser);
		$mdb2 = $this->_db;
		
		// SQL実行の準備
		$sql = "UPDATE user_tbl SET user_c = ? , pass_c = ? WHERE user_c = ? ";
		$sth = $mdb2->prepare($sql, array('text', 'text', 'text'));
		// prepareエラーチェック
		if (MDB2::isError($sth)) die("prepare エラー: ".$sth->getMessage());
		// SQLの実行結果の返却
		$result = $sth->execute($data);
		
		// UPDATEが完了した場合TRUE
		if (MDB2::isError($result)){
			return $this->resReturn(FALSE);
		}else{
			return $this->resReturn(TRUE);
		}


	}

	

	
	//データベース接続の解除
		

	function dbend () {


		$this->dbclose();


	}

}

?>
<?php

//アドレスデータ操作モジュール
 
class AddressOperation extends DataOperation {


	
	//コンストラクタ
	
	function __construct() {
		parent::__construct();

	}

	
	//アドレスの一覧を取得する
	
	function getAddlist () {


		$mdb2 = $this->_db;

		// SQL実行の準備
		$sql = "SELECT id, Name_c, ReadName_c, Tel_c, Mail_c FROM address_tbl";
		$sth = $this->_db->prepare($sql);
		// prepareエラーチェック
		if (MDB2::isError($sth)) die("prepare エラー: ".$sth->getMessage());
		// SQLの実行結果の返却
		$result = $sth->execute();

		// 行が存在した場合は取得成功
		if ($result->numRows() > 0){
			// 取得データをソートする
			$res = $this->datasort($result->fetchAll());
			// 結果を戻す
			return $this->resReturn(TRUE, $res);
		}else{
			return $this->resReturn(FALSE);
		}


	}


	
	// アドレスを取得する
	
	function getAdddetail ($addid) {


		// SQL実行の準備
		$sql = "SELECT * FROM address_tbl WHERE id = ?";
		$sth = $this->_db->prepare($sql);
		// prepareエラーチェック
		if (MDB2::isError($sth)) die("prepare エラー: ".$sth->getMessage());
		// SQLの実行結果の返却
		$result = $sth->execute($addid);

		// 行が存在した場合は取得成功
		if ($result->numRows() > 0){
			return $this->resReturn(TRUE, $result->fetchRow());
		}else{
			return $this->resReturn(FALSE);
		}


	}// 


	
	//新規アドレスの登録
	
	function addressInsert($name_c, $readname_c, $tel_c, $tel_sub_c, $mail_c, $mail_sub_c, 
							$postcode_c, $add_c, $building_c, $fb_c ){


		// ユーザデータ格納
		$data = array ($name_c, $readname_c, $tel_c, $tel_sub_c, $mail_c, $mail_sub_c, $postcode_c, $add_c, $building_c, $fb_c);
		
		// SQL実行の準備
		$sql = "INSERT INTO address_tbl (Name_c, ReadName_c, Tel_c, Tel_Sub_c, Mail_c, Mail_Sub_c, PostCode_c, Add_c, Building_c, Fb_c) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$sth = $this->_db->prepare($sql, array('text','text','text','text','text','text','text','text','text','text'));
		// prepareエラーチェック
		if (MDB2::isError($sth)) die("prepare エラー: ".$sth->getMessage());
		// SQLの実行結果の返却
		$result = $sth->execute($data);
		
		// INSERTが成功した場合TRUE
		if (MDB2::isError($result)){
			return $this->resReturn(FALSE);
		}else{
			return $this->resReturn(TRUE);
		}


	}

	

	
	//アドレスの更新
	
	function addressUpdate($id, $name_c, $readname_c, $tel_c, $tel_sub_c, $mail_c, $mail_sub_c, 
							$postcode_c, $add_c, $building_c, $fb_c ){


		// ユーザデータ格納
		$data = array ($name_c, $readname_c, $tel_c, $tel_sub_c, $mail_c, $mail_sub_c, $postcode_c, $add_c, $building_c, $fb_c, $id);
		// SQL実行の準備
		$sql = "UPDATE address_tbl SET Name_c = ? , ReadName_c = ? , Tel_c = ? , Tel_Sub_c = ? , Mail_c = ? , Mail_Sub_c = ? , PostCode_c = ? , Add_c = ? ,Building_c = ?,  Fb_c = ? WHERE id = ? ";
		$sth = $this->_db->prepare($sql, array('text', 'text', 'text', 'text', 'text', 'text', 'text', 'text', 'text', 'text', 'integer'));
		// prepareエラーチェック
		if (MDB2::isError($sth)) die("prepare エラー: ".$sth->getMessage());
		// SQLの実行結果の返却
		$result = $sth->execute($data);

		// UPDATEが成功した場合TRUE
		if (MDB2::isError($result)){
			return $this->resReturn(FALSE);
		}else{
			return $this->resReturn(TRUE);
		}
	}
	
	
	//アドレスの検索
	
	function searchAddress ($name_c) {

		// ログインデータ格納
		$data = array ('%'.$name_c.'%');

		$mdb2 = $this->_db;

		// SQL実行の準備
		$sql = "SELECT id, Name_c FROM address_tbl WHERE Name_c LIKE ? ";
		$sth = $mdb2->prepare($sql, array('text'));
		// prepareエラーチェック
		if (MDB2::isError($sth)) die("prepare エラー: ".$sth->getMessage());
		// SQLの実行結果の返却
		$result = $sth->execute($data);

		// 行が存在した場合は取得成功
		if ($result->numRows() > 0){
			return $this->resReturn(TRUE, $result->fetchAll());
		}else{
			return $this->resReturn(FALSE);
		}

	}

	
	//アドレスの削除
	
	function deleteAddress($id) {

		// ログインデータ格納
		$data = array($id);

		$mdb2 = $this->_db;
		// SQL実行の準備
		$sql = "DELETE FROM address_tbl WHERE id = ? ";
		$sth = $mdb2->prepare($sql, array('text'));

		// prepareエラーチェック
		if (MDB2::isError($sth)) die("prepare エラー: ".$sth->getMessage());
		// SQLの実行結果の返却
		$result = $sth->execute($data);
		// DELETEが成功した場合TRUE

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

	
	//ソート
		

	function datasort ($data) {

		// データをソートする

		foreach ((array)$data as $key=>$value) {
			$data_res[$key] = mb_convert_kana($value['readname_c'], "cH", "UTF-8");
		}
		array_multisort($data_res, SORT_ASC, $data);
		
		// ソート結果を返却
		return $data;


	}

}

?>

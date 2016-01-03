<?php

class adddetail extends view {

	var $smarty;

	
	//コンストラクタ

	function __construct(){

		// smartyインスタンスの作成
		$this->smarty = parent::__construct();

	}

	
	//アドレスの詳細を表示
	
	function main(){

		$addid = $_GET[ID];
		// GETにidがあるか
		if (isset($addid)) {

			// address.phpの読み込み
			require_once(LIBPATH.'address.php');
			// AddressOperationインスタンスの作成
			$add_ins = new AddressOperation;

			// アドレス削除ボタンが押された場合
			if (isset( $_POST[P_ADDDELETE]) ){
				if($_POST[judge]==1)
				{
					// アドレス削除処理
					$del_res = $add_ins->deleteAddress($_POST[P_ADDID]);
					if ($del_res[RESFLAG] == TRUE ) {
						$add_ins->dbend();
						// アドレス一覧ページに移動
						$this->_redirect(DEFAULT_MODULE);
					} else {
						echo "<span style=\"color:#FF0000\">".DELERR."</span><br>"; 
					}
				}
			}

			// アドレス編集ボタンが押された場合
			if (isset( $_POST[P_ADDEDIT]) ){
				// アドレス編集ページに移動
				$this->_redirect(ADDSET, $_POST[P_ADDID]);
			}

			// アドレスの詳細を取得
			$add_res = $add_ins->getAdddetail($addid);
			if ($add_res[RESFLAG] == TRUE){
				// データベース接続を解除
				$add_ins->dbend();

			
				// Facebook情報取得
				$fb_flag = FALSE;
				if ( isset( $add_res[RESDATA]['fb_c'] ) ){
					require_once( LIBPATH.'fb.php' );
					// Facebook_Accessインスタンス作成
					$fb_ins = new Facebook_Access;
					// アドレスのFacebook情報取得
					$fb_res = $fb_ins->getFbProfile ($add_res[RESDATA]['fb_c']);
					if ($fb_res[RESFLAG] == TRUE) {
						// アドレスのFacebookページが存在するか
						if ($fb_res[RESDATA]['link'] != NULL) {
							// テンプレートにFacebook情報の割り当て
							$this->smarty->assign('fb_res', $fb_res[RESDATA]);
							$fb_flag = TRUE;
						} else {
							echo "<span style=\"color:#FF0000\">".FBERR."（".$add_res[RESDATA]['fb_c'].FBNOTFOUND."）"."</span><br>";
						}
					} else {
						echo "<span style=\"color:#FF0000\">".FBERR."（".$fb_res[RESDATA]."）"."</span><br>";
					}
				}
				
				// Googleマップ情報取得
				$g_flag = FALSE;
				if (isset( $add_res[RESDATA]['add_c'])) {
					require_once( LIBPATH.'gmap.php' );
					// GoogleMapsApiOperationインスタンス作成
					$gmap_ins = new GoogleMapsApiOperation;
					// アドレスからGoogleマップ情報取得
					$gmap_res = $gmap_ins->getGmaps ($add_res[RESDATA]['postcode_c'], $add_res[RESDATA]['add_c'], $add_res[RESDATA]['building_c']);
					if ($gmap_res[RESFLAG] == TRUE) {
						// テンプレートにGoogleマップ情報の割り当て
						$this->smarty->assign('gmap_res', $gmap_res[RESDATA]);
						$g_flag = TRUE;
					} else {
						echo "<span style=\"color:#FF0000\">".GMAPERR."</span><br>";
					}
				}

				// テンプレートにアドレスIDの割り当て
				$this->smarty->assign('add_id', $addid);
				// テンプレートにアドレス情報の割り当て
				$this->smarty->assign('add_res', $add_res[RESDATA]);

				// テンプレートに画面表示用フラグ情報の割り当て
				$this->smarty->assign('fb_flag', $fb_flag);
				$this->smarty->assign('g_flag', $g_flag);

				// テンプレート適用
				$this->smarty->display('adddetail.html');
			}
		}

	}

}

?>
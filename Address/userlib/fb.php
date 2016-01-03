<?php

require_once ('facebook/facebook.php');


class Facebook_Access extends DataOperation {

var $facebook;

	
	//コンストラクタ
	function __construct () {

		parent::__construct('Facebook');
		// FacebookAPIに接続
		$this->fbConnect ();

	}

	
	// FacebookAPIに接続
	
	function fbConnect () {

		try {
			// Facebookインスタンスの作成
			$this->facebook = new Facebook(
				array(
					'appId'  => FB_APP_ID,
					'secret' => FB_APP_SECRET,
				)
			);
		} catch (FacebookApiException $err) {
			return $this->resReturn (FALSE, $err->getMessage());
		}

	}

	
	//選択したアドレスのユーザプロフィールを取得する
	
	function getFbProfile ( $FbID ) {

		try {
			// 指定ユーザのFacebookアカウント情報を取得
			$result = $this->facebook->api('/'.$FbID);
			
			// Facebookでユーザーネームが設定されている場合
			if(isset($result['username'])){
				$userid = $result['username'];
			// Facebookでユーザーネームが設定されていない場合
			} else {
				$userid = $result['id'];
			}
			
			// 必要な情報を格納
			$res = array (
				'id'   => $userid,
				'name' => $result['name'],
				'link' => $result['link'],
				'img'  => "https://graph.facebook.com/".$userid."/picture",
			);
			
			// 結果を戻す
			return $this->resReturn (TRUE, $res);
		} catch (FacebookApiException $err) {
			return $this->resReturn (FALSE, $err->getMessage());
		}

	}

}

?>
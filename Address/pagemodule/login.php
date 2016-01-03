<?php

require_once ('HTML/QuickForm2.php');
require_once ('HTML/QuickForm2/Renderer.php');


class login extends view {

	var $smarty;

	
	//コンストラクタ
	
	function __construct(){

		// smartyインスタンスの作成
		$this->smarty = parent::__construct();

	}

	
	//ログイン許可処理
	
	function main(){

		// Quickform2インスタンス作成
		$form = new HTML_Quickform2('qform_smarty', 'POST', 
			array ('action' => 'index.php'));
		
		// Form要素の構築
		$uname = $form->addElement('text', 'uname',
			array('style' => 'width: 100px;'),
			array('label' => "ユーザＩＤ："));
		$upass = $form->addElement('password', 'upass',
			array('style' => 'width: 100px;'),
			array('label' => "パスワード："));
		$button = $form->addElement('submit', 'send',
			array('value' => "ログイン"));

		// パラメータのルールを設定
		$uname->addRule('required', USERIDEMPTY);
		$upass->addRule('required', PASSEMPTY);
		$uname->addRule('regex', USERIDERR, '/^[ -~]+$/');

		// フィルタの設定
		// name に htmlspecialchars関数を適用する
		$uname->addFilter('htmlspecialchars');
		// 全要素にtrim関数を適用する
		$form->addRecursiveFilter('trim');

		// フォームの出力or入力後処理
		if ($form->validate()) {
			// ユーザIDとパスワードが両方入力されたとき
			if((isset( $_POST[P_USERID] )) &&  (isset( $_POST[P_USERPASS] ))){
				// user.phpの読み込み
				require_once(LIBPATH.'user.php');
				// UserOperationインスタンスの作成
				$usr_ins = new UserOperation;
				// ログイン判定・ユーザ情報の取得
				$res = $usr_ins->userlogin($_POST[P_USERID], $_POST[P_USERPASS]);

				// データの取得に成功した場合
				if ($res[RESFLAG] == TRUE){
					// データベース切断
					$usr_ins->dbend();

					// セッションに値がない場合
					if (empty( $_SESSION[USER_ID])) {
						// セッション作成
						$_SESSION[USER_ID] = $res[RESDATA]['user_c'];
					}
					
					// SESSIONにユーザIDがあれば、アドレス帳一覧ページに移動
					if ( !empty( $_SESSION[USER_ID]) ){
						// アドレス帳一覧ページに移動
						$this->_redirect(DEFAULT_MODULE);
					}

				// データの取得に失敗したとき
				} else {
					echo "<span style=\"color:#FF0000\">".LOGINERR."</span>";
					// データベース切断
					$usr_ins->dbend();
				}
				$this->createForm($form);
			}
		} else {
			$this->createForm($form);
		}

	}
	
	
	//フォームの表示
	
	function createForm($form){
			
		HTML_QuickForm2_Renderer::register('smarty', 'HTML_QuickForm2_Renderer_Smarty');
        $renderer = HTML_QuickForm2_Renderer::factory('smarty');
        $renderer->setOption('old_compat', true);
        $renderer->setOption('group_errors', true);
        
		// フォームの作成
        $FormData = $form->render($renderer)->toArray();
        $this->smarty->assign('form', $FormData);
        $this->smarty->display('login.html'); 

	}

}

?>

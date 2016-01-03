<?php

require_once ('HTML/QuickForm2.php');
require_once ('HTML/QuickForm2/Renderer.php');
require_once(LIBPATH.'user.php');

class user_setting extends view {

	var $smarty;

	
	//コンストラクタ
	
	function __construct(){

		// smartyインスタンスの作成
		$this->smarty = parent::__construct();

	}

	function main() {

		// Quickform2インスタンス作成
		$form = new HTML_Quickform2('qform_smarty', 'POST', 
					array ('action' => 'index.php?module=user_setting'));

		// ユーザDBインスタンス作成
		$obj = new UserOperation;

		// 登録済みユーザ名取得;
		// DBにユーザ名があるかチェック
		$uchk = $obj->userCheck($_SESSION[USER_ID]);
		if ($uchk[RESFLAG] == FALSE){
			echo (USERCOMPARE);
			// データベース接続を解除
			$obj->dbend();
			$userflag = FALSE;
			$this->smarty->assign('userflag', $userflag);
			$this->smarty->display('user_setting.html');
			exit();
		} else {
			$userflag = TRUE;
		}

		// Form要素の構築
		// text 要素を追加
		$name = $form->addElement('text', 'name',
				array('style' => 'width: 150px;'),
				array('label' => "名前："));
		
		// 入力値がない場合、初期値を設定
		if($name->getValue() == "")
		{
			$name->setValue($_SESSION[USER_ID]);
		}

		// password 要素を追加
		$pass_sim = $form->addElement('password', 'pass_sim',
			array('style' => 'width: 150px;'),
			array('label' => "現在のパスワード："));
		$pass = $form->addElement('password', 'pass',
			array('style' => 'width: 150px;'),
			array('label' => "新規パスワード："));
		$pass_conf = $form->addElement('password', 'pass_conf',
			array('style' => 'width: 150px;'),
			array('label' => "パスワードの確認："));

		// ボタンのグループを作成・追加
		$buttonGroup = $form->addElement('group', 'buttons');
		$buttonGroup->addElement('submit', 'send',
			array('value' => "登録"));
		$buttonGroup->addElement('reset', 'reset',
			array('value' => "リセット"));

		// パラメータのルールを設定
		// 値が空かチェック
		$name->addRule('required', NAMEEMPTY);
		$pass_sim->addRule('required', PASSSIMEMPTY);
		$pass->addRule('required', PASSNEWEMPTY);
		$pass_conf->addRule('required', PASSCONFEMPTY);
		// パスワードが不正でないか(半角英数かどうか)チェック
		$pass->addRule('regex', PASSREGEX, '/^[ -~]+$/');
		// 長さチェック
		$name->addRule('length', NAMELENGTH, array(4,16)); 
		$pass->addRule('length', PASSLENGTH, array(4,16));
		// 2つの値が同じかどうかチェック
		$pass->addRule('compare', PASSNEWCOMPARE, 

			array('operator' => '==', 'operand' => $pass_conf));

		// フィルタの設定
		// name に htmlspecialchars関数を適用する
		$name->addFilter('htmlspecialchars');
		// 全要素にtrim関数を適用する
		$form->addRecursiveFilter('trim');

		// フォームの出力or入力後処理
		if ($form->validate()) {
			// 既存のパスワード確認処理
			$passc = $obj->passCheck($pass_sim->getValue());
			if($passc[RESFLAG] == TRUE){
				// ユーザ情報更新
				$update = $obj->userUpdate($name->getValue(), $pass->getValue(), $_SESSION[USER_ID]);
				if($update[RESFLAG] == TRUE){
					// sessionに新規ユーザIDを代入
					$_SESSION[USER_ID] = $name->getValue();
					echo USERUPDATEOK;
				} else {
					echo "<span style=\"color:#FF0000\">".USERUPDATENG."</span>";
				}
			} else {
				echo "<span style=\"color:#FF0000\">".PASSSIMCOMPARE."</span>";
			}
			$this->createForm($form, $userflag);
		} else {
			$this->createForm($form, $userflag);
		}
		// データベース接続を解除
		$obj->dbend();

	}

	
	//フォームの表示
	
	function createForm($form, $userflag){

		HTML_QuickForm2_Renderer::register('smarty', 'HTML_QuickForm2_Renderer_Smarty');
		$renderer = HTML_QuickForm2_Renderer::factory('smarty');
		$renderer->setOption(array('required_note' => "<em>*</em> 記入必須項目"));
		$renderer->setOption('old_compat', true);
		$renderer->setOption('group_errors', true);

		// フォームの作成
		$FormData = $form->render($renderer)->toArray();
		$this->smarty->assign('userflag', $userflag);
		$this->smarty->assign('form', $FormData);
		$this->smarty->display('user_setting.html'); 

	}

}

?>

<?php

require_once ('HTML/QuickForm2.php');
require_once ('HTML/QuickForm2/Renderer.php');
require_once(LIBPATH.'address.php');

class address_setting extends view {

	var $smarty;

	
	//コンストラクタ

	function __construct(){

		// smartyインスタンスの作成
		$this->smarty = parent::__construct();

	}

	function main() {

		// idの取得
		$id = $_GET[ID];

		// インスタンスの作成
		$form = new HTML_Quickform2('qform_smarty', 'POST',
			array ('action' => 'index.php?module=address_setting'));

		// Form要素の構築
		// hidden 要素を追加
		$id_form = $form->addElement('hidden', 'action');

		// text 要素を追加
		$name_c = $form->addElement('text', 'name_c',
			array('style' => 'width: 200px;'),
			array('label' => "名前："));
		$readname_c = $form->addElement('text', 'readname_c',
			array('style' => 'width: 200px;'),
			array('label' => "ふりがな："));
		$tel_c = $form->addElement('text', 'tel_c',
			array('style' => 'width: 200px;'),
			array('label' => "電話番号："));
		$tel_sub_c = $form->addElement('text', 'tel_sub_c',
			array('style' => 'width: 200px;'),
			array('label' => "電話番号（サブ）："));
		$mail_c = $form->addElement('text', 'mail_c',
			array('style' => 'width: 200px;'),
			array('label' => "メールアドレス："));
		$mail_sub_c = $form->addElement('text', 'mail_sub_c',
			array('style' => 'width: 200px;'),
			array('label' => "メールアドレス（サブ）："));
		$postcode_c = $form->addElement('text', 'postcode_c',
			array('style' => 'width: 100px;'),
			array('label' => "郵便番号："));
		$add_c = $form->addElement('text', 'add_c',
			array('style' => 'width: 300px;'),
			array('label' => "住所："));
		$building_c = $form->addElement('text', 'building_c',
			array('style' => 'width: 300px;'),
			array('label' => "建物名："));
		$fb_c = $form->addElement('text', 'fb_c',
			array('style' => 'width: 200px;'),
			array('label' => "facebookアカウント："));

		// ボタンのグループを作成・追加
		$buttonGroup = $form->addElement('group', 'buttons');
		$buttonGroup->addElement('submit', 'send',
			array('value' => "登録") );
		$buttonGroup->addElement('reset', 'reset',
			array('value' => "キャンセル"));

		// AddressOperationインスタンスの作成
		$obj = new AddressOperation;

		// idがある場合、初期値を取得
		if(!empty($id)){
			$res = $obj->getAdddetail($id);
			if ($res[RESFLAG] == TRUE){
				// アドレス詳細情報
				$add_data = array ( 
					'name_c'     => $res[RESDATA]['name_c'],
					'readname_c' => $res[RESDATA]['readname_c'],
					'tel_c'      => $res[RESDATA]['tel_c'],
					'tel_sub_c'  => $res[RESDATA]['tel_sub_c'],
					'mail_c'     => $res[RESDATA]['mail_c'],
					'mail_sub_c' => $res[RESDATA]['mail_sub_c'],
					'postcode_c' => $res[RESDATA]['postcode_c'],
					'add_c'      => $res[RESDATA]['add_c'],
					'building_c' => $res[RESDATA]['building_c'],
					'fb_c'       => $res[RESDATA]['fb_c'],
				);

				// 初期値を代入
				$id_form->setValue($id);
				if(!empty($add_data['name_c']))
					$name_c->setValue($add_data['name_c']);
				if(!empty($add_data['readname_c']))
					$readname_c->setValue($add_data['readname_c']);
				if(!empty($add_data['tel_c']))
					$tel_c->setValue($add_data['tel_c']);
				if(!empty($add_data['tel_sub_c']))
					$tel_sub_c->setValue($add_data['tel_sub_c']);
				if(!empty($add_data['mail_c']))
					$mail_c->setValue($add_data['mail_c']);
				if(!empty($add_data['mail_sub_c']))
					$mail_sub_c->setValue($add_data['mail_sub_c']);
				if(!empty($add_data['postcode_c']))
					$postcode_c->setValue($add_data['postcode_c']);
				if(!empty($add_data['add_c']))
					$add_c->setValue($add_data['add_c']);
				if(!empty($add_data['building_c']))
					$building_c->setValue($add_data['building_c']);
				if($add_data['fb_c'] != "")	
					$fb_c->setValue($add_data['fb_c']);
			}

			// テンプレートにタイトルを割り当て
			$this->smarty->assign('title', "アドレス帳 ～アドレス編集画面～");
			$this->smarty->assign('h1', "アドレス編集");
			$this->smarty->assign('id', $id);
			// データベース接続を解除
			$obj->dbend();
		} else {
			// テンプレートにタイトルを割り当て
			$this->smarty->assign('title', "アドレス帳 ～アドレス登録画面～");
			$this->smarty->assign('h1', "アドレス登録");
		}

		// パラメータのルールを設定
		// 値が空かチェック
		$name_c->addRule('required', NAMEEMPTY);
		$readname_c->addRule('required', READNAMEEMPTY);
		// 値が正しいかチェック
		$tel_c->addRule('regex', TELREGEX, '/^[0-9]+$/');
		$tel_sub_c->addRule('regex', TELSUBREGEX, '/^[0-9]+$/');
		$postcode_c->addRule('regex', POSTREGEX, '/^[0-9]+$/');
		$mail_c->addRule('regex', MAILREGEX, '/^[ -~]+$/');
		$mail_sub_c->addRule('regex', MAILSUBREGEX, '/^[ -~]+$/');
		$fb_c->addRule('regex', FBAREGEX, '/^[ -~]+$/');
		// 長さチェック
		$name_c->addRule('maxlength', NAMEMAX, 125);
		$readname_c->addRule('maxlength', READNAMEMAX, 255);
		$tel_c->addRule('maxlength', TELMAX, 11);
		$tel_sub_c->addRule('maxlength', TELSUBMAX, 11);
		$mail_c->addRule('maxlength', MAILMAX, 255);
		$mail_sub_c->addRule('maxlength', MAILSUBMAX, 255);
		$postcode_c->addRule('maxlength', POSTMAX, 7);
		$name_c->addRule('maxlength', FBAMAX, 100);

		// フィルタの設定
		$name_c->addFilter('htmlspecialchars');
		$readname_c->addFilter('htmlspecialchars');
		$mail_c->addFilter('htmlspecialchars');
		$mail_sub_c->addFilter('htmlspecialchars');
		$add_c->addFilter('htmlspecialchars');
		$building_c->addFilter('htmlspecialchars');
		$fb_c->addFilter('htmlspecialchars');
		// 全要素にtrim関数を適用する
		$form->addRecursiveFilter('trim');

		// フォームの出力or入力後処理
		if ($form->validate()) {
			if($id_form->getValue() == ""){
				$ares = $obj->addressInsert($name_c->getValue(), $readname_c->getValue(),
											$tel_c->getValue(), $tel_sub_c->getValue(),
											$mail_c->getValue(),$mail_sub_c->getValue(),
											$postcode_c->getValue(), $add_c->getValue(),
											$building_c->getValue(), $fb_c->getValue());
				// Insertできたか
				if($ares[RESFLAG] == TRUE)
				{
					echo ADDINSERTOK;
					// 連続投稿禁止用フラグ
					$this->smarty->assign('insertflag', TRUE);
				} else {
					echo "<span style=\"color:#FF0000\">".ADDINSERTNG."</span>";
				}
			} else {
				$ares = $obj->addressUpdate($id_form->getValue(), $name_c->getValue(),
											$readname_c->getValue(), $tel_c->getValue(),
											$tel_sub_c->getValue(), $mail_c->getValue(),
											$mail_sub_c->getValue(), $postcode_c->getValue(),
											$add_c->getValue(), $building_c->getValue(),
											$fb_c->getValue());
				// Updateできたか
				if($ares[RESFLAG] == TRUE)
				{
					$this->smarty->assign('id', $id_form->getValue());
					echo ADDUPDATEOK;
				} else {
					$this->smarty->assign('id', $id_form->getValue());
					echo "<span style=\"color:#FF0000\">".ADDUPDATENG."</span>";
				}
			}
			$this->createForm($form);
		} else {
			$this->createForm($form);
		}
		// データベース接続を解除
		$obj->dbend();

	}

	
	// フォームの表示
	
	function createForm($form){

		HTML_QuickForm2_Renderer::register('smarty', 'HTML_QuickForm2_Renderer_Smarty');
		$renderer = HTML_QuickForm2_Renderer::factory('smarty');
		$renderer->setOption(array('required_note' => "<em>*</em> 記入必須項目"));
		$renderer->setOption('old_compat', true);
		$renderer->setOption('group_errors', true);

		// フォームの作成
		$FormData = $form->render($renderer)->toArray();
		$this->smarty->assign('form', $FormData);
		$this->smarty->display('address_setting.html');

	}

}

?>

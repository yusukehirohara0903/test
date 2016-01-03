<?php

require_once ('HTML/QuickForm2.php');
require_once ('HTML/QuickForm2/Renderer.php');
require_once(LIBPATH.'address.php');

class search extends view {
	
	
	//コンストラクタ
	
	function __construct(){

		// smartyインスタンスの作成
		$this->smarty = parent::__construct();

	}

	function main() {

		// QuickForm2インスタンス作成
		$form = new HTML_Quickform2('qform_smarty', 'POST',
				array ('action' => 'index.php?module=search'));
		
		// Form要素の構築
		// text 要素を追加
		$search = $form->addElement('text', 'search',
				array('style' => 'width: 100px;'),
				array('label' => "検索："));

		if($_GET[ADDSEARCH] != ""){
			$search->setValue($_GET[ADDSEARCH]);
		}

		// ボタンのグループを作成・追加
		$buttonGroup = $form->addElement('group', 'buttons');
		$buttonGroup->addElement('submit', 'send',
				array('value' => "検索"));

		// フィルタの設定
		// name に htmlspecialchars関数を適用する
		$search->addFilter('htmlspecialchars');
		// 全要素にtrim関数を適用する
		$form->addRecursiveFilter('trim');
		
		// フォームの出力or入力後処理
		if ($form->validate()) {
			// AddressOperationインスタンスの作成
			$obj = new AddressOperation;
			// 検索
			$data = $obj->searchAddress($search->getValue());

			// データを取得できたか
			if($data[RESFLAG] == TRUE){
				if(count($data[RESDATA]) != 0){
					foreach($data[1] as $num => $value){
						$add_data[$num] = array('id' => $value[id], 'name_c' => $value[name_c]);
					}
					// フォームと取得したデータを作成
					$this->createForm($form, $add_data);
				} else {
					$this->createForm($form);
				}
			} else {
				$this->createForm($form);
			}
			// データベース接続を解除
			$obj->dbend();
		} else {
			$this->createForm($form);
		}

	}
	
	
	//フォームの表示
	
	function createForm($form, $add_data=NULL){

		// smartyインスタンス作成
		$smarty = $this->getSmarty();
			
		HTML_QuickForm2_Renderer::register('smarty', 'HTML_QuickForm2_Renderer_Smarty');
		$renderer = HTML_QuickForm2_Renderer::factory('smarty');
		$renderer->setOption('old_compat', true);

		// フォームの作成
		$FormData = $form->render($renderer)->toArray();
		$smarty->assign('data', $add_data);
		$smarty->assign('form', $FormData);
		$smarty->display('search.html');

	}

}

?>

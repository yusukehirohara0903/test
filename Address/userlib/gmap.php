<?php


require_once('gmaps/GoogleMap.php');
require_once('gmaps/JSMin.php');


class GoogleMapsApiOperation extends DataOperation {


	var $gmap;


	
	//コンストラクタ
	
	function __construct() {


		// GoogleMapAPIインスタンスの作成
		parent::__construct('GoogleMap');

		// Googleマップの使用準備
		$this->gmapPrepare();


	}


	
	//Googleマップの使用準備
	
	function gmapPrepare() {


		// GoogleMapAPIインスタンスの作成
		$this->gmap = new GoogleMapAPI();

		// Googleマップ設定
		$this->gmap->_minify_js = isset($_REQUEST['min'])?FALSE:TRUE;
		$this->gmap->setDSN($this->sqltype.'://'.$this->user.':'.$this->password.'@'.$this->server.'/'.$this->dbname.'?charset=utf8');


	}

	
	// Googleマップ情報の取得
	
	function getGmaps ($postcode=null, $address=null, $building=null) {


		// マーカー表示用住所作成

		if(isset($postcode)){
			$addall = "〒".$postcode;
			$addall .= "_".$address;

			if(isset($building)){
				$addall .= "_".$building;
			}
		} else {

			$addall = $address;

			if(isset($building)){
				$addall .= "_".$building;
			}

		}


		// 位置情報が取得できるか

		$geocode = $this->gmap->getGeoCode($address);

		if (!empty($geocode)) {

			// 作成するGoogleマップの情報を入力
			$this->gmap->addMarkerByAddress( $address, $addall );

			// GoogleマップJavaScript作成

			echo $this->gmap->getHeaderJS();
			echo $this->gmap->getMapJS();

			// 結果を戻す

			return $this->resReturn ( TRUE, $this->gmap );

		} else {

			return $this->resReturn ( FALSE );

		}


	}

}

?>


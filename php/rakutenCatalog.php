<?php
	function getCategory() {
		$categoryArray = array("本", "マーチン", "柴田望洋", "電子部品",  "chuck berry", "Beatles", "Java");
		$selectNo = rand(0, sizeof($categoryArray));
		return $categoryArray[$selectNo];
	}
 ?>

<?php
	 header("Content-Type: text/html; charset=UTF-8");
	// エラーを出力する
	ini_set('display_errors', 1);
	require_once('../rws-php-sdk-1.1.0/autoload.php');

	$client = new RakutenRws_Client();
	// アプリID (デベロッパーID) をセットします
	$client->setApplicationId('1069312965684050347');

	// アフィリエイトID をセットします(任意)
	$client->setAffiliateId('178fb567.f874f0a0.178fb56b.ec8a5021');

	// パラメータ取得
	$param = $_GET['category'];
	if (empty($param)) {
		$param = getCategory();
	}
	// IchibaItem/Search API から、keyword=うどん を検索します
	$response = $client->execute('IchibaItemSearch', array(
	  'keyword' => $param
	));

	// レスポンスが正しいかを isOk() で確認することができます
	if ($response->isOk() == false) {
	    // 配列アクセスによりレスポンスにアクセスすることができます。
		echo 'Error ]:'.$response->getMessage();
		return;
	}
	$line_separator = "<br/>";
	$tab = "　　　";
	// 取得する項目リスト
/*	print("<ルート>" . $line_separator);
	print("[ カウント ] ]: " . $response['count'] . $line_separator);
	print("[ ページ ]: " . ['page'] . $line_separator);
	print("[ ファースト ]: " . $response['first'] . $line_separator);
	print("[ ラスト ] ]: " . $response['last'] . $line_separator);
	print("[ ヒット ] ]: " . $response['hit'] . $line_separator);
	print("[ キャリア ]: " . $response['carrier'] . $line_separator);
	print("[ ページカウント ]: " . $response['pageCount'] . $line_separator);
	print("<アイテム>". $line_separator);
	foreach($response as $items) {
		print($tab . "[ アイテム名 ]: " . $items['itemName'] . $line_separator);
		print($tab . "[ キャッチコピー ]: " . $items['catchcopy'] . $line_separator);
		print($tab . "[ アイテムコード ]: " . $items['itemCode'] . $line_separator);
		print($tab . "[ アイテム値段 ]: " . $items['itemPrice'] . $line_separator);
		print($tab . "[ キャプション ]: " .$items['itemCaption'] . $line_separator);
		print($tab . "[ アイテムURL ]: " . $items['itemUrl'] . $line_separator);
		print("<小画像>". $line_separator);
		if (is_array($items['smallImageUrls'])) {
			if (count($items['smallImageUrls']) != 0) {
				$urls = $items['smallImageUrls'];
				print(" <<< var_dump() >>>" . $line_separator);
				var_dump($urls);
				print($line_separator . " <<< End of var_dump() >>>" . $line_separator);
				foreach($urls as $smallImageUrl) {
					print($tab . $tab . "画像(小)" . $smallImageUrl['imageUrl'] . $line_separator);
				}
			}
		} else {
			print("[小画像]: 小画像なし" . $line_separator);
		}
		print("<中画像>". $line_separator);
		if (is_array($items['mediumImageUrls'])) {
			if (count($items['mediumImageUrls']) != 0) {
				$urls = $items['mediumImageUrls'];
				foreach($urls as $mediumImageUrl) {
					print($tab . $tab . "画像(中)" . $mediumImageUrl['imageUrl'] . $line_separator);
				}
			}
		} else {
			print("[小画像]: 小画像なし" . $line_separator);
		}
		print("[ アフィリエイトURL ]: " . $items->affiliateUrl . $line_separator);
		print("[ ショップ・アフィリエイトURL ]: " . $items->shopAffiliateUrl . $line_separator);
		print("[ イメージフラグ ]: " . $items->imageFlag . $line_separator);
		print("[ 可溶性 ]: " . $items->availability . $line_separator);
		print("[ 税金フラグ ]: " . $items->taxFlag . $line_separator);
		print("[ ポストエイジフラグ ]: " . $items->postageFlag . $line_separator);
		print("[ クレジットカード・フラグ ]: " .$items->creditCardFlag . $line_separator);
		print("[ ショップオブザイヤー・フラグ ]: " . $items->shopOfTheYearFlag . $line_separator);
		print("[ シップオバーシーズ・フラグ(意味がわかりませんでした。。。) ]: " . $items->shipOverseasFlag . $line_separator);
		print("[ ワールドワイド(意味がわかりませんでした。。。) ]: " . $items->shipOverseasArea . $line_separator);
		print("[ アスラク・フラグ ]: " . $items->asurakuFlag . $line_separator);
		print("[ アスラククウロージング・フラグ ]: " . $items->asurakuClosingTime . $line_separator);
		print("[ アスラクエリア ]: " . $items->asurakuArea . $line_separator);
		print("[ アフィリエイト率 ]: " . $items->affiliateRate . $line_separator);
		print("[ 開始時間 ]: " . $items->startTime . $line_separator);
		print("[ 終了時間 ]: " . $items->endTime . $line_separator);
		print("[ レビューカウント ]: " . $items->reviewCount . $line_separator);
		print("[ ポイント率 ]: " . $items->pointRate . $line_separator);
		print("[ ポイント率開始時間 ]: " . $items->pointRateStartTime . $line_separator);
		print("[ ポイント率終了時間 ]: " . $items->pointRateEndTime . $line_separator);
		print("[ ギフトフラグ ]: " . $items->giftFlag . $line_separator);
		print("[ ショップ名 ]: " . $items->shopName . $line_separator);
		print("[ ショップコード ]: " . $items->shopCode . $line_separator);
		print("[ ？？？ ]: " . $items->genreId . $line_separator);
		print("[ タグID(複数？) ]: " . $items->tagIds . $line_separator);
		print("[ 終了時間 ]: " . $items->endTime . $line_separator);
		break;
	}
*/
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="./tirashi.css">
	<script>
		function researchRctn() {
			var param = document.getElementById('category').value;
			console.log(param);
			location.href = "http://zenryokuservice.com/project/rakuten/php/rakutenCatalog.php?category=" + param;
		}
	</script>
</head>
<body>
	<h7>※画面を更新すると内容が変わります。</h7>
	<div style="display: inline"><input id="category" type="text"><button onclick="researchRctn();">商品をリロード</button></input></div>
	<?php foreach($response as $items) { ?>
		<table border="1" class="box">
			<?php
				// 半角、全角のスペースを開業に痴漢する
				$replaceFrom = array("】【");
				$replaceTo = array("】<br/>【");
				$topMes = str_replace($replaceFrom, $replaceTo,$items['catchcopy']);
				print("<tr><td align='center' colspan='3'>" . $topMes . "</td></tr>");
				if (is_array($items['mediumImageUrls'])) {
					if (count($items['mediumImageUrls']) != 0) {
						$urls = $items['mediumImageUrls'];
						print("<tr>");
						print("<td width='128px' height='128'><a href='" . $items['affiliateUrl'] . "'><img src='" .  $urls[0]['imageUrl'] . "'/></a></td>");
						$itemName = str_replace($replaceFrom, $replaceTo, $items['itemName']);
						print("<td colsapan='2' rowspan='2'>" . $itemName . "</td>");
						print("</tr>");
						$cost = intval($items['itemPrice']);
						setlocale(LC_MONETARY, 'ja_JP');
						print("<tr class='nedan'><td>" . money_format('%i', $cost)  . "-</td>");
						print("<td colspan='2'></td>");
						print("</tr>");
					}
				}
			?>
		</table>
		<BR/>
	<?php } // ループ終了 ?>
</body>
</html>

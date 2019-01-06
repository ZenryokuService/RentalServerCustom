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

	// IchibaItem/Search API から、keyword=うどん を検索します
	$response = $client->execute('IchibaItemSearch', array(
	  'keyword' => '本'
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
	print("<ルート>" . $line_separator);
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
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="./rakuten.css">
</head>
<body>
</body>
</html>

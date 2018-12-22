# RentalServerCustom
レンタルサーバー上で遊ぶためのプログラム１
＜対象ファイル＞
<ul>
<li>index.html: 花火を表示するための画面(HTMLファイル）</li>
<li>hanabi.js: 花火を表示するためのJavaScriptファイル</li>
<li>main.css: 花火とメッセージ(Microbitから)を表示する画面のカスケードスタイルシート</li>
<li>server.php: ウェブサーバー上で動いているサーバー(アプリケーション)</li>
<li>websocketSender.py: マイクロビットのシリアル通信を受けてサーバーへ送信</li>
</ul>
＜概要＞
<ol>
<li>マイクロビットで作成したプログラムから</li>
<li>シリアル通信を行いPCへデータを送信する</li>
<li>マイクロビットから受信したデータをPC上で起動するPythonプログラムで受け取る</li>
<li>受け取ったデータをWebServer常にある「server.php」へ送信する</li>
<li>server.phpで受け取ったデータ(JSON形式)を「index.html」へ送信</li>
<li>WebSocketで接続している「index.html」で表示する</li>
<li>＜表示・送信方法に関する情報＞</li>
<li>花火の表示画面：http://zenryokuservice.com/project/index.html</li>
<li>Microbitからの実行方法：http://zenryokuservice.com/wp/2018/12/22/microbit%E8%8A%B1%E7%81%AB%E3%80%9Cmicrobit%E3%81%8B%E3%82%89webserver%E3%81%BE%E3%81%A7%E3%81%AE%E6%97%85%E3%80%9C/<BR/></li>
</ol>

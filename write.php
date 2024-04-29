<?php
// エラー表示を有効にする
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ディレクトリの存在を確認し、必要なら作成する
    $dir = 'data';
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);  // ディレクトリがなければ作成
    }

    // 受け取ったデータを変数に格納
    $name = $_POST['name'] ?? '未記入';
    $email = $_POST['email'] ?? '未記入';
    $book = $_POST['book'] ?? '未記入';
    $reason = $_POST['reason'] ?? '未記入';

    // 保存するデータの整形
    $str = "{$name}|{$email}|{$book}|{$reason}\n";

    // データの保存
    $file = fopen("{$dir}/data.txt", "a");  // ファイルを追記モードで開く
    fwrite($file, $str);  // データをファイルに書き込む
    fclose($file);  // ファイルを閉じる

    // 保存完了のメッセージとリンクの表示
    echo '<html><head><meta charset="utf-8"><title>保存完了</title></head><body>';
    echo '<h1>データを保存しました。</h1>';
    echo '<h2><a href="index.php">フォームに戻る</a></h2>';
    echo '<h2><a href="read.php">アンケート結果を見る</a></h2>';
    echo '</body></html>';
}
?>

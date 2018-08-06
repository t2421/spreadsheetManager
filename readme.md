# SpreadsheetManagerの使い方

## 準備
### SpreadsheetのAPIを使用可能にする

1. Google Cloud Platformでプロジェクトの作成
2. SpreadsheetAPIの有効化
3. 認証情報の設定
    + oAuthクライアントIDの作成
    + OAuthの同意画面の設定
    + その他を選択
    + credentials.jsonのダウンロード

### 初回のAPI認証をパスする

ターミナルでmain.phpを実行すると、指定のURLにアクセスするように求められる  
URLにアクセスすると認証コードが表示されるので、ターミナルに入力する  
すると、token.jsonが出力され、次回からは認証が走らずに使用できるようになる


## このテンプレートについて
このテンプレートはGoogleSpreadsheetのAPIの面倒くさい部分をひな型にしておくことによって各プロジェクトで使用する際に手軽に使えることを目指したもの。

### サンプルプロジェクト
https://docs.google.com/spreadsheets/d/1tSVu8sa-yQufrJL15cjTluQuheBDX_UhboTpBrutL5w/edit#gid=0  

`php main.php`を実行すると以下のデータ構造になるようにしている。  
変数名を同名にすると配列として格納するようにしている。  


#### dumpデータ
```
array(2) {
  [0]=>
  array(9) {
    ["data_label"]=>
    array(2) {
      ["label"]=>
      string(12) "データ名"
      ["value"]=>
      string(5) "data1"
    }
    ["label1"]=>
    array(2) {
      ["label"]=>
      string(10) "ラベル1"
      ["value"]=>
      string(5) "test1"
    }
    ["label2"]=>
    array(2) {
      ["label"]=>
      string(10) "ラベル2"
      ["value"]=>
      string(5) "test2"
    }
    ["label3"]=>
    array(2) {
      ["label"]=>
      string(10) "ラベル3"
      ["value"]=>
      string(5) "test3"
    }
    ["label4"]=>
    array(2) {
      ["label"]=>
      string(10) "ラベル4"
      ["value"]=>
      string(5) "test4"
    }
    ["label5"]=>
    array(3) {
      [0]=>
      array(2) {
        ["label"]=>
        string(12) "ラベル5_1"
        ["value"]=>
        string(5) "test5"
      }
      [1]=>
      array(2) {
        ["label"]=>
        string(12) "ラベル5_2"
        ["value"]=>
        string(5) "test6"
      }
      [2]=>
      array(2) {
        ["label"]=>
        string(12) "ラベル5_3"
        ["value"]=>
        string(5) "test7"
      }
    }
    ["label8"]=>
    array(2) {
      ["label"]=>
      string(10) "ラベル8"
      ["value"]=>
      string(5) "test8"
    }
    ["label9"]=>
    array(2) {
      ["label"]=>
      string(10) "ラベル9"
      ["value"]=>
      string(5) "test9"
    }
    ["label10"]=>
    array(2) {
      ["label"]=>
      string(11) "ラベル10"
      ["value"]=>
      string(6) "test10"
    }
  }
  [1]=>
  array(9) {
    ["data_label"]=>
    array(2) {
      ["label"]=>
      string(12) "データ名"
      ["value"]=>
      string(5) "data2"
    }
    ["label1"]=>
    array(2) {
      ["label"]=>
      string(10) "ラベル1"
      ["value"]=>
      string(5) "test2"
    }
    ["label2"]=>
    array(2) {
      ["label"]=>
      string(10) "ラベル2"
      ["value"]=>
      string(5) "test3"
    }
    ["label3"]=>
    array(2) {
      ["label"]=>
      string(10) "ラベル3"
      ["value"]=>
      string(5) "test4"
    }
    ["label4"]=>
    array(2) {
      ["label"]=>
      string(10) "ラベル4"
      ["value"]=>
      string(5) "test5"
    }
    ["label5"]=>
    array(3) {
      [0]=>
      array(2) {
        ["label"]=>
        string(12) "ラベル5_1"
        ["value"]=>
        string(5) "test6"
      }
      [1]=>
      array(2) {
        ["label"]=>
        string(12) "ラベル5_2"
        ["value"]=>
        string(5) "test7"
      }
      [2]=>
      array(2) {
        ["label"]=>
        string(12) "ラベル5_3"
        ["value"]=>
        string(5) "test8"
      }
    }
    ["label8"]=>
    array(2) {
      ["label"]=>
      string(10) "ラベル8"
      ["value"]=>
      string(5) "test9"
    }
    ["label9"]=>
    array(2) {
      ["label"]=>
      string(10) "ラベル9"
      ["value"]=>
      string(6) "test10"
    }
    ["label10"]=>
    array(2) {
      ["label"]=>
      string(11) "ラベル10"
      ["value"]=>
      string(6) "test11"
    }
  }
}
```
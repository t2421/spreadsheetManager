<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/GoogleSpreadsheetManager.php';
if (php_sapi_name() != 'cli') {
    throw new Exception('This application must be run on the command line.');
}
$mng = new GoogleSpreadsheetManager();
$values = $mng->values;

$value_labels = array();
$value_names = array();
$data = array();

//プロパティ名の取得
//配列名もそのまま処理
foreach ($values as $key => $value) {
    if($key == 0){
      foreach ($value as $idx => $prop) {
        $value_labels[$idx] = $prop;
      }
    }
    if($key == 1){
        foreach ($value as $idx => $prop) {
            $value_names[$idx] = $prop;
        }
    }
}

//いったんそのまま値を入れる
foreach ($values as $key => $value) {
    if($key == 0 || $key == 1) continue;
    
    $tmp_data = array();
    $tmp_data2 = array();

    foreach ($value_names as $idx => $prop_name) {
      if(isset($value[$idx])){
        if(array_key_exists($prop_name,$tmp_data)){
            //同じキーが存在するなら配列を生成する
            if(isset($tmp_data[$prop_name]["value"])){
                if(!is_array($tmp_data[$prop_name]["value"])){
                    $tmp = $tmp_data[$prop_name];
                    $tmp_data[$prop_name] = array();
                    array_push($tmp_data[$prop_name],$tmp);
                }
            }
            
            $val = array(
                "label"=>$value_labels[$idx],
                "value"=>$value[$idx]
              );
            array_push($tmp_data[$prop_name],$val);
        }else{
            $val = array(
                "label"=>$value_labels[$idx],
                "value"=>$value[$idx]
              );
            $tmp_data[$prop_name] = $val;  
        }
        
      }else{
          $val = array(
            "label"=>$value_labels[$idx],
            "value"=>""
          );
        $tmp_data[$prop_name] = $val;
      }
    }
    array_push($data, $tmp_data);
  }

var_dump($data);
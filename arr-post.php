<?php
// $_POST のキー値
$arrKey = array(
    "name" => array("title" => "名前", "attr" => "string",  "maxlength" => 10) ,
    "age"  => array("title" => "年齢", "attr" => "integer", "maxlength" => 3 , "min" => 0, "max" => 99) ,
    "memo" => array("title" => "メモ", "attr" => "string",  "maxlength" => 20) ,
);
// データ格納用配列の初期化
$arrPara = array();
// エラーメッセージ
$strError = "";
// $_POST のキー値を順次処理する
foreach($arrKey as $strKey => $arrAttr) {
    switch ($arrAttr["attr"]) {
        case "string":
            $arrPara[$strKey] = "";
            if ((isset($_POST[$strKey]) === true) || ($_POST[$strKey] === "")) {
                $arrPara[$strKey] = $_POST[$strKey];
                // 文字列長チェック
                if (mb_strlen($arrPara[$strKey]) > $arrAttr["maxlength"]) {
                    $strError .= $arrAttr["title"].":データ長エラー<br />";
                }
            }
            break;
        case "integer":
            $arrPara[$strKey] = "";
            if ((isset($_POST[$strKey]) === true) || ($_POST[$strKey] === "")) {
                $arrPara[$strKey] = $_POST[$strKey];
                // 文字列長チェック
                if (mb_strlen($arrPara[$strKey]) > $arrAttr["maxlength"]) {
                    $strError .= $arrAttr["title"].":データ長エラー<br />";
                } elseif (is_numeric($arrPara[$strKey]) === false) {
                    // 数値チェックエラー
                    $strError .= $arrAttr["title"].":数値チェックエラー<br />";
                } else {
                    // 最小最大値チェック
                    $intAge = intval($arrPara[$strKey]);
                    if ($intAge < $arrAttr["min"] || $arrAttr["max"] < $intAge) {
                        $strError .= $arrAttr["title"].":最小最大値チェックエラー<br />";
                    }
                }
            }
            break;
    }
}
// 取得データの表示


?>

<table class="table">

      <thead  class="table-dark">
         <tr>
     
         
         
         <th scope="col"> ကျောင်းအမည်</th>
         <th scope="col">တာဝန်ခံအမည်</th>
         <th  scope="col">လိပ်စာ</th>

         </tr>


         </thead>
     
     
         <?php
     foreach($arrPara as $strKey => $strPara) {
     echo "<thead>";
     echo "<tbody>";
     echo "<tr>";

    
        echo "<td>".  ".$strPara.". "<td>";
        
    }
    // エラー表示
    if ($strError != "") {
        echo "<br />".$strError;
    }
    ?>
  
  
    
     
    

     
     echo "</tr>"; 
     echo "</thead>";
     echo "</tbody>";
    

  
?>

</table>






<?php
$s = "He had had quite enough of this nonsense";
$res = str_word_count($s,1);
$hitung = array_count_values($res);

foreach($hitung as $key => $value) {
    if($value > 1) {
        printf("%s",$key);
    }
}
?>
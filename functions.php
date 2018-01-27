<?php
function h($value) {
    return htmlspecialchars($value,ENT_QUOTES);
    }


// function arr2csv($fields) {
//     $fp = fopen('php://temp', 'r+b');
//     foreach($fields as $field) {
//         fputcsv($fp, $field);
//     }
//     rewind($fp);
//     $tmp = str_replace(PHP_EOL, "\r\n", stream_get_contents($fp));
//     return mb_convert_encoding($tmp, 'SJIS-win', 'UTF-8');
// }


?>

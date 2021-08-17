<?php
function MaskPhoneNumber(string $number) :string{
    $start=2;
    $end=strlen($number)-2;
    for ($i=$start;$i<$end;$i++){
        $number[$i]="*";
    }
    return $number;
}

$number="8793178175";
echo MaskPhoneNumber($number);

?>



<?php
function FlattenArray(array $arr) :array{
    $result=array();
    foreach ($arr as $item){
        if (is_array($item)){
            $result=array_merge($result,FlattenArray($item));
        }else{
            array_push($result,$item);
        }

    }
    return $result;
}

$arr=array(2,3,array(4,5),array(6,7),8);
print_r(FlattenArray($arr)) ;


//Input: [2, 3, [4,5], [6,7], 8]
//Output: [2,3,4,5,8,7]

?>



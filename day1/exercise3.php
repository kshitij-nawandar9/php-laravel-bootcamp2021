<?php

function CamelCase(string $input) :string{
    $result="";
    for ($i=0;$i<strlen($input);$i++){
        if($input[$i]=="_"){
            $i++;
            $result=$result.strtoupper($input[$i]);
        }else{
            $result=$result.$input[$i];
        }
    }
    return $result;
}

$input=array("snake_case","camel_case");
foreach ($input as $item){
    echo CamelCase($item."\n");
}

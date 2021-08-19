<?php

$json_string="{\"players\":[{\"name\":\"Ganguly\",\"age\":45,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Dravid\",\"age\":45,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Dhoni\",\"age\":37,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Virat\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Jadeja\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Jadeja\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}}]}";
$json=(json_decode($json_string,true));

$names=array();
$age=array();
$city=array();
$unique_names=array();
$oldest_player=array();

foreach ($json["players"] as $player) {
//    print_r($player);
    array_push($names,$player["name"]);
    array_push($age,$player["age"]);
    array_push($city,$player["address"]["city"]);
}
$max_age=max($age);
$unique_names=array_unique($names);
for($i=0;$i<count($age);$i++){
    if($age[$i]==$max_age){
        array_push($oldest_player,$names[$i]);
    }
}
print "names : ";
print_r($names);
print "ages : ";
print_r($age);
print "city : ";
print_r($city);
print "uniques names : ";
print_r($unique_names);
print "oldest players : ";
print_r($oldest_player);
//print_r($json);
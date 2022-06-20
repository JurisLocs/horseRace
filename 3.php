<?php

$horses = explode(' ',readline("Enter horse names: "));
$track=[];

for($i = 0 ; $i <= count($horses)-1; $i++) {
    $track[$i] = array_fill(0,50,"-");
    $track[$i][0] = $horses [$i];
}

$bet = (int)readline("place your bets: ");
$confirmed = false;
while(!$confirmed){
    $horse = readline("Which horse?: ");
    if(!array_search($horse,$horses)){
        echo "No such horse" . PHP_EOL;
    } else;
    $confirmed = true;
}


$win = false;
$winner = "";
$counter = 0;
while(!$win){
    system("clear");
    for($i = 0 ; $i <= count($horses)-1; $i++) {
        $step = rand(1,3);
        $position = array_search($horses[$i], $track[$i]);
        if($position+$step >= count($track[$i])-1){
            $track[$i][count($track[$i])-1] = $horses[$i];
            $winner = $horses[$i];
            $track[$i][$position] = "-";
            $win = true;
            continue;
        }
        if($position === false )continue;

        $track[$i][$position + $step] = $horses[$i];
        $track[$i][$position] = "-";

    }
    foreach ($track as $line){
        echo implode("",$line);
        echo PHP_EOL;
    }

    $counter++;
    sleep(1);
}

echo "$winner won!" . PHP_EOL;
if($horse == $winner){
    $bet = $bet * count($horses);
    echo "You won $bet $" . PHP_EOL;
}else
    echo "Sorry your horse didn't win!";


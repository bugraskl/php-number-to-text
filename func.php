

/**
 * @param $number
 * @param string $currency
 * @param string $doit
 * @return string
 */
function moneyToText($number, string $currency = 'TürkLirası', string $doit = 'Kuruş'): string
{

    $numbers = [
        0 => '',
        1 => "Bir",
        2 => "İki",
        3 => "Üç",
        4 => "Dört",
        5 => "Beş",
        6 => "Altı",
        7 => "Yedi",
        8 => "Sekiz",
        9 => "Dokuz",
        10 => "On",
        20 => "Yirmi",
        30 => "Otuz",
        40 => "Kırk",
        50 => "Elli",
        60 => "Altmış",
        70 => "Yetmiş",
        80 => "Seksen",
        90 => "Doksan"
    ];


    $number = number_format($number,2);
    $coins = explode('.', $number);
    $money = $coins[0];
    $coins = last($coins);
    if ($coins == '00'){
        $penny = '';
        $doit = '';
    }else {
        $coins = str_split($coins);
        foreach ($coins as $key => $s){
            if ($key == 0){
                $coins[0] = $s*10;
            }
        }
        $penny = $numbers[$coins[0]].$numbers[$coins[1]];
    }

    $money = str_replace(',','',$money);
    $expMoney = array_reverse(str_split($money));

    foreach ($expMoney as $key => $m){
        if ($key == 10){
            $new[] = $m*10;
        }elseif ($key == 7){
            $new[] = $m*10;
        }elseif ($key == 4){
            $new[] = $m*10;
        }elseif ($key == 1){
            $new[] = $m*10;
        }else {
            $new[] = $m;
        }
    }

    foreach ($new as $n)
    {
        $text[] = $numbers[$n];
    }

    foreach ($text as $key => $t){
        if ($key == 2 && $t != ''){
            $text[2] = $t.'Yüz';
        }elseif ($key == 3){
            if ($t == 'Bir' && count($text)==4){
                $text[3] = 'Bin';
            }else {
                $text[3] = $t.'Bin';
            }
        }elseif ($key == 5){
            if ($t == 'Bir'){
                $text[5] = 'Yüz';
            }else {
                $text[5] = $t.'Yüz';
            }
        }elseif ($key == 6){
            $text[6] = $t.'Milyon';
        }elseif ($key == 8){
            if ($t == 'Bir'){
                $text[8] = 'Yüz';
            }else {
                $text[8] = $t.'Yüz';
            }
        }elseif ($key == 9){
            $text[9] = $t.'Milyar';
        }elseif ($key == 11){
            if ($t == 'Bir'){
                $text[11] = 'Yüz';
            }else {
                $text[11] = $t.'Yüz';
            }
        }
    }
    $text = implode('',array_reverse($text));
    return $text.$currency.$penny.$doit;
}

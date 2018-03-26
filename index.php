<?php 

    set_time_limit (0);
    include_once "defFunction.php";
    include_once "numberN.php";
    include_once "function.php";
    
    
    $n = 5; 

    $numberN = new numberN();
    $fourNumber = new four_digitNumbers();

    echo '1 задание. Исходные данные N = '.$numberN->getN().' ответ: '.$numberN->countNumber(5);
    echo '<br>2 задание. Исходные данные n = '.$n.' ответ: '.$fourNumber->summNumeralNumber($n);
    $perem = $numberN->ascendingSequence();
    echo '<br>3 задание. Исходные данные N = '.$numberN->getN().' ответ: '.$perem['messedg']['increases'];
    echo '<br>4 задание. Ответ: <br>'.arrayJsonToString($fourNumber->incrAndDecr()).'<br>';
    echo '<br> 5 задание. Исходное значение '.$numberN->getN().' ответ: '.$numberN->conversely();
    echo '<br> 6 задание. Ответ: '.$fourNumber->onlyNumbers();
    $perem = $numberN->sameDigits();
    echo '<br> 7 задание. Исходные данные '.$numberN->getN().' Ответ: '.$perem['messedg'];
    echo '<br> 8 задание. Ответ: '.$fourNumber->allNumberNotSameDigits();
    echo '<br> 9 задание. Исходные данные '.$numberN->getN().' Ответ: '.$numberN->automorphicNumber();
    echo '<br> 10 задание. Исходные данные '.$numberN->getN().' Ответ: '.$numberN->allPalinomN();
    echo '<br> 11 задание. Исходные данные 1,1000 Ответ: '.$numberN->shareAmountFigures(1,1000);
    echo '<br> 12 задание. Исходные данные '.$numberN->getN().' Ответ: '.$numberN->primeNumber($numberN->getN());
    echo '<br> 13 задание. Исходные данные '.$numberN->getN().' Ответ: '.$numberN->symmetricalNumber();
    echo '<br> 14 задание. Ответ: '.$numberN->pairedPrimes(10);
    echo '<br> 15 задание. Исходные данные '.$numberN->getN().' Ответ: '.$numberN->numberOfDividers($numberN->getN());
    echo '<br> 16 задание. Исходные данные 1,1000 Ответ: '.$numberN->perfectNumber(1,1000);
?>
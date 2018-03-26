<?php

class numberN extends defFunction{
    var $N = 1234567;

    function __construct ($number = null){
        if ($number && $this->isNumber($number)){
            $this->N = $number;
        } 
    }

    function getN(){
        return $this->N;
    }
    function setN($number){
        if ($this->isNumber($number)){
            $this->N = $number;
        }        
    }

    function countNumber ($number = null){
        if ( (!$number) || (!$this->isNumber($number)) ) { return 0;}

        $answer = 0;
        $mass = $this->decompositionOfTheNumber($this->N);
        for($i = 0; $i < $this->counts($mass); $i++ ){
            if ($mass[$i] < $number){
                $answer++;
            }     
        }
        return $answer;
    }


    // переворачивает строку\число задом наперед
    function conversely ($perem = null){
        $perem = $perem != null ? $perem : $this->N;
        $perem = ''.$perem;
        for($i = $this->strlens($perem) - 1; $i >= 0; $i--){
            $newPerem .=  $perem[$i];
        }
        return $newPerem;
    } 
    
    function automorphicNumber (){
        $number = $this->N*$this->N;
        $secondNumber = ''.$this->N;
        $number = ''.$number;
        $j = $this->strlens($number)-1;
        for ($i = $this->strlens($secondNumber)-1; $i >= 0; $i--){
            if ($secondNumber[$i] != $number[$j]){
                return 'Нет';
            }
            $j--;
        }
        return 'Да';
    }

    function allPalinomN ($number = null){
        $number = $number != null ? $number : $this->N;
        $answer = [];
        for ($i = 0; $i < $number; $i++){
            $perem = $i*$i;
            if ($this->palindromeNumbers($perem)){
                $answer[] = [$i,$perem];
            }
        }
        return json_encode($answer);        
    }

    function shareAmountFigures ($firstNumber, $secondNumber){
        $answer = [];
        if (!$this->isNumber($firstNumber) || !$this->isNumber($secondNumber)) {return 'Неверно заданы исходные данные';}
        if ($firstNumber >= $secondNumber) {return 'Неверно заданы исходные данные';}

        for ($i = $firstNumber; $i < $secondNumber; $i++){
            if ($summ = $this->summNumber($i)){
                if ($i % $summ == 0){
                    $answer[] = $i;
                }
            }
        }
        return json_encode($answer);
    }

    function symmetricalNumber($number = null){
        $number = $number != null ? $number : $this->N;
        if (!$this->isNumber($number)){return 'Неверно задано число';}
        
        if ($this->strlens($number.'') % 2 == 0){
            if ($this->palindromeNumbers($number)){
                return 'Симмитричное';
            }else {
                return 'Не симмитричное ( не является палиномным )';
            }
        }else {
            return 'Не симмитричное ( не четное кол-во цифр )';
        }

    }
    
    

    
}

?>
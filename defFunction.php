<?php 

    class defFunction {


        // проверяет состоит ли переменная только из чисел
        function isNumber($number){
            $number = $number != null ? ''.$number : 'a';
            $bool = false;
            $mass = ['0','1','2','3','4','5','6','7','8','9'];
            for($i = 0; $i < $this->strlens($number); $i++ ){
                for ($j = 0; $j < $this->counts($mass); $j++){
                    if ($number[$i] == $mass[$j]){
                        $bool = true;
                    }
                }  
                if ($bool){
                    $bool = false;
                }else {
                    return false;
                }
            }
            return true;
        }           

        // разбиение числа на отдельные числа и запись их в массив
        function decompositionOfTheNumber ($number) {
            if ($number == null){ return false; }
        
            $number = ''.$number.'';
            $answer = array();
            for($i = 0; $i < $this->strlens($number); $i++ ){
                $answer[] = "" + $number[$i];   
            }
            return $answer;
        }


        // есть ли одинаковые элементы в числе\строке
        function sameDigits($perem = null){
            $perem = $perem != null ? ''.$perem : ''.$this->N;
            $bool = false;
            for ($i = 0; $i < $this->strlens($perem); $i++){
                for ($j = 0; $j < $this->strlens($perem); $j++){
                    if (($perem[$i] == $perem[$j]) && ($i != $j)){
                        return array('messedg'=>'Есть','answer'=>true);
                    }
                }
            }
            return array('messedg' => 'Нету','answer' => false);
        }

        // проверяет возростает или убывает число
        function ascendingSequence($number = null){
            $messedg = array(
                'messedg' => array (
                    'increases'  => 'Возростает',
                    'decreasing' => 'Убывает'
                ),
                'answer'  => array (
                    'increases'  => true,
                    'decreasing' => true
                )
            );
            if (!$number) {
                $number = $this->N;
            }else {
                if (!$this->isNumber($number)){
                    $messedg['messedg']['increases'] = 'Неверно задана переменная';
                    $messedg['messedg']['decreasing'] = 'Неверно задана переменная';
                    return $messedg;
                }
            }
            $mass = $this->decompositionOfTheNumber($number);        
        
            for($i = 0; $i < $this->counts($mass); $i++){
                if ($i != $this->counts($mass)-1){
                    if ($mass[$i] > $mass[$i+1]){
                        $messedg['messedg']['increases'] = 'Не возростает';
                        $messedg['answer']['increases'] = false;
                    }       
                    if ($mass[$i] < $mass[$i+1]){
                        $messedg['messedg']['decreasing'] = 'Не убывает';
                        $messedg['answer']['decreasing'] = false;
                    }  
                    if ($mass[$i] == $mass[$i+1]){
                        $messedg['messedg']['increases'] = 'Не возростает';
                        $messedg['answer']['increases'] = false;
                        $messedg['messedg']['decreasing'] = 'Не убывает';
                        $messedg['answer']['decreasing'] = false;
                        break;
                    }
                }
            }
            return $messedg;
        }       

        // проверка на паленом 123321 
        function palindromeNumbers ($number){
            $number = ''.$number;
            $j = $this->strlens($number);           
            $perem = floor( $j / 2);
            $j--;
            for ($i = 0; $i < $perem; $i++){                
                if ($number[$i] != $number[$j]){                   
                    return false;
                }
                $j--;
            }
            return true;
        }


        // сумма цифр числа
        function summNumber($number){
            if (!$this->isNumber($number)){ return false;}
            $mass = $this->decompositionOfTheNumber($number);
            if ($mass){
                for($j = 0; $j < $this->counts($mass); $j++){
                    $summ += $mass[$j];     
                }
            }else {
                return false;
            }      
            return $summ;  
        }
        // является ли число простым
        function primeNumber ($number, $param = null){
            if (!$this->isNumber($number)){ return false;}
            $answer = [];
            for ($i = 2; $i < $number; $i++){
                if ($number % $i == 0){
                    $answer[] = $i;
                }
            }
            if ($answer){
                if ($param){
                    return false;
                }
                return json_encode($answer);
            }
            return true;
        }


        // парные простые числа 
        function pairedPrimes ($number){
            if (!$this->isNumber($number)){ return 'Неверно задано число';}
            $i = 3;
            $answer = [];
            while ($number > 0){
                if ($this->primeNumber($i,1) && $this->primeNumber($i+2,1)){
                    $answer[] = array($i,$i+2);
                    echo $number;
                    $number--;
                }
                $i++;
            }
            return json_encode($answer);
        }

        // кол-во делителей числа
        function numberOfDividers ($number, $param = null){
            if (!$this->isNumber($number)){ return 'Неверно задано число';}
            $answer = array(
                'kol'  => 0,
                'itog' => []
            );
            $j = 0;
            $mass = [];
            for ($i = 1; $i < $number; $i++){
                if ($number % $i == 0){
                    $mass[] = $i;
                    $j++;
                }
            }
            if ($mass){
                $answer['kol'] = $j;
                $answer['itog'] = $mass;                
            }           
            if ($param){
                if ($mass){
                    return $mass;
                }else {
                    return false;
                }
            }

            return json_encode($answer);
        }

        // все совершенные числа в диапазоне от N до M
        function perfectNumber($firstNumber, $secondNumber){
            if (!$this->isNumber($firstNumber) && !$this->isNumber($secondNumber) && $firstNumber < $secondNumber){ return 'Неверно задано число';}
            $answer = [];
            for ($i = $firstNumber; $i <= $secondNumber; $i++){
                if ($mass = $this->numberOfDividers($i,1)){
                    for ($j = 0; $j < $this->counts($mass); $j++){
                        $sum += $mass[$j];
                        $perem_mass[] = $mass[$j];
                    }
                    if ($sum == $i){
                        $answer[] = array(
                            'number'   => $i,
                            'deliteli' => $perem_mass
                        );
                    }
                    $sum = 0;
                    $perem_mass = [];
                }
            }
            return json_encode($answer);
        }


        function counts($mass){
            $i = 1;            
            while ($mass[$i] != null){
                $i++;
            }
            return $i;
        }

        function strlens($str){
            $i = 0;            
            while ($str[$i] != ""){
                $i++;
            }
            return $i;
        }

    }
?>
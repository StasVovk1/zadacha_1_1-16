<?php 

class four_digitNumbers extends defFunction{
    

    function summNumeralNumber($number){
        $answer = array();
        $summ = 0;    
        for($i = 1000; $i < 10000; $i++){
            if ($summ = $this->summNumber($i)){
                if ($summ == $number){
                    $answer[] = $i;                    
                }
            }     
        }
        return json_encode($answer);
    }


    function incrAndDecr(){
        $array = array();
        for($i = 1000; $i < 10000; $i++){
            if (($i % 2) == 0) {
                $answer = $this->ascendingSequence($i);
                if ($answer['answer']['increases'] == true){
                    $array[] = 'Число: '.$i.' '.$answer['messedg']['increases'];
                }
                if ($answer['answer']['decreasing'] == true){
                    $array[] = 'Число: '.$i.' '.$answer['messedg']['decreasing'];
                }
            }
        }
        return json_encode($array);
    }

    
    function onlyNumbers (){
        $answer = [];
        for($i = 1000; $i < 10000; $i++){
            $mass = $this->decompositionOfTheNumber($i);
            $bool = true;
            for ($j = 0; $j < $this->counts($mass); $j++){
                if (($mass[$j] != '0') && ($mass[$j] != '2') && ($mass[$j] != '3') && ($mass[$j] != '7')){
                    $bool = false;
                    break;
                }
            }
            if ($bool){
                $answer[] = $i;
            }
        }
        return json_encode($answer);
    }

    function allNumberNotSameDigits(){
        $answer = [];
        for($i = 1000; $i < 10000; $i++){
            $perem = $this->sameDigits($i);
            if (!$perem['answer']){
                $answer[] = $i;
            }
        }
        return json_encode($answer);
    }

}





function arrayJsonToString($json){
    $json = json_decode($json);
    if ($json){
        for ($i = 0; $i < defFunction::counts($json); $i++){
            $string .= $json[$i].'<br>';
        }
    }
    return $string;
}







?>
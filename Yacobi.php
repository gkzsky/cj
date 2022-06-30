<?php
class Yacobi{  
    private $matrix;  
    public function __construct($array){  
        $this->matrix = $array;  
    }  
    public function solve(){  
        $preX = array();  
        $nowX = array();  
        $cishu = 17;  
        $matN = count($this->matrix);  
        for($i = 0;$i<$matN;$i++){  
            $preX[$i] = 1;  
        }  
        for($n = 0;$n<$cishu;$n++){  
            for($i = 0;$i<$matN;$i++){//xi  
                $sum = 0;  
                for($j = 0;$j < $matN;$j++){  
                    if($j != $i) $sum += ($this->matrix[$i][$j] * $preX[$j]);  
                }  
                $nowX[$i] = ($this->matrix[$i][$matN] - $sum)/$this->matrix[$i][$i];  
            }   
            $preX = $nowX;  
            $str = implode(",",$nowX);  
            echo ($n+1).":($str)"."<br>";  
        }  
    }  
}  
?>
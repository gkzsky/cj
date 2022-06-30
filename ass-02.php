<?php 
// echo '<p>Hello World</p>'; 
require 'vendor/autoload.php';
include 'CommandLine.php';
include 'Yacobi.php';
use MathPHP\LinearAlgebra\Matrix;
use MathPHP\LinearAlgebra\MatrixFactory;
use MathPHP\Functions\Polynomial;
$args = CommandLine::parseArgs();
$file_name=$args['args'][0];
$fp = fopen($file_name,'r');
$data=[];
// $i=0;
if (file_exists($file_name)) 
{
    // echo "THB\tCHY\n";
    while(!feof($fp)){//判断文件指针是否到达末尾
        $line = fgets($fp);//返回一行文本，并将文件指针移动到下一行头部
        array_push($data,$line);
        // $data[$i++]=$line;
        // echo (int)$line."\t123\n";//输出获取到的一行文本
    }
}
$num=(int)$data[0];
$start_line=1;
for ($i=0; $i < $num; $i++) { 
    $sub_num=(int)$data[$start_line];
    $sub_array=[];
    $start_line++;
    for ($j=0; $j < $sub_num; $j++) { 
        $tmp_res=preg_replace("/\s(?=\s)/","\\1",$data[$j+$start_line]);
        $tmp_res=trim($tmp_res);
        $tmp_res=explode(" ",$tmp_res);
        for ($k=0; $k < $diam[1]; $k++) { 
            $tmp_res[$k]=floatval($tmp_res[$k]);
        }
        array_push($sub_array,$tmp_res);
    }
    $res=new Yacobi($sub_array);
    $res->solve();
    // $MA_t = MatrixFactory::create($sub_array);
    $start_line+=$sub_num;

    // $tmp_res=preg_replace("/\s(?=\s)/","\\1",$data[$i+1]);
    // $tmp_res=trim($tmp_res);
    // $tmp_res=explode(" ",$tmp_res);
    // for ($k=0; $k < $diam[1]; $k++) { 
    //     $tmp_res[$k]=floatval($tmp_res[$k]);
    // }
    // $polynomial   = new Polynomial($tmp_res);
    // $roots      = $polynomial->roots();
    // array_push($a1,$roots);
    // echo $roots."\n";
}

?>
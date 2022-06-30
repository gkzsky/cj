<?php 
// echo '<p>Hello World</p>'; 
require 'vendor/autoload.php';
include 'CommandLine.php';
use MathPHP\LinearAlgebra\Matrix;
use MathPHP\LinearAlgebra\MatrixFactory;
$args = CommandLine::parseArgs();
$file_name=$args['args'][0];
$fp = fopen($file_name,'r');
$data=[];
$i=0;
if (file_exists($file_name)) 
{
    // echo "THB\tCHY\n";
    while(!feof($fp)){//判断文件指针是否到达末尾
        $line = fgets($fp);//返回一行文本，并将文件指针移动到下一行头部

        $data[$i++]=$line;
        // echo (int)$line."\t123\n";//输出获取到的一行文本
     }
}
// print_r($data);

// exit;
$diam=explode(" ",$data[0]);
for ($j=0; $j < 3; $j++) { 
    
    $diam[$j]=(int)$diam[$j];
}
$a1=[];
echo "Input matrix A"."(".$diam[0]."x".$diam[1]."):\n";
for ($j=0; $j < $diam[0]; $j++) { 
    echo $data[$j+1];
    $tmp_res=preg_replace("/\s(?=\s)/","\\1",$data[$j+1]);
    $tmp_res=trim($tmp_res);
    $tmp_res=explode(" ",$tmp_res);
    
    for ($k=0; $k < $diam[1]; $k++) { 
        $tmp_res[$k]=(int)$tmp_res[$k];
    }
    array_push($a1,$tmp_res);
}
echo "Input matrix B"."(".$diam[1]."x".$diam[2]."):\n";
$a2=[];
for ($j=0; $j < $diam[1]; $j++) { 
    echo $data[$j+1+$diam[0]];
    $tmp_res=preg_replace("/\s(?=\s)/","\\1",$data[$j+1+$diam[0]]);
    $tmp_res=trim($tmp_res);
    $tmp_res=explode(" ",$tmp_res);
    for ($k=0; $k < $diam[2]; $k++) { 
        $tmp_res[$k]=(int)$tmp_res[$k];
    }
    array_push($a2,$tmp_res);
}
echo "The result matrix C"."(".$diam[0]."x".$diam[2]."):\n";
$MA_1 = MatrixFactory::create($a1);
$MA_2 = MatrixFactory::create($a2);
$MA_res   = $MA_1->multiply($MA_2);
print($MA_res);
echo "\n";
?>
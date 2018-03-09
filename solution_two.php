#!/usr/bin/php7.0
<?php
# removing file name from arguements
     if(isset($argv[0])) { 
        unset($argv[0]);
     }
    

     # Input string
     $input_string = isset($argv[1]) ? $argv[1]: "";            
     
     $string_array = str_split($input_string);
     
     # count occurences of Characters in array
     $character_count = array_count_values($string_array);
   
     # Parse array find and store the result     
     $result = [];
     $count  = 0;
     foreach($character_count as $key=>$val){
        if($val > $count){
        $result = $key;
        $count  =  $val;
        }
     }   

     echo "Input: ". $argv[1]."\n";
     
     echo "Output : ".$result."\n";
?>

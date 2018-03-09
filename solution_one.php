#!/usr/bin/php7.0
<?php 
	# removing file name from arguements
	if(isset($argv[0])) { 
        unset($argv[0]);
    }

    # Input string
    $input_string = $argv[1];

    #Initilizing most previous character's count
    $last_count = 0;
    $current_count  = 0;
	foreach (count_chars($input_string, 1) as $i => $val) {
		if($last_count < $val ){
			if($current_count != $val){
				$result = chr($i);
				$current_count = $val;
			}
		}
		
		$ch = chr($i);

		#Storing most previous character's count
	   	$last_count = $val ;
	}
	echo "Input: ". $argv[1]."\n";

	echo "Output: ". $result."\n";
?>

#!/usr/bin/php7.0
<?php
  # removing file name from arguements
     if(isset($argv[0])) { 
		unset($argv[0]);
     }
	
	
	 $student_data     =  [];
     
     if(isset($argv[1])){
		 $filename = 'student_data.txt';
		 
		 #read File
		 $data 		=	file_get_contents($filename);
		 
		 $data_arr  =  explode("\n",$data);
		
		 foreach($data_arr as $line){
			  $student_data[] = array_combine( ['name', 'mark1', 'mark2', 'mark3'], explode(" ",$line) );
		 }

		 $mark_count = 1;
		 //$student_count = 0;
		 $last_highest = '';
		 $result1 = $result2 = $result3 = '';
		 $input = 1;
		 $break_point = 3;
		 	
		 		//echo $last_highest;
		 		for($z=1; $z <= 3; $z++){
		 			if($mark_count == 1){
		 				if($last_highest <= $student_data[$z-1]['mark'.$mark_count])
		 				{
			 				$result1 = "-".$student_data[$z-1]['name']." ";
			 				$last_highest = $student_data[$z-1]['mark'.$mark_count];
			 			}
		 			}

		 			if($mark_count == 3){
		 				if($last_highest <= $student_data[$z-1]['mark'.$mark_count])
		 				{
			 				$result2 = "-".$student_data[$z-1]['name']." ";
			 				$last_highest = $student_data[$z-1]['mark'.$mark_count];
			 			}
		 			}
		 			
		 			$mark_count++;
		 		}
		 		
		 		
		// print_r($student_data[0]['mark'.$i]);
		
	 }
 
	 print_r($result1." ".$result2."\n");
?>

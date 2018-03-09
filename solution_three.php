#!/usr/bin/php7.0	
<?php

#
#  Kindly place phonebook.json in current directory before execution.
#
#
#


$filename = "phonebook.json";

# removing file name from arguements
     if(isset($argv[0])) { 
		unset($argv[0]);
     }
	
	 $phone_no 	=	"";
	 $name 		=	"";
     foreach($argv as $argstr){

		# checking for name
		 if(strpos($argstr, 'name=') !== false)
			$name = explode('name=',$argstr)[1];
		
		# checking for phone
		 if(strpos($argstr, 'phone=') !== false)	
			 $phone_no = explode('phone=',$argstr)[1];
	 }
	 
	 #read File
	 $data 		=	file_get_contents($filename);
	 $phonebook	=	json_decode($data);
	 
	 #find phone no if phone no is not set & terminate execution
	 if($phone_no == ""){
		 $phone_nos = phoneBookProcess($phonebook, "search", $name);
		
		 echo "Phone Numbers : ". implode(", ",$phone_nos ); 
		 exit;
	 }
	 
	 #When User Name and Phone number are not available
	 if($name == ""){
		 echo "Please Input Name";
		 exit;
	 }
	 
	 # When both are available add to the file
	 # $phonebook[] = array("name"=>$name,"phone"=>$phone_no);
	 
	 echo "Adding Contact...";
	 $phonebook 	=	phoneBookProcess($phonebook, "add", $name, $phone_no);
	 file_put_contents($filename, json_encode($phonebook));
	 
	 
	 
     
	#function to look for phone numbers type=> search, add
	 function phoneBookProcess($phonebook, $type="search", $name= "", $phone = "")
	 {
		 $result = [];
		 $processed =  false;
		 foreach($phonebook as $contact){
			
			if($contact->name == $name){
				if($type == "search"){
					$result 	=  $contact->phone;
					$processed 	=  true;
					
				}
				
				else if($type == "add"){
				 $contact->phone[] 	= $phone;
				 $result 			= $phonebook;	
				 $processed 		=  true;
				 echo "add";
				 break;
				}
			}	 
			
		 }
		 if($type == "add" && !$processed){
			 $phonebook[] = ["name"=>$name,"phone"=>[$phone]];
			 $result      = $phonebook;
		 }
		 
		return $result;
	 }
     
     

<?php
function getDBInfo()
    {
      $array[0] = 0;
      $count = 0;

      //Open file cf file
      $cfg = fopen("cf.txt","r");
      
      //Test for opening
      if (!$cfg)
      {
        exit("Cannot open cf.txt");
      }
      
      //Read the data
      while(true)
      {
        $line = fgets($cfg);
        
        //Check for eof
        if (!$line)
        {
          break;
        }
        
        //Otherwise store the results
        $array[$count] = rtrim($line);
        $count++;
      }
      
      //Return the array
      return($array);
      
    }
	function openDB()
    {
      //Get the db info
      $array = getDBInfo();
     
      //Open database
      $database = mysqli_connect( $array[0], $array[1], $array[2] , $array[3]);
      
      //Test the database
      if (!$database)
      {
        exit('Cannot open database');
      }
     // echo 'Connected';
      return($database);
    }
?>


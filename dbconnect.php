<?php

  $DBhost = "localhost";
  $DBuser = "";//FILL
  $DBpass = "";//FILL
  $DBname = "";//FILL
  
  $DBcon = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);
    
     if ($DBcon->connect_errno) {
         die("ERROR : -> ".$DBcon->connect_error);
     }
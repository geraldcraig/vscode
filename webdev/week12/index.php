<?php 
   $filename = "http://education.eeecs.qub.ac.uk/source/cities.json";
   $filestring = file_get_contents($filename); 
   echo $filestring; 
?>
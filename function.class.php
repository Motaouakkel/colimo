<?php
 class maktabati{
	var $sk='cosmic';  
  /****************************************************************************************/	
function LimitText($Text,$Min,$Max,$MinAddChar) {
   if (strlen($Text) < $Min) {
       $Limit = $Min-strlen($Text);
       $Text .= $MinAddChar;
   }
   elseif (strlen($Text) >= $Max) {
       $words = explode(" ", $Text);
       $check=1;
       while (strlen($Text) >= $Max) {
           $c=count($words)-$check;          
           $Text=substr($Text,0,(strlen($words[$c])+1)*(-1));
           $check++;
       }
   }
 
   return $Text;
} 
/***************************************************************************************/   
   function Crypte($string) {
      $this->data = '';
      for ($i = 0; $i<strlen($string); $i++) {
         $kc = substr($this->sk, ($i%strlen($this->sk)) - 1, 1);
         $this->data .= chr(ord($string{$i})+ord($kc));
      }
      $this->data = base64_encode($this->data);
      return $this->data;
   }
/***************************************************************************************/   
   function Decrypte($string) {
      $this->data = '';
      $string = base64_decode($string);
      for ($i = 0; $i<strlen($string); $i++) {
         $kc = substr($this->sk, ($i%strlen($this->sk)) - 1, 1);
         $this->data .= chr(ord($string{$i})-ord($kc));
      }
      return $this->data;
   }
   /***********************************************************/
	function securite_bdd($string)
	{
		if(ctype_digit($string))
		{
			$string = intval($string);
		}
		else
		{
			$string = mysql_real_escape_string($string);
			$string = htmlentities($string,ENT_QUOTES,'iso-8859-1');
			$string = addcslashes($string, '%_');
		}
		return $string;
	}	
	/******************************************************************/	
	function str_affiche($string) {
      $string = html_entity_decode($string,ENT_QUOTES,'iso-8859-1');
	  $string = stripslashes($string);
	  return $string;
	}
	/******************************************************************/	
	function mysql_DateTime($d) { 
	  $date = substr($d,8,2)."/";        // jour 
	  $date = $date.substr($d,5,2)."/";  // mois 
	  $date = $date.substr($d,0,4). " "; // année 
	  return $date; 
	} 
	
	/******************************************************************/	
	function datefr2en($mydate){
	   @list($jour,$mois,$annee)=explode('/',$mydate);
	   return @date('Y-m-d',mktime(0,0,0,$mois,$jour,$annee));
	}	
	/******************************************************************/	
	function datesec($mydate){
	   @list($jour,$mois,$annee)=explode('/',$mydate);
	   return mktime(0,0,0,$mois,$jour,$annee);
	}	
	function datediff($date1,$date2) {
	 $nbjours = round((strtotime($date1) - strtotime($date2))/(60*60*24));
	 return $nbjours;
	}
	/****************** Random *********************************/
	function random($car) {
	$string = "";
	$dateheure = strftime("%d%m%y%H%M%S");
	$chaine = "1234567890abcdefghijklmnpqrstuvwxy";
	srand((double)microtime()*1000000);
	for($i=0; $i<$car; $i++) {
	$string .= $chaine[rand()%strlen($chaine)];	
	}
	$string .= $dateheure;
	return $string;
	}
	/******************************************************************/	
	function chiffrement($nombre) {
	  if($nombre>0 and $nombre<10) {
	     return "00".$nombre;
	  }
	  elseif($nombre>9 and $nombre<100) {
	    return "0".$nombre;
	  }
	  else {
	    return $nombre;
	  }
	}
}
?>
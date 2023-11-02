<?php header('Content-Type: text/html; charset=windows-1251'); ?>
 	
 	<form action="" method="post">
		<input type="text" name="inputString" value="" placeholder="Input string">
		<input type="submit" value="Check">
	</form>
	
<?php
if (!$_POST or empty($_POST['inputString']))
    exit;

define("MAX_WORD_LENGTH","2");
$inputString = $_POST['inputString'];

$workString = mb_strtolower($inputString, 'windows-1251');
//$workString = mb_strtolower($inputString, 'UTF-8');

$workString = str_replace(" ","",$workString); 												 // Deleting spaces from workString
$inputLength = strlen($workString);
$reverseString = strrev($workString);


if ((strcmp($workString, $reverseString) == 0) & ($inputLength >= MAX_WORD_LENGTH))
    echo '<H2>' . 'Строка является палиндромом = ' . $inputString . '<br>';
else {
	$arrayInput = str_split($workString);													  //Move str into array	
	$arrayReverse = str_split($reverseString);
    searchPalindrom($arrayInput, $arrayReverse, $inputLength);   		
    searchPalindrom($arrayReverse, $arrayInput, $inputLength);	
   	$piecesPalindrom = explode(" ", $palindromString);
	$palindromString = NULL;
	
	foreach ($piecesPalindrom as $value) {	
	 	
	 	if ((strlen($palindromString) < strlen($value)) & (strlen($value)>MAX_WORD_LENGTH)){
	   		$palindromString = $value;
	    	$maxPalindromSize = strlen($value);
		} 
    }   	
	
	if ((strlen($palindromString) == $inputLength)){
		$palindromString[0] = NULL;  
	}	 	

	if (!isset($maxPalindromSize)){
		echo '<H2>' . "Палиндромы отсутствуют в строке. Первый символ строки = " . array_shift($arrayInput) . '<br>'; 
	}  
	else  
		echo '<H2>' . "Строка не являеться палиндромом. Самый длиный палиндром строки = " . $palindromString;	
 
 }

function searchPalindrom($array1, $array2, $inputLength){

    global $palindromString;

	for ($j = 0; $j < $inputLength; $j++){	
	
		for ($i = 0; $i < $inputLength; $i++){
    
            if (($i + $j) >= $inputLength)
               break;	           	   
           	
			if ($array1[$i] == $array2[$i+$j]) 	
	   		    $palindromString .= $array1[$i];
			else
			    $palindromString .= ' ';	
			    		
		}
	}   

	return $palindromString;
}
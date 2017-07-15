<?php

class Brackets
{
  public function isBracketSequenceCorrect($str) {
	  $array=array();
	  
	for($i=0;$i<strlen($str);$i++)
	{		
		if(count($array)==0){
			array_push($array,$str[$i]);
		}		
		else{
			if($array[count($array)-1]=="[")		
				if($str[$i]=="]")
					array_pop($array);
				else
					array_push($array,$str[$i]);
			else
				if($array[count($array)-1]=="{")
					if($str[$i]=="}")
						array_pop($array);
					else
						array_push($array,$str[$i]);
				else
					if($array[count($array)-1]=="(")
						if($str[$i]==")")
						array_pop($array);
					else
						array_push($array,$str[$i]);		
		}
	}
	if(count($array)==0){
		print_r(true);
		return true;
	}
	else{
		print_r(false);
		return false;
	}
  }
}
$obj=new Brackets();
echo $obj->isBracketSequenceCorrect("({}[)]") ? 'true' : 'false';
?>

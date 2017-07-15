<?php

class Brackets
{
  public function isBracketSequenceCorrect($str) {
	  //создаем стек, куда будем записывать строки
	  $array=array();
	  //посимвольно считываем введенную строку
	for($i=0;$i<strlen($str);$i++)
	{	
		//если стек пуст, записываем символ в стек
		if(count($array)==0){
			array_push($array,$str[$i]);
		}		
		else{
		//если последний символ в стеке, открывающая скобка, а текущий символ закрывающая скобка того же формата,
		//то извлекаем последний символ из стека	
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
	  //если по окончанию прохода стек оказался пуст, значит скобочная последовательность была правильная 
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

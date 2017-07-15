<?php
class MaximumUniqueSubstring
{
  public function findMaximumUniqueSubstring($str) {
	  //строка куда будем записывать новое значение
	  $newstr="";
	  //посивольный перебор введенной строки
	  foreach(str_split($str) as $value)
	  {
		  //получаем позицию текущего символа в новой страке, если функция его не находит 
		  //записываем этот символ в новую строку
		if(strpos($newstr,$value)===false)
		{
			$newstr.=$value;
		}
	  }
	  unset($value);
	  print_r($newstr);
  }
}
$obj=new MaximumUniqueSubstring();
$obj->findMaximumUniqueSubstring("aabcdAbc");
?>
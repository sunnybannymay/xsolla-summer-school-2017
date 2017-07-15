<?php
function Head()
	{			
			$file=filesize($_GET['file']);
			print_r('<p><b>File size is:'.$file.' B');
	}
function Get()
	{

			$file=file_get_contents($_GET['file']);
			print_r('<br>File data is:   '.$file);
	}
function Post()
	{
			if(isset($_REQUEST['Change']) && trim($_REQUEST['Change'])!="")
			{
				$file=file_put_contents($_GET['file'],$_REQUEST['Change']);
				unset($_REQUEST['Change']);
				print_r("<p>File was rewritten");
				Head();
				Get();
			}
			
	}
function Delete_f()
	{	
			if(isset($_REQUEST['delete']))
			{
			$file=unlink($_GET['file']);		
			print_r('<br>'.'file was deleted');
			}
			
	}
	
function Patch()
	{
			if(isset($_REQUEST['Append'])&&trim($_REQUEST['Append'])!=""&&isset($_REQUEST['submit']))
			{
				$file=file_put_contents($_GET['file'],$_REQUEST['Append'],FILE_APPEND);
				unset($_REQUEST['Append']);
				print_r("<p>File was modified");
				Head();
				Get();
			}
	}
function Menu()
{
			if(isset($_GET['file']) && file_exists($_GET['file']))
			{
			if(isset($_REQUEST))
			{
				Head();
				Get();
				Patch();
				Post();
				Delete_f();
			}
			}
			else
				if (isset($_GET['file']) && !file_exists($_GET['file']))
				"<b>Файл {$_GET['file']} не существует";
				else
					echo "<b>Главная страница. Сделайте запрос к файлу</b>";
			
}
	Menu();
?>

<form action='' method='post'>
<p><b>Change the data in the file	<input type="text" name='Change' value=""></input>
<p>Append the data in the file	<input type="text" name='Append' value=""></input>
<p><input type="submit" name='submit' value='submit'></input>
<p><button type="submit" name='delete' value='Delete'>delete</button>
<p><button type="submit" name='get' value='Get'>Show file data</button>
</form>



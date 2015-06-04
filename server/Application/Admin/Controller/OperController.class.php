<?php
use Think\Controller;
class OperController extends Controller{
	
	function index()
	{
	//	$this->display();
		$cod=`/bin/ls -l`;
		echo $cod;
	}
	function Operation()
	{
		
	}
}
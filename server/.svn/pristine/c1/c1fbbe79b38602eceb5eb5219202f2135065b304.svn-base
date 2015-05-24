<?php
namespace Home\Controller;
use Think\Controller;
use Think\Cache\Driver\Memcached;
class FristController extends Controller{
	public function Frist()
	{
	//	echo '这就是个测试页！';
	//$this->display('Index/index');
	//phpinfo();
	$name=getenv('SERVER_NAME');
	echo $name;
	$a=array('key'=>'name2','value'=>'wahaha');
	$value=$this->conn('localhost','name');
	dump($value);
	}
	//测试连接memcache

	private  function conn($conn,$key,$array=null)
	    {
		$m= new Memcached();
		$m->addServer("$conn", 11211);
		if($array==null)
		{
		  	return $m->get($key);	
		}
		else 
		{
			$m->set("$key", $array);
			return TRUE;
		}
	    }
	   
	
    public function Second()
    {
    	//C('MEMCACHED_SERVER', array(array('localhost',11211)));

    	$use=S('key35','dani1');
    	$use1=S('key35');
    	    	//$memcache = new \Think\Cache\Driver\Memcached();
    	
    	     //	$memcache->set("name", "abc");
    	 
    	     	//var_dump($memcache->get("key34"));
    	dump($use1);
    }
	//保存数据
	//测试往memcache里面写入数据
	//测试读出memcache里面的数据，以jason的形式输出到页面
	
}
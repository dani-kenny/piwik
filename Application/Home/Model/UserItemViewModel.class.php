<?php
namespace Home\Model;
use Think\Model\ViewModel;
class UserItemViewModel extends ViewModel{
	public $viewFields=array(
			'userinfo'=>array('uid','UserLogoutTS'=>'logoutTS'),			
	    	'useritem'=>array('ItemCount'=>'count','ItemID'=>'itemid','ItemPrototypeID'=>'heroid','ItemType'=>'type','IsFormation'=>'formation','_on'=>'userinfo.Uid=useritem.Uid'),
			'hero'=>array('DC'=>'ac','AC'=>'dc','Crit'=>'crit','HP'=>'HP','_on'=>'hero.Index=useritem.ItemPrototypeID')
	);
}
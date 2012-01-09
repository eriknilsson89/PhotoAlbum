<?php
class UsersRecord extends TActiveRecord
{
	const TABLE='users';
 
	public $ID;
	public $Username;
	public $Email;
	public $Password;
	public $Admin;
 
	public static function finder($className=__CLASS__)
	{
		return parent::finder($className);
	}

}
?>
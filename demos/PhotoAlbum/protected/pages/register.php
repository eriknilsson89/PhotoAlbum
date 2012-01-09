<?php

class Register extends TPage
{
	public function checkUsername($sender, $param)
	{
		$username = strtolower($this->Username->Text);
		$users = new UsersRecord;
		$finder = $users::finder();
		if(!$finder->findByUsername($username))
		{
			$param->IsValid = true;
		}
		else
			$param->IsValid = false;
		
	}
	public function checkEmail($sender, $param)
	{
		$users = new UsersRecord;
		$finder = $users::finder();
		if(!$finder->findByEmail($this->Email->Text))
		{
			$param->IsValid = true;
		}
		else
			$param->IsValid = false;
	}
	public function createUser($sender, $param)
	{
		if($this->isValid)
		{
			$user = new UsersRecord;
			$un = strtolower($this->Username->Text);
			$user->Username = $un;
			$user->Email = $this->Email->Text;
			$user->Password = md5($this->Password->Text);
			$user->Admin = false;
			$user->save();
		}
	}
}

?>
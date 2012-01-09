<?php
Prado::using('System.Security.IUserManager');
Prado::using('Application.Common.User');

/**
 * BlogUserManager class
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.pradosoft.com/
 * @copyright Copyright &copy; 2006 PradoSoft
 * @license http://www.pradosoft.com/license/
 */
class UserManager extends TModule implements IUserManager
{
	public function getGuestName()
	{
		return 'Guest';
	}

	/**
	 * Returns a user instance given the user name.
	 * @param string user name, null if it is a guest.
	 * @return TUser the user instance, null if the specified username is not in the user database.
	 */
	public function getUser($username=null)
	{
		if($username===null)
			return new User($this);
		else
		{
			$username=strtolower($username);
			$userRecord = new UsersRecord();
			
			if($userRecord->findByUsername($username) !== null)
			{
				$user=new User($this);
				$user->setID($userRecord->ID);
				$user->setName($username);
				$user->setIsGuest(false);
				
				return $user;
			}
			else
				return null;
		}
	}

	/**
	 * Validates if the username and password are correct.
	 * @param string user name
	 * @param string password
	 * @return boolean true if validation is successful, false otherwise.
	 */
	public function validateUser($username,$password)
	{
		$userRecord = new UsersRecord();
		if($userRecord->findByUsername($username)!==null)
			return $userRecord->Password===md5($password);
		else
			return false;
	}

	/**
	 * Saves user auth data into a cookie.
	 * @param THttpCookie the cookie to receive the user auth data.
	 * @since 3.1.1
	 */
	public function saveUserToCookie($cookie)
	{
		// do nothing since we don't support cookie-based auth in this example
	}

	/**
	 * Returns a user instance according to auth data stored in a cookie.
	 * @param THttpCookie the cookie storing user authentication information
	 * @return TUser the user instance generated based on the cookie auth data, null if the cookie does not have valid auth data.
	 * @since 3.1.1
	 */
	public function getUserFromCookie($cookie)
	{
		// do nothing since we don't support cookie-based auth in this example
		return null;
	}
}

?>
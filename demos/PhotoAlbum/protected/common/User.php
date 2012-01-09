<?php

Prado::using('System.Security.TDbUserManager');

class User extends TDbUser
{
    //Skapar en ny användare som blir inloggad
    public function createUser($username)
    {
        //kollar om användarnamnet finns
        $userRecord=UsersRecord::finder()->findByUsername($username);
        if($userRecord instanceof UsersRecord) // om användarnamnet finns
        {
            $user=new User($this->Manager);
            $user->Name=$username; 
            $user->Roles=($userRecord->Admin==1?'admin':'user'); // anger om användaren är admin eller vanlig användare
            $user->IsGuest=false;   // sätter att besökaren inte längre är gäst nu när den är inloggad
            return $user;
        }
        else
            return null;
    }

    //funktion som krävs för att TDbUser ska kunna användas. Kollar om det medskickade användarnamnet och lösenordet är valid
    public function validateUser($username,$password)
    {
        // use UserRecord Active Record to look for the (username, password) pair.
        return UsersRecord::finder()->findBy_username_AND_password($username,$password)!==null;
    }
 
    //kollar om användaren är admin eller ej
    public function getIsAdmin()
    {
        return $this->isInRole('admin');
    }
}


?>
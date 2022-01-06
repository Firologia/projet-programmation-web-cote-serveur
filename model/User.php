<?php

class User
{
    private $login;
    private $password;
    private $role;


    public function __construct(string $login, string $password, int $role){

        $this->login = $login;

        $this->password = $password;

        $this->role = $role;
    }

    /**
     * La fonction isAdmin vérifie si l'utilisateur est un admin
     * @return Return true if the User is an Admin, false if the user isn't an Admin
     */
    public function isAdmin() : bool{

        if ($this->role == 1) return true;
        if ($this->role == 2) return true;
        return false;
    }

    /**
     * @return bool true if the user is Super Admin or false if the user isn't.
     */

    public function isSuperAdmin() : bool{

        if ($this->role == 2) return true;
        return false;
    }

    /**
     * @return string role of the user.
     */

    public function userRole() : string {
        if ($this->role == 0) return 'Common User';
        if ($this->role == 1) return 'Admin';
        if ($this->role == 2) return 'Super Admin';
        return 'Error';
    }

    /**
     * @return string the login of the user
     */

    public function getLogin(): string{
        return $this->login;
    }
}
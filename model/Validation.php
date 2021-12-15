<?php

class Validation
{
    private $loginValidationPattern = '/^\p{Ll}{6}$/';
    private $mdpValidationPattern =  '/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/';

    public function validationLogin($login){
        return preg_match(self::$loginValidationPattern,$login);
    }

    public function validationMdp($mdp){
        return preg_match(self::$mdpValidationPattern, $mdp);
    }



}
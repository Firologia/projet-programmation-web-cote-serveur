<?php

class Validation
{
    private $loginValidationPattern = '/^\p{Ll}{6,}$/'; //le login est composé d'au moins 6 lettres
    private $mdpValidationPattern =  '/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/'; //le mdp est composé d'au moins 8 caractères, et d'au moins une minuscule, une majuscule, et un chiffre

    public static function validationLogin($login){
        return preg_match(self::$loginValidationPattern,$login);
    }

    public static function validationMdp($mdp){
        return preg_match(self::$mdpValidationPattern, $mdp);
    }



}
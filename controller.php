<?php

require_once 'config.php';
error_reporting(E_ERROR | E_PARSE);
session_start(); 
$DB = new fDatabase('mysql', DB_NAME, DB_USER, DB_PASS);
fORMDatabase::attach($DB);
define('DB', $DB);

class User extends fActiveRecord{


}

class Schedule extends fActiveRecord{


}

class Functions {

    public static function getLoggedPersonByEmail($email){
    		try{
    			$loggedUser = new User(array("email" => $email));
    			$loggedUserId = $loggedUser->getId();
    		} catch (fExpectedException $e) {
    		    echo $e->printMessage();
    		}
    		return $loggedUser;
    	}

    public static function logout(){
        $id = fSession::get('current_user_id');
        try {
            
            $user = new User($id);
            $user->setIsActive(0);
            $user->store();

        } catch (Exception $e) {
            
        }
    	fSession::destroy();
    	header('Location: index.php');
    }
    public static function getUsers(){
        try
        {   

            $users = fRecordSet::buildFromSQL('User', 'SELECT users.* FROM users');
            
        } catch (fExpectedException $e) 
        {
            echo $e->printMessage();
        }
        return $users;
    }
    public static function getUser($id){
        try{   
            $user = new User(array("id" => $id));
            
        } catch (fExpectedException $e) {
            echo $e->printMessage();
        }
        return $user;
    }    

    public static function printItems($folder, $only_html = false){
        if ($folder == 'students' || $folder == 'teachers') {
            $first_span = '4';
            $second_span = '8';
        } else {
            $first_span = '2';
            $second_span = '10';
        }
        $folder  = 'data/' . $folder . '/';
        $html    = '';
        foreach (scandir($folder) as $key => $value) {
            if ($value != '.' && $value != '..') {
                if (strstr($value, 'jpg') || strstr($value, 'png') || strstr($value, 'JPG') || strstr($value, 'PNG')) {
                    $html .= '<div class="row-fluid item" style="border-bottom: 2px dashed #9399ee; padding-bottom: 20px;">';
                    $html .= '    <div class="span' . $first_span . '">';
                    $html .= '        <img class="item_image" src="' . $folder . $value . '" />';
                    $html .= '    </div>';
                    $value = str_replace(array('jpg', 'png', 'JPG', 'PNG'), 'html', $value);
                    $html .= '    <div class="span' . $second_span . '">';
                    $html .=          file_get_contents($folder . $value); 
                    $html .= '    </div>';
                    $html .= '</div>';
                }

                if ($only_html && strstr($value, 'html')) {
                    $html .= '<div class="row-fluid item" style="border-bottom: 2px dashed #9399ee; padding-bottom: 20px;">';
                    $html .= '    <div class="span12">';
                    $html .=          file_get_contents($folder . $value); 
                    $html .= '    </div>';
                    $html .= '</div>';
                }
            } 
        }

        return $html;
    }

    public static function gradeWithWords($grade){
        switch (true) {
            case $grade >= 2 && $grade < 3:
                $grade = "Слаб";
                break;
            case $grade >= 3 && $grade < 3.5:
                $grade = "Задаволителен";
                break;
            case $grade >= 3.5 && $grade < 4.5:
                $grade = "Добър";
                break;
            case $grade >= 4.5 && $grade < 5.5:
                $grade = "Много добър";
                break;
            case $grade >= 5.5:
                $grade = "Отличен";
                break;
            default:
                $grade = $grade;
                break;
        }

        return $grade;
    }

    public static function fetchOriginalName($name){
        $names_data = explode(';',file_get_contents('data/names.txt'));
        foreach ($names_data as $data) {
            list($user_name, $orig_name) = explode('-', trim($data));
            if (ltrim(utf8_decode($user_name), '?') == utf8_decode($name)) {
                $name = $orig_name;
            }
        }
        return $name;
    }


}

?>
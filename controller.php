<?php

require_once 'config.php';
//fORMDatabase::attach(new fDatabase('mysql', 'ihriulr4_games_for_brains', 'ihriulr4', 'xYY!5eu5s:FQ'));
error_reporting(E_ERROR | E_PARSE);
session_start(); 

fORMDatabase::attach(new fDatabase('mysql', DB_NAME, DB_USER, DB_PASS));


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

    public static function printItems($folder){
        $folder  = 'data/' . $folder . '/';
        $html    = '';
        foreach (scandir($folder) as $key => $value) {
            if ($value != '.' && $value != '..') {
                if (strstr($value, 'jpg') || strstr($value, 'png') || strstr($value, 'JPG') || strstr($value, 'PNG')) {
                    $html .= '<div class="row-fluid item">';
                    $html .= '    <div class="span5">';
                    $html .= '        <img class="item_image" src="' . $folder . $value . '" />';
                    $html .= '    </div>';
                    $value = str_replace(array('jpg', 'png', 'JPG', 'PNG'), 'html', $value);
                    $html .= '    <div class="span7">';
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
                $grade = "Слаб (" . $grade . ")";
                break;
            case $grade > 3 && $grade < 3.5:
                $grade = "Среден (" . $grade . ")";
                break;
            case $grade >= 3.5 && $grade < 4.5:
                $grade = "Добър (" . $grade . ")";
                break;
            case $grade >= 4.5 && $grade < 5.5:
                $grade = "Много добър (" . $grade . ")";
                break;
            case $grade >= 5.5:
                $grade = "Отличен (" . $grade . ")";
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
            if ($user_name == $name) {
                $name = $orig_name;
            }
        }
        return $name;
    }


}

?>
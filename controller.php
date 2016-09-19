<?php

require_once 'config.php';
//fORMDatabase::attach(new fDatabase('mysql', 'ihriulr4_games_for_brains', 'ihriulr4', 'xYY!5eu5s:FQ'));

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
}

?>
<?php
require_once 'header.php';
?>
<div id="content">
<?php
if ($_POST) {
    if (isset($_POST['emaillog'])) {
        $pass = trim($_POST['pass']);
        $email = trim($_POST['emaillog']);
        fUTF8::clean($pass);
        fUTF8::clean($email);
        try {
            $user = new User(array('email' => $email));
            $user->setIsActive(1);
            $user->store();
            $passHash = $user->getPassword();
        } catch (fExpectedException $e) {
            echo $e->printMessage();
        }
        if (fCryptography::checkPasswordHash($pass, $passHash)) {
            fSession::open();
            fSession::set('current_user_id', $user->getId());
            fSession::set('current_user_name', $user->getUserName());
            if ($user->getId() == 1 || $user->getId() == 17 || $user->getId() == 9) {
                fSession::set('is_admin', true);
            } else {
                fSession::set('is_admin', false);
            }
            $_SESSION['isLogged'] = true;
        } else {
            echo 'Error in email or password';
        }
    }
}

if(isset($_SESSION['isLogged']) && $_SESSION['isLogged'] == true) { ?>
    E-бележник    
<?php } else { ?>
<h3 style="text-align: center;">Вход в Е-бележник</h3><br>
<div class="span12 pull-left" id="login" style="color:black;">
    <form method="POST" class="span12 row-fluid" style="padding-left: 7%;">
        <span class="span8">
            <span class="span6">
                <label>Име:</label><input type="text" id="emaillog" name="emaillog">
            </span>
            <span class="span6">
                <label>Парола:</label><input type="password" id="pass" name="pass">
            </span>
        </span>
        <span class="span1">
            <input type="submit" value="Вход">
        </span>
    </form>
</div>
<?php } ?>
</div>
<?php
require_once 'footer.php';
?>
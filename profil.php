<?php
include "src/User.php";
include "includes/header.php";

$user_display = new User();
$user_display->getAllInfos();



if(isset($_POST['supprimer'])){
    $user_delete = new User();
    $user_delete->delete();

}

if(isset($_POST['deconnexion'])) {
    $user_deconnexion = new User();
    $user_deconnexion->disconnect();
}

if(isset($_POST['modifier'])){
    $login = $_POST['login'];
    $password = $_POST['password'];
    $user_modification = new User();
    $user_modification->update($login, $password);
}

?>


<form method="POST">
    <table>
        <thead>
        <tr>
            <td>Login</td>
            <td>Password</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><input type="text" name="login" value="<?php echo $user_display->login; ?>"</td>
            <td><input type="text" name="password" value="<?php echo $user_display->password; ?>"</td>
        </tr>
        </tbody>

    </table>
    <button type="submit" value="modifier" name="modifier">Modifier</button>
    <button type="submit" value="deconnexion" name="deconnexion">Déconnexion</button>
    <button type="submit" value="supprimer" name="supprimer">Supprimer</button>
</form>



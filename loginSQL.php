<?php
    session_start();

    require "configSQL.php";

    if (isset($_POST['login'])) {
        if (logged($_POST['username'], $_POST['password'])) {
            $_SESSION['user'] = $_POST['username'];
        } else  {
            echo "Nome Utente o Password  errati!";
        }
    } else if (isset($_POST['changepsw'])) {
        $op = changepassword ($_SESSION['user'], $_POST['password']);
        if($op[0] == "OK"){
            echo "Password cambiata";
        } else {
            echo "Errore tecnico: " . $op[1];
        }
    }

    if (isset($_SESSION['user'])) {
        echo "<h2>Benvenuto! " . $_SESSION['user'] . "</h2>";
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> " method="post">
            <input type="password" name="password"/>
            <input type="submit" value="Cambia Password" name="changepsw"/>
        </form>
        <?php
    } else {
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <input type="text" name="username"/>
        <input type="password" name="password"/>
        <input type="submit" value="Login" name="login"/>
        </form>
        <?php
    }

    function logged($user, $psw){
        try{
            $conn = new PDO("mysql:host=" . $GLOBALS['dbhost'] . ";dbname=" . $GLOBALS['dbname'],
                            $GLOBALS['dbuser'], $GLOBALS['dbpassword']);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT name FROM Users WHERE name = ? and password = ?");
            $stmt->execute([$user, $psw]);

            //fetch ritorna un'unica riga
            $res = $stmt->fetch();

            return $res['name'] != null;

        } catch (PDOException $e){
            return false;
        }
    }

    function changepassword($user, $psw){
        try {
            $conn = new PDO("mysql:host=" . $GLOBALS['dbhost'] . ";dbname=" . $GLOBALS['dbname'],
                            $GLOBALS['dbuser'], $GLOBALS['dbpassword']);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("UPDATE Users SET password = ? WHERE name = ?");
            $stmt->execute([$psw, $user]);

            return array("OK");

        } catch (PDOException $e) {
            return array("KO", $e->getMessage());
        }
    }


?>
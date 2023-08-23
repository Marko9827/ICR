<?php

# Made by github.com/marko9827

namespace marko9827;

use \Exception;
use \mysqli;

session_start();

require_once "./vendor/autoload.php";


class ICR
{
    function __construct()
    {
    }

    function RUN()
    {
        if (!empty($_GET['q'])) {
            if ($_GET['q'] == "login_reg") {
                $this->login_reg_logout();
            }
        } else if (!empty($_GET['f'])) {

            if (!empty($_GET['u'])) {
                $path = __DIR__ . "/upload/user/cover_p$_GET[u].png";
            } else {
                $path = __DIR__ . "/upload/$_GET[f]";
            }
            if (file_exists($path)) {
                if (getimagesize($path)) {
                    header("content-type: image/png");
                    @readfile($path);
                }
            } else {
                if (!empty($_GET['u'])) {
                    $path = __DIR__ . "/upload/user/default.png";
                    if (getimagesize($path)) {
                        header("content-type: image/png");
                        @readfile($path);
                    }
                }
            }

            exit();
        } else {
            if (!empty($_GET['p'])) {
                $this->pageloader($_GET['p']);
            } else {
                $this->pageloader("home");
            }
        }
    }
    function isLoged()
    {
        $r = false;
        if (isset($_SESSION['user_id'])) {
            $r = true;
        }
        return $r;
    }
    function pginfo($f)
    {
    }

    function login_reg_logout()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if ($_POST['what'] == "login") {
                if (isset($_POST['email']) && isset($_POST['password'])) {
                    $sql =  $this->Query("SELECT * FROM user WHERE email = '$_POST[email]'");
                    if (mysqli_num_rows($sql) > 0) {
                        while ($row = mysqli_fetch_assoc(($sql))) {
                            if ($_POST['password'] == $row['password']) {
                                session_regenerate_id();

                                $_SESSION['user_id'] = $row['id'];
                            }
                        }
                        echo "YES";
                    }
                } else {
                    echo    "error";
                }
            } else if ($_POST['what'] == "logout") {
                session_destroy();
                echo "YES";
            } else if ($_POST['what'] == "ticked_add") {
                $id = time() * rand(0,999);
                $time = time();
                $ticked_d = $_POST['id'];
                $time_start = $_POST['start_r'];
                $time_end = $_POST['start_end'];
                $sql = $this->Query("INSERT INTO `rezerved` (`rezerved_id`, `user_id`, `time`, `flight_id`, `time_end`, `time_start`) VALUES 
                ('$id', '$_SESSION[user_id]', '$time', '$ticked_d', '$time_start', '$time_end');");
                
            if($sql){
                echo "YES";
            }
        } else if ($_POST['what'] == "reg") {
                if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
                    $id = time() * rand(0, 999999);
                    $sql = $this->Query("INSERT INTO  `user` 
                (`id`, `username`, `email`, `password`, `adress`, `phone`, `plane_best`, `login_history`, `admin`) VALUES 
                ('$id', 
                '$_POST[username]', 
                '$_POST[email]', 
                '$_POST[password]', 
                '$_POST[address]', 
                '$_POST[phone]', 
                '0', '0', '0');");
                    if (mysqli_num_rows($sql) > 0) {
                        $_SESSION['user_id'] = $id;
                        echo "YES";
                    }
                } else {
                    echo "FILL ALL FIELDS";
                }
            } else {
            }
        }
    }

    function config()
    {
        include dirname(__DIR__) . "/app/conf/db.php";

        $con = null;
        $date_conf = date('m/d/Y h:i:s A', time());
        try {
            $con = mysqli_connect(DB_SERVER, DB_username, DB_password, DB_DBname) or die(error_log("TIME : $date_conf. Message : Error to connect database : $db_name \n", 3, $_SERVER['DOCUMENT_ROOT'] . "/Include/logs/log_index_info.txt"));
        } catch (Exception $e) {
            die("");
            //  error_log("TIME : $date_conf. Message : " . $e->getMessage() . " \n", 3, $_SERVER['DOCUMENT_ROOT'] . "/Include/logs/log_index_info.txt");
        }



        return $con;
    }

    function Query($query)
    {

        $con = $this->config();

        try {

            $exec = mysqli_query($con, $query); // or die(LOG_F($con));
            if ($exec) {

                return $exec;
            }
        } catch (Exception $e) {
        }
        mysqli_close($con);
        return false;
    }
    function ticked_yes($id){
        $r = false;
        $sql =  $this->Query("SELECT * FROM rezerved WHERE flight_id = $id");
        if (mysqli_num_rows($sql) > 0) {
            $r = true;
        }
        return $r;
    }
    function ticked_add(){

    }
    function ticked_complete($id)
    {
        $sql =  $this->Query("SELECT * FROM rezerved WHERE flight_id = $id");
        if (mysqli_num_rows($sql) > 0) {
            
                echo '<rezerved><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512" style="
            fill: white !important;
            margin-right: 10px;
        "><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M381 114.9L186.1 41.8c-16.7-6.2-35.2-5.3-51.1 2.7L89.1 67.4C78 73 77.2 88.5 87.6 95.2l146.9 94.5L136 240 77.8 214.1c-8.7-3.9-18.8-3.7-27.3 .6L18.3 230.8c-9.3 4.7-11.8 16.8-5 24.7l73.1 85.3c6.1 7.1 15 11.2 24.3 11.2H248.4c5 0 9.9-1.2 14.3-3.4L535.6 212.2c46.5-23.3 82.5-63.3 100.8-112C645.9 75 627.2 48 600.2 48H542.8c-20.2 0-40.2 4.8-58.2 14L381 114.9zM0 480c0 17.7 14.3 32 32 32H608c17.7 0 32-14.3 32-32s-14.3-32-32-32H32c-17.7 0-32 14.3-32 32z"></path></svg>You have already booked a ticket</rezerved>';
             
        }
    }
    function getimage($id)
    {
        $path = __DIR__ . "/upload/flight_$id.png";

        return "data:image/png;base64," . base64_encode(file_get_contents($path));
    }
    function cuva_id($what)
    {
        $query = $this->Query("SELECT * FROM user WHERE user.id = $_SESSION[user_id]");

        $row = mysqli_fetch_assoc($query);

        return $row[$what];
    }
    function cuva_idf($what, $id)
    {
        $query = $this->Query("SELECT * FROM flights WHERE flights.flights_id = $id");

        $row = mysqli_fetch_assoc($query);

        return $row[$what];
    }
    function flights_card_fullinfo($sql, $f = false)
    {
        $return = null;
        $query = $this->Query($sql);
        if (mysqli_num_rows($query) > 0) {
            if ($f) {
                $return = $f;
            } else {
                while ($row = mysqli_fetch_assoc($query)) {
                    $sql2 = $this->Query("SELECT * FROM rezerved WHERE rezerved.flight_id = $row[flights_id]");
                    if(mysqli_num_rows($sql2) > 0){
                        $row2 = mysqli_fetch_assoc($sql2);
?>



                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <?php
                            echo $this->ticked_complete("$row[flights_id]");
                            ?>
                            <img class="classimage_height card-img-top" data-src="<?php
                                                                                    echo $this->getimage($row['flights_id']);
                                                                                    ?>" src="<?php
                                                                                                echo $this->getimage($row['flights_id']);
                                                                                                ?>" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text"><?php echo $row['name']; ?></p>
                                <div class="card_body_grid d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Flights</button>
                                        <a type="button" class="btn btn-sm btn-outline-secondary" href="<?php echo "./?p=ticket&what=edit&id=$row[flights_id]"; ?>"><i class="bi bi-pencil margin-right-10"></i>Edit</a>
                                    </div>
                                    <small style="text-align: left;" class="text-muted"><?php
                                                                echo "$row[time_flight] - $row[price]$";
                                                                ?></small>
                               <small style="text-align: left;" class="text-muted class-display-flex"><?php 
                               echo "<i class='bi bi-airplane form-label-rotate-90 margin-right-10'></i> Departure: $row[airport_a]<br>
                               </small><small style='text-align: left;' class='text-muted class-display-flex'>
                               <i class='bi bi-geo-alt-fill margin-right-10'></i> Destination: $row[airport_b] </small>
                               
                               <small style='text-align: left;' class='text-muted class-display-flex'>Time of departure: $row2[time_start]</small>
                               <small style='text-align: left;' class='text-muted class-display-flex'>Return time: $row2[time_end]</small>

                               ";
                        
                        
                        ?> 
                               
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
            } }
        }
        return $return;
    }
    function flights_card($sql, $f = false)
    {
        $return = null;
        $query = $this->Query($sql);
        if (mysqli_num_rows($query) > 0) {
            if ($f) {
                $return = $f;
            } else {
                while ($row = mysqli_fetch_assoc($query)) {

                ?>

                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow"> <?php
                            echo $this->ticked_complete("$row[flights_id]");
                            ?>
                            <img class="classimage_height card-img-top" data-src="<?php
                                                                                    echo $this->getimage($row['flights_id']);
                                                                                    ?>" src="<?php
                                                                                                echo $this->getimage($row['flights_id']);
                                                                                                ?>" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text"><?php echo $row['name']; ?></p>
                                <div class="card_body_grid d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Flights</button> -->
                                        <a type="button" class="btn btn-sm btn-outline-secondary" href="<?php echo "./?p=flight&id=$row[flights_id]"; ?>">Info</a>
                                        <?php if(!$this->ticked_yes($row['flights_id'])) { ?>
                                        <a class="btn btn-sm btn-primary btn-lg checked_disabled_chk"  type="button" href="./?p=checkout&id=<?php echo $row['flights_id'];  ?>"><i class="bi bi-airplane"></i> Book a ticket</a>
                                        <?php }  else {
                                            ?>
                                        <a type="button" class="btn btn-sm btn-outline-secondary" href="<?php echo "./?p=ticket&what=edit&id=$row[flights_id]"; ?>"><i class="bi bi-pencil margin-right-10"></i>Edit</a>

                                            <?php
                                            }?>
                                    </div>
                                    <small style="text-align: left;" class="text-muted"><?php
                                                                echo "$row[time_flight] - $row[price]$";
                                                                ?></small>
                               <small style="text-align: left;" class="text-muted class-display-flex"><?php 
                               echo "<i class='bi bi-airplane form-label-rotate-90 margin-right-10'></i> Departure: $row[airport_a]<br>
                               </small><small style='text-align: left;' class='text-muted class-display-flex'>
                               <i class='bi bi-airplane form-label-rotate-left margin-right-10'></i> Destination: $row[airport_b] </small>";
                               ?> 
                                </div>
                            </div>
                        </div>
                    </div>
<?php
                }
            }
        }
        return $return;
    }
    function menu_active($page)
    {
        $array = ["Home", "Journal", "Help"];
        $r = '';
        foreach ($array as $val) {
            if ($page == $val) {
                $r .= "<li><a href='./?p=$val' class='nav-link px-2 link-body-emphasis'>$val</a></li>";
            } else {
                $r .= "<li><a href='./?p=$val' class='nav-link px-2  link-secondary  '>$val</a></li>";
            }
        }
        return $r;
        /*
        <li><a href="./" class="nav-link px-2 link-secondary">Home</a></li>
        <li><a href="./?p=journal" class="nav-link px-2 link-body-emphasis">Journal</a></li>
        <li><a href="#" class="nav-link px-2 link-secondary">Help</a></li>
    */
    }
    function pageloader($page)
    {
        $this->include("components/header.php");

        $this->include("components/menu.php");
        $this->include("pages/$page.php");
        $this->include("components/footer.php");
    }

    function include($what, $check = false)
    {
        $path = __DIR__ . "/$what";

        if ($check) {
            $true = false;
            if (file_exists($path)) {
                return $true;
            }
        } else {
            include "$path";
        }
    }
}

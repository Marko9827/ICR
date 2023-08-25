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
    function recentison_and_comment_loader($fa)
    {
        $this->include("components/comments.php");
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
                $id = time() * rand(0, 999);
                $time = time();
                $ticked_d = $_POST['id'];
                $time_start = $_POST['start_r'];
                $time_end = $_POST['start_end'];
                $seats = $_POST['seats'];
                $sql = $this->Query("INSERT INTO `rezerved` (`seats`,`rezerved_id`, `user_id`, `time`, `flight_id`, `time_end`, `time_start`, `airport_a`) VALUES 
                ('$seats', '$id', '$_SESSION[user_id]', '$time', '$ticked_d', '$time_start', '$time_end', '$_POST[airport_a]');");


                if ($sql) {
                    echo "YES";
                }
            } else if ($_POST['what'] == "ticked_del") {
                $sql = $this->Query("UPDATE `icr`.`rezerved` SET `status` = '1' WHERE (`rezerved_id` = '$_POST[id]');");
                if ($sql) {
                    echo "YES";
                }
            } else if ($_POST['what'] == "class_review_title") {
                if ($_POST['hmm'] == "get_all") {
                    $this->recentison_and_comment_loader("$_POST[id]");
                }
                if ($_POST['hmm'] == "new_comment") {
                    $id = time() * rand(0, 999);
                    $time = time();
                    $sql = $this->Query("INSERT INTO `comments` 
                (`idcomments`, `text`, `user_id`, `post_id`, `time`, `score`) VALUES 
                ('$id', '$_POST[msg]', '$_SESSION[user_id]', '$_POST[id]','$time', '$_POST[score]');");


                    if ($sql) {
                        $this->recentison_and_comment_loader("$_POST[id]");
                    }
                }
            } else if ($_POST['what'] == "ticked_edit") {
                $id = time() * rand(0, 999);
                $time = time();
                $ticked_d = $_POST['id'];
                $time_start = $_POST['start_r'];
                $time_end = $_POST['start_end'];
                $seats = $_POST['seats'];
                // UPDATE `icr`.`rezerved` SET `time_end` = '2023-08-25', `time_start` = '2023-08-30', `airport_a` = '235a' WHERE (`rezerved_id` = '843027248400');

                $sql = $this->Query("UPDATE `rezerved` SET `seats` = '$seats' , `time_end` = '$time_end', `time_start` = '$time_start', `airport_a` = '$_POST[airport_a]' WHERE (`rezerved_id` = '$ticked_d');");

                if ($sql) {
                    echo "YES";
                }
            } else if ($_POST['what'] == "profile_edit") {
                $sql = $this->Query("UPDATE `user` SET 
                `username` = '$_POST[username]', 
                `surname` = '$_POST[surname]',
                `email` = '$_POST[email]',  
                `adress` = '$_POST[address]', 
                `phone` = '$_POST[phone]' WHERE (`id` = '$_SESSION[user_id]');");
                if ($sql) {


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
                    if ($sql) {
                        session_regenerate_id();

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
    function uploadFile($name, $FILE)
    {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
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
    function ticked_yes($id)
    {
        $r = false;
        $sql =  $this->Query("SELECT * FROM rezerved WHERE flight_id = $id  AND user_id = $_SESSION[user_id]");
        if (mysqli_num_rows($sql) > 0) {
            $r = true;
        }
        return $r;
    }
    function ticked_add()
    {
    }
    function ticked_complete($id)
    {
        $sql =  $this->Query("SELECT * FROM rezerved WHERE rezerved_id = $id AND user_id = $_SESSION[user_id]");
        if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
            if ($row['status'] == 0) { //predstojeci coming son
                echo '<rezerved data-ui="' . $row["status"] . '">   
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512" style="
            fill: white !important;
            margin-right: 10px;
        "><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M381 114.9L186.1 41.8c-16.7-6.2-35.2-5.3-51.1 2.7L89.1 67.4C78 73 77.2 88.5 87.6 95.2l146.9 94.5L136 240 77.8 214.1c-8.7-3.9-18.8-3.7-27.3 .6L18.3 230.8c-9.3 4.7-11.8 16.8-5 24.7l73.1 85.3c6.1 7.1 15 11.2 24.3 11.2H248.4c5 0 9.9-1.2 14.3-3.4L535.6 212.2c46.5-23.3 82.5-63.3 100.8-112C645.9 75 627.2 48 600.2 48H542.8c-20.2 0-40.2 4.8-58.2 14L381 114.9zM0 480c0 17.7 14.3 32 32 32H608c17.7 0 32-14.3 32-32s-14.3-32-32-32H32c-17.7 0-32 14.3-32 32z"></path></svg>You have already booked a ticket</rezerved>';
            }
            if ($row['status'] == 1) { //Canceled
                echo '<rezerved data-ui="' . $row["status"] . '">  <i style="
                fill: white !important;
                margin-right: 10px;" class="bi bi-trash"></i>Ticket canceled</rezerved>';
            }
            if ($row['status'] == 2) { // complete obaljvne
                echo '<rezerved data-ui="' . $row["status"] . '">  
               <i class="bi bi-check2-circle"  style="
               fill: white !important;
               margin-right: 10px;" ></i>The flight is done</rezerved>';
            }
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
    function cuva_idf_ticket($what, $id)
    {
        $query = $this->Query("SELECT * FROM rezerved WHERE rezerved.rezerved_id = $id");

        $row = mysqli_fetch_assoc($query);

        return $row[$what];
    }
    function count_raiting($id){
        $max = 0; 
        $count = 0;
        $swl = $this->Query("SELECT score, post_id FROM comments WHERE post_id = $id ORDER BY score");
        if(mysqli_num_rows($swl) > 0){
        while ($rowf = mysqli_fetch_assoc($swl)) {
            
            $max += $rowf['score'];// * ($count + 1);
            $count++;
            
        }
    }
    $c =  round($max / $count) | 0;
        return $c;
    }
    function flights_card_f($sql)
    {
        $sql2 = $this->Query($sql);
        if (mysqli_num_rows($sql2) > 0) {

            $score = 0;


            while ($row = mysqli_fetch_assoc($sql2)) {

                $score = $this->count_raiting($row["rezerved_id"]);
?>



                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <?php
                        echo $this->ticked_complete("$row[rezerved_id]");
                        ?>
                        <img class="classimage_height card-img-top" data-src="<?php
                                                                                echo $this->getimage($row['flight_id']);
                                                                                ?>" src="<?php
                                                                                            echo $this->getimage($row['flight_id']);
                                                                                            ?>" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text"><?php echo $row['name']; ?></p>
                            <div class="card_body_grid d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a type="button" class="btn btn-sm btn-outline-secondary" href="<?php echo "./?p=flight&id=$row[flight_id]"; ?>">Info</a>
                                    <?php

                                    if ($row['status'] == 0) { ?>
                                        <a type="button" class="btn btn-sm btn-outline-secondary" href="<?php echo "./?p=ticket&what=edit&id=$row[rezerved_id]"; ?>"><i class="bi bi-pencil margin-right-10"></i></a>
                                    <?php }

                                    echo '<a type="button" class="btn btn-sm btn-outline-secondary" onclick="ICR.ui.modal(\'class_review_title\',' . $row["rezerved_id"] . ')" ><i class="bi bi-chat-left-dots margin-right-10"></i> Reviews | <i class="bi bi-star-half margin-right-10"></i>' . $score . '</a>';

                                    ?>
                                </div>
                                <small style="text-align: left;" class="text-muted"><?php
                                                                                    echo "$row[time_start] - $row[time_end] | " . $this->cuva_idf("price", "$row[flight_id]") . "$";
                                                                                    ?></small>
                                <small style="text-align: left;" class="text-muted class-display-flex"><?php
                                                                                                        echo "<i class='bi bi-airplane form-label-rotate-90 margin-right-10'></i> Departure: $row[airport_a]
                   </small><small style='text-align: left;' class='text-muted class-display-flex'>
                   <i class='bi bi-geo-alt-fill margin-right-10'></i> Destination: " . $this->cuva_idf("name", "$row[flight_id]") . "</small>
                   
                   <small style='text-align: left;' class='text-muted class-display-flex'>Time of departure: $row[time_start]</small>
                   <small style='text-align: left;' class='text-muted class-display-flex'>Return time: $row[time_end]</small>

                   ";


                                                                                                        ?>

                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
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
                    $sql2 = $this->Query("SELECT * FROM rezerved WHERE rezerved.flight_id = $row[flights_id] AND rezerved.user_id = $_SESSION[user_id]");
                    if (mysqli_num_rows($sql2) > 0) {
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
                                            <a type="button" class="btn btn-sm btn-outline-secondary" href="<?php echo "./?p=flight&id=$row[flights_id]"; ?>">Info</a>
                                            <a type="button" class="btn btn-sm btn-outline-secondary" href="<?php echo "./?p=ticket&what=edit&id=$row[flights_id]"; ?>"><i class="bi bi-pencil margin-right-10"></i></a>
                                        </div>
                                        <small style="text-align: left;" class="text-muted"><?php
                                                                                            echo "$row[time_flight] - $row[price]$";
                                                                                            ?></small>
                                        <small style="text-align: left;" class="text-muted class-display-flex"><?php
                                                                                                                echo "<i class='bi bi-airplane form-label-rotate-90 margin-right-10'></i> Departure: $row[airport_a]
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
                }
            }
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
                        <div class="card mb-4 box-shadow">
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
                                        <a class="btn btn-sm btn-primary btn-lg checked_disabled_chk" type="button" href="./?p=checkout&id=<?php echo $row['flights_id'];  ?>"><i class="bi bi-airplane"></i> Book a ticket</a>

                                    </div>
                                    <small style="text-align: left;" class="text-muted"><?php
                                                                                        echo "$row[time_flight] - $row[price]$";
                                                                                        ?></small>
                                    <small style="text-align: left;" class="text-muted class-display-flex"><?php
                                                                                                            echo "<i class='bi bi-airplane form-label-rotate-90 margin-right-10'></i> Departure: $row[airport_a]
                       </small><small style='text-align: left;' class='text-muted class-display-flex'>
                       <i class='bi bi-airplane form-label-rotate-left margin-right-10'></i> Destination: $row[airport_b] </small>";
                                                                                                            ?>
                                </div>
                            </div>
                        </div>
                    </div><?php
                        }
                    }
                }
                return $return;
            }
            function menu_active($page)
            {
                $array = ["Home", "Journal"];
                $r = '';
                foreach ($array as $val) {
                    if ($page == $val) {
                        $r .= "<li><a href='./?p=$val' class='nav-link px-2 link-body-emphasis'>$val</a></li>";
                    } else {
                        $r .= "<li><a href='./?p=$val' class='nav-link px-2  link-secondary  '>$val</a></li>";
                    }
                }
                $r .= "<li><a onclick='ICR.chat.o(this);' class='nav-link px-2  link-secondary  '>Help</a></li>";

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

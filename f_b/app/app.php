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

    function RUN($r)
    {
        if (!empty($r)) {
            $this->pageloader($r);
        } else {
            $this->pageloader("home");
        }
    }

    function pginfo($f)
    {
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
    function getimage($id){
        $path = __DIR__ . "/upload/flight_$id.png";

        return "data:image/png;base64," . base64_encode(file_get_contents($path));

    }
    function flights_card($sql)
    {
        $query = $this->Query($sql);
        if (mysqli_num_rows($query) > 0) {

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
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Flights</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Info</button>
                                </div>
                                <small class="text-muted"><?php
                                                            echo "$row[time_flight] - $row[price]$";
                                                            ?></small>
                            </div>
                        </div>
                    </div>
                </div>
<?php
            }
        }
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
};

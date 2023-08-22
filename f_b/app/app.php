<?php

# Made by github.com/marko9827

namespace marko9827;

use \Exception;
use \mysqli;

require_once "./vendor/autoload.php";


class ICR
{
    function __construct()
    {

 
        if (!empty($_GET['p'])) {
            $this->pageloader($_GET['p']);
        }
    }



    function pageloader($page)
    {
        $this->include("components/header.php");
        $this->include("pages/$page.php");
        $this->include("components/footer.php");
    }

    function include($what, $check = false)
    {
        $path = "$_SERVER[DOCUMENT_ROOT]/app/$what";
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

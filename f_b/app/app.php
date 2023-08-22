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
        if (!empty($_GET['p'])) {
            $this->pageloader($_GET['p']);
        } else {
            $this->pageloader("home");
        }
    }

    function pginfo($f)
    {
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

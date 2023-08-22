<?php

# Made by github.com/marko9827

namespace ICR;

use \Exception;

class ICR
{
    public function __construct()
    {
    }


    function pageloader()
    {
    }

    function include($what, $check = false)
    {
        $path = "$_SERVER[DOCUMENT_ROOT]/$what";
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

<?php

class ErrorController
{
    private $file;

    private $codes = array(
        "100"   => "Error connection BD.",
        "101"   => "Error Construct Class - ",
        "201"   => "Error Creating on BD - ",
    );

    function __construct($code, $more = "", $e)
    {
        print $e;
        $this->file = fopen("../logs/". date("date('Y\-m\-d');") .".txt", "a+") or die ("Unable to open file");
        $txt = $code . " - " . $this->codes[$code] . " " . $more . " - " . $e . " - " . date('Y\-m\-d\- -G\-i\-s') . "\n" ;
        fwrite($this->file, $txt);
        fclose($this->file);
    }

}
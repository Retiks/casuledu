<?php
class Logger
{
    public static function write($severiter,$message)
    {

        $path = "../logs/log.json";
        $jsonread = file_get_contents($path);
        $jsondecode = (array) json_decode($jsonread, true);

        $nb = count($jsondecode);
if($nb == 0 || $nb == null || !file_exists($path) || !is_writable($path)){
    $jsondecode = array();
}

        $log = array( "".$nb ."" =>
            array(
                "Laseveriter" => $severiter,
                "date" => date("Y-m-d H:i:s"),
                "message" => $message,
                "IPV4" => $_SERVER['REMOTE_ADDR'],
            )
        );


        $merge = $jsondecode + $log;
        $jsonencode = json_encode($merge);
        file_put_contents($path, $jsonencode);

    }

    public static function error($message){
        self::write("Error",$message);
    }

    public static function warn($message){
        self::write("Warning",$message);
    }

    public static function info($message){
        self::write("Info",$message);
    }

    public static function debug($message){
        self::write("Debug",$message);
    }
}
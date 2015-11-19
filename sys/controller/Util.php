<?php
namespace sys\controller;

class Util 
{
    public static function tratarDataParaBanco( $data) {
        $nData = explode('/', $data);
        return $nData[2]."-".$nData[1]."-".$nData[0];
    }
}

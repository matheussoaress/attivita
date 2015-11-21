<?php

namespace sys\controller;

use sys\model\Status;
use sys\controller\Util;

class StatusController
{
	public static function listarStatus()
	{
		$estados = Status::find();
        foreach ($estados as $estado) {
            $info[] = array(
                'id' => $estado->getId(),
                'nome' => $estado->getNome(),
            );    
        }
        return $info;
	}
}
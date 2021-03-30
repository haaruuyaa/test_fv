<?php


namespace App\Contracts;


interface LogInterface
{
    public function startLog();

    public function endLog($response);
}

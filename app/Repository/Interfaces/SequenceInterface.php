<?php


namespace App\Repository\Interfaces;


use App\Model\Sequence;

interface SequenceInterface
{
    public function getSequence($table);

    public function updateSequence(Sequence $sequence);
}

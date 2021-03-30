<?php


namespace App\Repository;


use App\Model\Sequence;
use App\Repository\Interfaces\SequenceInterface;

class SequenceRepository implements SequenceInterface
{
    public function getSequence($table)
    {
        return Sequence::where('table_name',$table)->first();
    }

    public function updateSequence(Sequence $seq)
    {
        $seq->last_id++;
        $seq->update();
    }

}

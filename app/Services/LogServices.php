<?php


namespace App\Services;


use App\Contracts\LogInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogServices implements LogInterface
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function startLog()
    {
        Log::info('============= Incoming =============');
        Log::info($this->request->fullUrl());
        Log::info($this->request->getClientIp());
        Log::info($this->request->getMethod());
        Log::info($this->request->header('Content-Type'));
        Log::info($this->request->getContent());
    }

    public function endLog($response)
    {
        Log::info('============= Output =============');
        Log::info(json_encode($response,JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE));
    }

}

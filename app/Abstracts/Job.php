<?php
namespace App\Abstracts;

use App\Traits\Jobs;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Http\FormRequest;

abstract class Job implements ShouldQueue
{
    use Jobs, InteractsWithQueue, Queueable, SerializesModels;


    public function getFormRequest($request)
    {
        if (! is_array($request) ) {    
            return $request;
        }



        $class = new class() extends FormRequest {};


        return $class->merge($request);


    }
    
}

<?php

namespace App\Jobs\Users;

use App\Invoice;
use App\Abstracts\Job;


class CreateInvoice extends Job
{
    protected $user;

    protected $request;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $request)
    {
        $this->user = $user;
        $this->request = $this->getFormRequest($request);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $invoice = Invoice::create($this->request->all());

        return $invoice;
    }
}

<?php

namespace App\Jobs\Users;

use App\User;
use App\Abstracts\Job;


class CreateUser extends Job
{
    protected $user;

    protected $request;

    /**
     * Create a new job instance.
     *
     * @return $request
     */
    public function __construct($request)
    {
        $this->request = $this->getFormRequest($request);
    }

    /**
     * Execute the job.
     *
     * @return user
     */
    public function handle()
    {
        \DB::transaction(function () {
            $this->user = User::create($this->request->all());

            // // Upload picture
            // if ($this->request->file('picture')) {
            //     $media = $this->getMedia($this->request->file('picture'), 'users');

            //     $this->user->attachMedia($media, 'picture');
            // }
        });

        return $this->user;
    }
}

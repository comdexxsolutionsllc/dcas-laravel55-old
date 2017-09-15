<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $user;


    /**
     * SignIn a user to the application.
     * @param null $user
     * @return $this
     */
    public function signIn($user = null)
    {
        if (!$user) {
            $user = factory(User::class)->create();
        }

        $this->user = $user;

        $this->actingAs($this->user);

        return $this;
    }
}

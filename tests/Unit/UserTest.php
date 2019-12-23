<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCanCreateUser()
    {
        $user = factory(User::class)->make([
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
        ]);

        $this->assertEquals('Firstname', $user->firstname);
        $this->assertEquals('Lastname', $user->lastname);
    }
}

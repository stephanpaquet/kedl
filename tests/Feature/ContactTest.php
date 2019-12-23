<?php
namespace Tests\Feature\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Exceptions\Handler;
use Illuminate\Contracts\Debug\ExceptionHandler;

// @see https://medium.com/@DCzajkowski/testing-laravel-authentication-flow-573ea0a96318

class ContactTest extends TestCase
{
    use RefreshDatabase;

    public function testCanValidate()
    {
        $response = $this->post('/contact', [])
            ->assertSessionHasErrors('fullname')
            ->assertSessionHasErrors('email')
            ->assertSessionHasErrors('subject')
            ->assertSessionHasErrors('phone')
            ->assertSessionHasErrors('message');
        $this->assertEquals(302, $response->status());
    }

    public function testCanSentEmail()
    {
//        Session::start();

        $response = $this->post('/contact', [
            'fullname' => 'Stéphan Paquet',
            'email' => 'stephanpaquet@gmail.com',
            'subject' => 'Je vous contact pour ...',
            'phone' => '(123) 456-7891',
            'message' => 'Alors voici mon message',
        ]);

        $this->assertEquals(200, $response->status());
    }

}

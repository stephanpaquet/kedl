<?php
namespace Tests\Feature;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Exceptions\Handler;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

// @see https://medium.com/@DCzajkowski/testing-laravel-authentication-flow-573ea0a96318

class CheckoutTest extends TestCase
{
    use RefreshDatabase;

    public function testBasicTest()
    {
        $this->withoutExceptionHandling();

        //$response = $this->post('/roomview');

        //$response->assertStatus(200);
       // $response->dumpHeaders();

        //$response->dump();

        Storage::fake('avatars');

        $response = $this->json('POST', '/upload', [
            'file' => UploadedFile::fake()->image('avatar.jpg')
        ]);
        //sleep(1);

        //$response->assertStatus(200);
            // Assert the file was stored...
        //Storage::disk('avatars')->assertExists('avatar.jpg');

            // Assert a file does not exist...
        //Storage::disk('avatars')->assertMissing('missing.jpg');
    }
}

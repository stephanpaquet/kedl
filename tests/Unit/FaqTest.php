<?php

namespace Tests\Unit;

use App\Faq;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Generator as Faker;

class FaqTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCanCreateFaq()
    {
        $faq = factory(Faq::class)->create([
            'question' => 'Quelle est la couleur',
            'response' => 'Bleu',
        ]);

        $this->assertEquals('Quelle est la couleur', $faq->question);
        $this->assertEquals('Bleu', $faq->response);
    }

    public function testCanListFaq()
    {
        $faqs = [];

        $faqs[] = factory(Faq::class)->create();
        $faqs[] = factory(Faq::class)->create();

        $this->assertEquals(2, count($faqs));
        $this->assertEquals(2, Faq::all()->count());
    }

}

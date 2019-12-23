<?php

use Illuminate\Database\Seeder;

class FaqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faqs')->insert([
            'question' => 'Quel est le délai de production et de livraison?',
            'response' => 'Le délai de production varie de 5 à 7 jours ouvrables. Par la suite, la livraison peut prendre de 2 à 7 jours selon votre adresse de livraison.',
        ]);

        DB::table('faqs')->insert([
            'question' => 'Est-ce que je peux changer mon adresse de livraison?',
            'response' => 'Contactez-nous au 418-741-1100 ou au 866-554-8544.',
        ]);
    }
}

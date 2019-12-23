@extends('layouts.app')

@section('content')
<div class="container page-contact">
    <h1>{{ __('pages.contact_title') }}</h1>
    <section>
        <div>
            <p>
                Vous pouvez nous contacter en utilisant le formulaire ci-joint. Vous pouvez aussi vous rendre sur notre page FAQ (Foire aux questions) pour retrouver les questions et réponses les plus courantes.
            </p>
            <p>
                Si vous avez des questions spécifiques à votre commande, veuillez inclure votre numéro de facture que vous avez reçu lors de votre commande. SVP, nous inclure le plus d’informations possible.
            </p>
            <p>
                Notre service à la clientèle est disponible du lundi au vendredi de 8h30 à 17h00 (heure de l’Est). Nous nous efforçons de répondre le plus rapidement possible à vos courriels.
            </p>
            <p>
                Si vous préférez nous parler au téléphone, vous pouvez le faire au <a href="tel:4187411100">418-741-1100</a> ou au <a href="tel:4187411100">866-554-8544</a> .
            </p>
        </div>
        <div>
            <form action="/contact" method="post">
                @csrf
                First name: <input type="text" name="fname"><br>
                Last name: <input type="text" name="lname"><br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </section>
</div>
@endsection

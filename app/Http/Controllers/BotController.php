<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AjoutReponseBot;
use Illuminate\Support\Facades\Auth;
use App\Message;

class BotController extends Controller
{
    function reception_du_formulaire( AjoutReponseBot $request ) {

        /**
         * @todo Enregistrer le message de l'utilisateur dans la BDD
         */
        $message = $request->input('message');
        $entity = new Message;
        $entity->message = $message;
        $entity->user_id = Auth::id();
        $entity->save();

         /**
         * @todo Charger le json et le décodé.
         * Les prochaines lignes prennent pour acquis que ce
         * sera dans la variable $phrases
         */
        $phrases = [];


        $reponse = null;

        foreach ($phrases as $keyword => $phrase) {
            if (stripos($message, $keyword) !== false) {
                $reponse = $phrase;
                break;
            }
        }

        if ($reponse === null) {
            $reponse = "Je ne sais pas quoi répondre...";
        }

        /**
         * @todo Remplacer les informations entre [crochet] dans $reponse
         */

        /**
         * @todo Enregistrer $reponse dans la BDD
         */

        /**
         * @todo Redirection vers la page d'accueil
         */
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Phrase;

class PhrasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $texteJson = Storage::get('phrases.json');
        $phrases = json_decode($texteJson);

        foreach($phrases as $phrase) {
            $texte = new Phrase();
            $texte->phrases = $phrase;
            $texte->save();
        }
    }
}

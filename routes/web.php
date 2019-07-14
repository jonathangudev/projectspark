<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

if (Auth::user() && Auth::user()->subscribed()) {
    $subscribed = true;
} else {
    $subscribed = false;
}

Route::get('/', 'WelcomeController@show');

Route::get('/home', 'HomeController@show');

Route::get('/about', function () {
    return view('about');
});

Route::get('/premium', function () {
    return view('premium');
});


Route::get('/links', function () {
    return view('links');
});

Route::get('/lessons', function () {
    $premiumDialogueNumbers = [9, 11, 13, 15, 17, 19, 21, 23, 25];

    //if user is subscribed, never gate any premium lessons: all lessons will be available
    if (Auth::user() && Auth::user()->subscribed()) {
        $subscribed = true;
    } else {
        $subscribed = false;
    }
    return view('table_of_contents', ['premiumDialogueNumbers' => $premiumDialogueNumbers, 'subscribed' => $subscribed]);
});

Route::get('/toc', function () {
    return view('table_of_contents');
});

Route::get('/grammar', function () {
    return view('grammar_toc');
});


Route::get('/lessons/{dialogue_number}', function ($dialogue_number) {
    //Manually set which dialogues are premium
    $premiumDialogueNumbers = [9, 11, 13, 15, 17, 19, 21, 23, 25];

    //check if dialogue number is in the premium list
    if (in_array($dialogue_number, $premiumDialogueNumbers)) {
        $premiumGated = true;
    } else {
        $premiumGated = false;
    }

    //if user is subscribed, never gate any premium lessons: all lessons will be available
    if (Auth::user() && Auth::user()->subscribed()) {
        $premiumGated = false;
    }

    $lesson = new Lesson($dialogue_number);

    return view('lesson', [
        'dialogue_number'   => $dialogue_number,
        'lesson'            => $lesson,
        'premiumGated'      => $premiumGated,
    ]);
});

Route::get('/grammar/{grammar_topic}', function ($grammar_topic) {
    return view('grammar_lesson', [
        'grammar_topic' => $grammar_topic
    ]);
});
//end static pages


//blog routes

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/blog/2018/09/29/how-i-learned-ukrainian', function () {
    return view('blog.blog1');
})->name('blog-how-i');;

Route::get('/blog/2018/09/22/where-to-learn-ukrainian-in-lviv', function () {
    return view('blog.blog2');
})->name('blog-where-to');

Route::get('/blog/2018/09/15/how-to-learn-ukrainian-online', function () {
    return view('blog.blog3');
})->name('blog-how-to');



class Lesson
{

    //var language
    //var dialogue number
    //var text path
    //var language abbreviation code
    //var hasForeignScript

    public $language = "ukrainian";
    public $dialogue_number = 1;
    public $dialogue_index = "01";
    public $texts_path = "texts/";
    public $language_abbreviation_code = "uk";
    public $hasForeignScript = true;
    public $audio_path = "/audio/";


    function __construct($arg1)
    {
        $this->dialogue_number = $arg1;
    }

    //get DialogueIndex
    //args:
    function getIndexVersion($n)
    {
        if ($n > 9) {
            $index_value  = $n;
        } else {
            $index_value  = "0" . $n;
        }

        return $index_value;
    }


    //get Image Source
    function getImageSource()
    {
        $this->dialogue_index = $this->getIndexVersion($this->dialogue_number);
        return "/img/$this->dialogue_index.jpg";
    }

    //get GrammarText
    //args: dialogue number
    function getGrammarText()
    {

        $this->dialogue_index = $this->getIndexVersion($this->dialogue_number);

        $grammar_path   = $this->texts_path . "grammarexplanation" . $this->dialogue_index . ".txt";


        if (file_exists($grammar_path)) {
            $grammar_contents         = file_get_contents($grammar_path, true);
        } else {
            $grammar_contents = "<i>No grammar notes for this lesson.</i>";
        }

        return $grammar_contents;
    }


    //get Speaker
    //args:  dialogue number, row number
    function getSpeakers()
    {

        $this->dialogue_index = $this->getIndexVersion($this->dialogue_number);

        $speaker_path      = $this->texts_path . "speaker" . $this->dialogue_index . ".txt";

        $speaker         = file_get_contents($speaker_path, true);
        $speaker_total = explode("\n", $speaker);

        return $speaker_total;
    }

    //get English Language Dialogue
    //args: dialogue number, row number
    function getEnglishDialogue()
    {
        $this->dialogue_index = $this->getIndexVersion($this->dialogue_number);

        $english_path      = $this->texts_path . "englishphrases" . $this->dialogue_index . ".txt";

        $phrases_english       = file_get_contents($english_path, true);
        $phrases_english_total = explode("\n", $phrases_english);

        return $phrases_english_total;
    }

    //get Foreign Language Dialogue
    //args:  dialogue number, row number
    function getForeignDialogue()
    {
        $this->dialogue_index = $this->getIndexVersion($this->dialogue_number);

        $foreign_path    = $this->texts_path . $this->language . "phrases" . $this->dialogue_index . ".txt";

        $phrases_foreign       = file_get_contents($foreign_path, true);
        $phrases_foreign_total = explode("\n", $phrases_foreign);

        return $phrases_foreign_total;
    }

    //get Definitions array
    function getLiteralDefinitionsArray()
    {
        $this->dialogue_index = $this->getIndexVersion($this->dialogue_number);
        $literal_definitions_path     = $this->texts_path . "literaldefinitions" . $this->dialogue_index . ".txt";

        $literal         = file_get_contents($literal_definitions_path, true);
        $phrases_literal_definitions_total = explode("\n", $literal);

        return $phrases_literal_definitions_total;
    }

    //get Row Audio MP3
    //args:  dialogue number, row number
    function getAudio($row_number)
    {

        $this->dialogue_index = $this->getIndexVersion($this->dialogue_number);

        //adjust so that the first audio played is 01, instead of 00.
        $row_index = $this->getIndexVersion($row_number + 1);

        $ap = $this->audio_path . "dialogue-" . $this->language_abbreviation_code . "-" . $this->dialogue_index . "-" . $row_index . ".mp3";

        return $ap;
    }

    function buildAudioElement($link, $n)
    {

        echo "<a class='cursor-pointer' onclick='playAudio($n)'><img src='../../open-iconic-master/svg/play-circle.svg' height='20' width='20'></a>";

        echo "<audio preload class = 'songs'>";
        echo "<source src='$link' type='audio/mpeg' />";
        echo "</audio>";
    }

    //build TableRow
    //args:  dialogue number

    //build Table
    function buildTable()
    {

        $speaker_array = $this->getSpeakers();
        $english_array = $this->getEnglishDialogue();
        $foreign_array = $this->getForeignDialogue();
        $literal_definitions_array = $this->getLiteralDefinitionsArray();


        $numDialogueRows = count($foreign_array);

        for ($i = 0; $i < $numDialogueRows; $i++) {

            $audio_link = $this->getAudio($i);

            echo        "<tr> \n";
            echo "        <td><b>$speaker_array[$i]</b></td> \n";
            echo "        <td>";
            $this->buildForeignPhraseElement($foreign_array[$i], $literal_definitions_array[$i]);
            echo "</td> \n";
            echo "        <td>$english_array[$i]</td> \n";
            echo "        <td>";
            $this->buildAudioElement($audio_link, $i);
            echo "</td> \n";
            echo "      </tr> \n \n      ";
        }
    }

    function buildFullAudioElement()
    {
        //Build final play dialogue row
        $fullAudioLink = $this->getAudio(-1);
        echo "<div class='mb-3'><i><span class='mr-2 align-top'>Play full dialogue</span></i>";
        echo "<audio controls id='audio-all' class='audio-all'>";
        echo "<source src='$fullAudioLink' type='audio/mpeg' />";
        echo "</audio></div>";
    }


    function buildForeignPhraseElement($foreign_phrase, $literal_definitions)
    {

        $words_array = explode(" ", $foreign_phrase);

        //This line is intended to fix instances in the literaldefinitions.txt file where there are double spaces
        $phrases_literal_definitions_string_row = str_replace("  ", " ", $literal_definitions);

        $definitions_array = explode(" ", $phrases_literal_definitions_string_row);

        $word_index = 0;

        //Used to replace punctuation in the tooltip with empty space (cleans up how text will look in the tooltip)
        $punctuation = [",", ".", ";", "?", "!"];

        $phraseTransliterator = new TranslitUk();


        foreach ($words_array as $word) {
            $definition = $definitions_array[$word_index];

            //Transliteration of Ukrainian words (need to create this object to use transliterator function in the foreach loop)
            $transliteratedWord = $phraseTransliterator->convert($word);

            echo "<span class='foreign-word foreign-script' id='foreign-script'>$word <span  id = 'tooltip' class ='tooltip'> <span class='tooltip-foreign-word'>" . str_replace($punctuation, "", $word) . "</span><span>$definition</span></span></span> \n";
            echo "<span class='foreign-word english-script' id='english-script'>$transliteratedWord <span  id = 'tooltip' class ='tooltip'> <span class='tooltip-foreign-word'>" . str_replace($punctuation, "", $word) . "</span><span>$definition</span></span></span> \n";

            $word_index = $word_index + 1;
        }
    }

    function buildNextDialogueButton()
    {
        $next_dialogue_number = $this->dialogue_number + 1;
        echo "<a href='$next_dialogue_number' class='btn btn-info' id='next-lesson-button' >Next Lesson</a>";
    }


    function buildPreviousDialogueButton()
    {
        $previous_dialogue_number = $this->dialogue_number - 1;
        echo "<a href='$previous_dialogue_number' class='btn btn-info' id='next-lesson-button' >Previous Lesson</a>";
    }
}







//////////////////////////////////////////////////////
//
//  TRANSLITERATION
//
//////////////////////////////////////////////////////





////////////////////////////////////////////
//
//  UPDATE THIS LATER AND IMPLEMENT
//
////////////////////////////////////////////


//Transliteration of the grammar text
//$grammar_transliteration = new TranslitUk();
//$grammar_transliterated = $grammar_transliteration->convert($grammar);


///////////////////////////////////////////////////////
//
//  TRANSLITERATOR CODE
//
///////////////////////////////////////////////////////

class TranslitUk
{
    public $alphabet = array(
        // upper case
        'А' => 'A',     'Б' => 'B',     'В' => 'V',     'Г' => 'H',
        'ЗГ' => 'Zgh',  'Зг' => 'Zgh',  'Ґ' => 'G',     'Д' => 'D',
        'Е' => 'E',     'Є' => 'Ye',    'Ж' => 'Zh',    'З' => 'Z',
        'И' => 'Y',     'І' => 'I',     'Ї' => 'Yi',     'Й' => 'Y',
        'К' => 'K',     'Л' => 'L',     'М' => 'M',     'Н' => 'N',
        'О' => 'O',     'П' => 'P',     'Р' => 'R',     'С' => 'S',
        'Т' => 'T',     'У' => 'U',     'Ф' => 'F',     'Х' => 'X',
        'Ц' => 'Ts',    'Ч' => 'Ch',    'Ш' => 'Sh',    'Щ' => 'Shch',
        'Ь' => '',      'Ю' => 'Yu',    'Я' => 'Ya',    '’' => '',
        // lower case
        'а' => 'a',     'б' => 'b',     'в' => 'v',     'г' => 'h',
        'зг' => 'zgh',  'ґ' => 'g',     'д' => 'd',     'е' => 'e',
        'є' => 'ye',    'ж' => 'zh',    'з' => 'z',     'и' => 'y',
        'і' => 'i',     'ї' => 'yi',     'й' => 'y',     'к' => 'k',
        'л' => 'l',     'м' => 'm',     'н' => 'n',     'о' => 'o',
        'п' => 'p',     'р' => 'r',     'с' => 's',     'т' => 't',
        'у' => 'u',     'ф' => 'f',     'х' => 'x',    'ц' => 'ts',
        'ч' => 'ch',    'ш' => 'sh',    'щ' => 'shch',  'ь' => '',
        'ю' => 'yu',    'я' => 'ya',    '\'' => '',
    );
    public function convert($text)
    {
        return str_replace(
            array_keys($this->alphabet),
            array_values($this->alphabet),
            preg_replace(
                // use alternative variant at the beginning of a word
                array(
                    '/(?<=^|\s)Є/', '/(?<=^|\s)Ї/', '/(?<=^|\s)Й/',
                    '/(?<=^|\s)Ю/', '/(?<=^|\s)Я/', '/(?<=^|\s)є/',
                    '/(?<=^|\s)ї/', '/(?<=^|\s)й/', '/(?<=^|\s)ю/',
                    '/(?<=^|\s)я/',
                ),
                array(
                    'Ye', 'Yi', 'Y', 'Yu', 'Ya', 'ye', 'yi', 'y', 'yu', 'ya',
                ),
                $text
            )
        );
    }
}

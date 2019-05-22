@extends('spark::layouts.app')

@section('title')
Study Ukrainian - Grammar - <?php echo $grammar_topic; ?>
@endsection


@section('css')
<link href="css/extra-styles.css" rel="stylesheet">
@endsection


@section('content')
<home :user="user" inline-template>
    <div class="container">

        <?php



        $texts_path = "texts/";

        $grammar_path     = $texts_path . "grammartopic-" . $grammar_topic . ".txt";

        if (file_exists($grammar_path)) {
            $grammar_contents         = file_get_contents($grammar_path, true);
            echo $grammar_contents;
        } else {
            echo "There was an error $grammar_path";
        }


        ?>
    </div>
</home>
@endsection
@extends('layouts.layout')

@section('title')
 - Grammar - <?php echo $grammar_topic; ?>
@endsection


@section('css')
<link href="css/extra-styles.css" rel="stylesheet">
@endsection


@section('content')

<?php

$texts_path = "texts/";

$grammar_path 	= $texts_path."grammartopic-".$grammar_topic.".txt";

if (file_exists($grammar_path)) {
    $grammar_contents         = file_get_contents($grammar_path,true);
    echo $grammar_contents;
} else {
    echo "There was an error $grammar_path";
}


?>

@endsection
@extends('spark::layouts.app')

@section('title')
Study Ukrainian - Premium
@endsection


@section('css')
<link href="/css/extra-styles.css" rel="stylesheet">
@endsection


@section('content')
<home :user="user" inline-template>
    <div class="container">
        <div class="about-text">
            <h1 class="text-center"> Get Study Ukrainian Premium </h1>
            <div class="row justify-content-around">

                <div class="col-12 mt-4">
                    <h2>Study Ukrainian Premium comes with the following features:</h2>

                    <ul>
                        <li>
                            <h3>Full access to 25 lessons of the Ukrainian Language<h3>
                        </li>
                        <li>
                            <h3>Fully-voiced audio by native speakers<h3>
                        </li>
                        <li>
                            <h3>Grammar Explanations for each lesson<h3>
                        </li>
                    </ul>

                    <h3>Price: $3.99 per month</h3>

                </div>

            </div>

            <button class="button btn-primary btn-lg mt-4">Sign Up Now</button>

        </div>
    </div>
</home> @endsection
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name'))</title>

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-100622268-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-100622268-2');
    </script>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="css/sticky-footer-navbar.css" rel="stylesheet"> <!-- from: http://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/# -->

    <link href="/css/home.css" rel="stylesheet">
    <link href="/css/extra-styles.css" rel="stylesheet">

    <style>
        body,
        html {
            //background: url('/img/spark-bg.png');
            background-repeat: repeat;
            background-size: 300px 200px;
            height: 100%;
            margin: 0;
        }

        .full-height {
            min-height: 100%;
        }

        .flex-column {
            display: flex;
            flex-direction: column;
        }

        .flex-fill {
            flex: 1;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }


        .text-center {
            text-align: center;
        }

        .links {
            padding: 1em;
            text-align: right;
        }

        .links a {
            text-decoration: none;
        }

        .links button {
            background-color: #3097D1;
            border: 0;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            font-family: 'Open Sans', sans-serif;
            font-size: 14px;
            font-weight: 600;
            padding: 15px;
            text-transform: uppercase;
            width: 100px;
        }
    </style>
</head>

<body>
    <div class="full-height flex-column">

        <div class="">

            <!-- Fixed navbar -->
            <nav class="navbar navbar-expand navbar-light bg-white">

                <ul class="navbar-nav navbar-right  ml-auto align-items-end">

                    <li>
                        <a class="nav-link" href="/login">
                            <button class="btn btn-primary btn-sm"> Login</button>
                        </a></li>

                    <li>
                        <a class="nav-link" href="/premium">
                            <button class="btn btn-primary btn-sm"> Premium</button>
                        </a></li>

                    <li>
                        <a class="nav-link" href="/lessons">
                            <button class="btn btn-info btn-sm"> Free Lessons</button>
                        </a></li>


                </ul>
            </nav>

            <!-- Begin page content -->
            <main role="main" class="container mt-5">


                <div class="row mt-5">
                    <div class="col-sm-12 col-md-6 text-center">
                        <div>
                            <img class="img-fluid mx-auto" src="/img/logo.png"></img>
                        </div>
                        <div>
                            <img class="img-fluid" src="/img/ctp.jpg"></img>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6">

                        <div class="pt-5">
                            <h1 class="mb-md-3">The most complete resource for learning Ukrainian language online</h1>

                            <ul>
                                <li>Learn Ukrainian naturally by listening to dialogues.</li>
                                <li>Learn how to manage day-to-day situations in Ukrainian.</li>
                                <li>Full grammar explanations and word-for-word translations of all dialogues.</li>
                            </ul>

                            <div class="d-flex flex-row justify-content-around mt-3">
                                <a class="" href="/lessons">Lessons</a> |

                                <a class="" href="/grammar">Grammar</a> |

                                <a class="" href="/about">About</a> |

                                <a class="" href="/blog">Blog</a>
                            </div>

                        </div>

                    </div>

                    <hr class="mt-5 mb-5" style="width: 80%; color: black; height: 1px;" />

                    <blockquote class="blockquote col-sm-12 col-md-4">
                        <p class="testimonial-quotation mb-0 text-secondary">Thanks a lot for the website! My grandparents were born in Ukraine and came to Brazil. Now I am trying to learn the language in honor of them.</p>
                        <footer class="blockquote-footer">Derick</footer>
                    </blockquote>

                    <blockquote class="blockquote col-sm-12 col-md-4">
                        <p class="testimonial-quotation mb-0 text-secondary">Hello, I wish to say thank you on behalf of my teacher. You have a wonderful training resource and we use your site to teach me Ukrainian 3 days per week.</p>
                        <footer class="blockquote-footer">Alec</footer>
                    </blockquote>

                    <blockquote class="blockquote col-sm-12 col-md-4">
                        <p class="testimonial-quotation mb-0 text-secondary">I really like your method for teaching Ukrainian. I am living in Kiev, and it is very helpful to me.</p>
                        <footer class="blockquote-footer">Milad</footer>
                    </blockquote>

                </div>


            </main>

        </div>
    </div>
</body>

</html>
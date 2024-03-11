<!DOCTYPE html>
<html lang="">

<head>

    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    < <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Bootstrap Documentation Template For Software Developers">
        <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
        <link rel="shortcut icon" href="favicon.ico">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">

        <!-- FontAwesome JS-->
        <script defer src="assets/fontawesome/js/all.min.js"></script>
        <script src="assets/js/formulario.js"></script>


        <!-- Theme CSS -->
        <link id="theme-style" rel="stylesheet" href="assets/css/theme.css">

        <style>
            .Copyright {
                font-size: 12px;
                color: #000000;

            }

            .box {
                width: 55%;

                display: inline-block;
                margin-right: 0vw;
                font-size: 3vw;
                text-align: right;

            }

            body {
                color: #566787;
                /*   background: #f5f5f5; */
                background: #E0F8E0;
                font-family: 'Varela Round', sans-serif;
                font-size: 13px;
            }
        </style>

</head>

<body>
    <header class="header fixed-top">
        <div class="branding docs-branding">
            <div class="container-fluid position-relative py-2">
                <div class="docs-logo-wrapper">
                    <div class="site-logo">
                        <a class="navbar-brand" href="https://emescam.br/">
                            <img class="logo-icon me-2" src="assets/images/logo.png" alt="logo">
                            <span class="logo-text"></span>
                        </a>
                    </div>


                </div>
                <!--//docs-logo-wrapper-->
            </div>

            <!--//container-->
        </div>
        <!--//branding-->
        <br>
    </header>
    <!--//header-->

    <br><br>
    <h1 style="text-align: center">PROJETOS DE EXTENSÃO</h1>

    <!--//page-header-->
    <div class="page-content">
        <div class="container">

            <?php
            if (isset($_GET["page"])) {
                include($_GET["page"]);
            };
            ?>

        </div>
        <!--//container-->
    </div>
    <!--//container-->

    <footer class="footer">

        <div class="footer-bottom text-center py-5">

            <hr />
            <section class="Copyright">
                &copy; Copyright 2022 - EMESCAM - Escola superior de Ciências da Santa Casa de Misericórida de Vitória - Av. N. S. da Penha, 2190, Santa Luiza - Vitória - ES - 29045-402 - Tel (27) 3334-3500
            </section>
            <br>
            <ul class="social-list list-unstyled pb-4 mb-0">
                <li class="list-inline-item"><a href="https://twitter.com/emescames"><i class="fab fa-twitter fa-fw fa-1x"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-product-hunt fa-fw fa-1x"></i></a></li>
                <li class="list-inline-item"><a href="https://www.facebook.com/EmescamES"><i class="fab fa-facebook-f fa-fw fa-1x"></i></a></li>
                <li class="list-inline-item"><a href="https://www.instagram.com/emescames/"><i class="fab fa-instagram fa-fw fa-1x"></i></a></li>
            </ul>
            <!--//social-list-->


        </div>

    </footer>

    <!-- Javascript -->
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Page Specific JS -->
    <script src="assets/plugins/smoothscroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/highlight.min.js"></script>
    <script src="assets/js/highlight-custom.js"></script>
    <script src="assets/plugins/simplelightbox/simple-lightbox.min.js"></script>
    <script src="assets/plugins/gumshoe/gumshoe.polyfills.min.js"></script>
    <script src="assets/js/docs.js"></script>

</body>

</html>
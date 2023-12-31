<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Journals</title>
    <meta name="description" content="">
    <script src="themekit/scripts/jquery.min.js"></script>
    <script src="themekit/scripts/main.js"></script>
    <link rel="stylesheet" href="themekit/css/bootstrap-grid.css">
    <link rel="stylesheet" href="themekit/css/style.css">
    <link rel="stylesheet" href="themekit/css/glide.css">
    <link rel="stylesheet" href="themekit/css/magnific-popup.css">
    <link rel="stylesheet" href="themekit/css/content-box.css">
    <link rel="stylesheet" href="themekit/css/contact-form.css">
    <link rel="stylesheet" href="themekit/css/media-box.css">
    <link rel="icon" href="media/favicon.png">
</head>
<body>

<div id="preloader"></div>


<nav class="header">
    <div class="logo">
        <img src="assets/img/ispsc_logo.png" alt="ISPSC Logo">
    </div>
    <div class="header__text">
        <h3>Ilocos Sur Polytechnic State College</h3>
        <p>Tagudin, Ilocos Sur</p>
    </div>
</nav>

<nav class="menu-classic" data-menu-anima="fade-in">
    <div class="container">
        <i class="menu-btn"></i>
        <div class="menu-cnt">
            <ul id="main-menu">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a href="about.html">About Library</a>
                </li>
                <li class="dropdown">
                    <a href="#">E-Resources</a>
                    <ul>
                        <li><a href="e-books.html">E-Books</a></li>
                        <li><a href="e-journals.php">E-Journals</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Research Abstracts</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<header class="header-image ken-burn-center" data-parallax="true" data-natural-height="1080" data-natural-width="1920" data-bleed="0" data-image-src="media/hd-empty.png" data-offset="0">
    <div class="container">
        <h1>E-Journals</h1>
        <h2>It feels good to be lost in the right direction</h2>
    </div>
</header>
<main>
    <section class="section-base">
        <div class="container">
                <div id="journals_view"></div>
            </div>
    </section>
</main>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h3>Blueprint</h3>
                <p>A blueprint is a reproduction of a technical drawing using a contact print process on light-sensitive sheets. The process allowed rapid production of an unlimited copies.</p>
            </div>
            <div class="col-lg-4">
                <h3>Contacts</h3>
                <ul class="icon-list icon-line">
                    <li>The world wide web</li>
                    <li>support@schiocco.com</li>
                    <li>02 123 333 444</li>
                </ul>
            </div>
            <div class="col-lg-4">
                <div class="icon-links icon-social icon-links-grid">
                    <a class="facebook"><i class="icon-facebook"></i></a>
                    <a class="twitter"><i class="icon-twitter"></i></a>
                    <a class="instagram"><i class="icon-instagram"></i></a>
                    <a class="google"><i class="icon-google"></i></a>
                </div>
                <hr class="space-sm" />
                <p>Subscribe to our newsletter of follow us on the social channels to stay tuned.</p>
            </div>
        </div>
    </div>
    <div class="footer-bar">
        <div class="container">
            <span>© 2019 Blueprint - White label template handmade by <a href="https://schiocco.com" target="_blank">schiocco.com</a>.</span>
            <span><a href="#">Contact us</a> | <a href="#">Privacy policy</a></span>
        </div>
    </div>
    <link rel="stylesheet" href="themekit/media/icons/iconsmind/line-icons.min.css">
    <script src="themekit/scripts/parallax.min.js"></script>
    <script src="themekit/scripts/isotope.min.js"></script>
    <script>
     $(document).ready(function() {

         function generateTemplate(res){

           var template = '<div class="maso-item">';
             template += '   <div class="cnt-box cnt-box-top boxed">';
             template += '      <a href="'+ res.url +'" class="img-box"><img src="'+ res.imageurl +'"  style="width: 100%; height: 10%; object-fit: cover;" alt=""/></a>';
             template += '       <div class="caption">';
             template += '            <h2>'+ res.journalname +'</h2>';
             template += '            <p>'+ res.description +'</p>';
             template += '   </div>';
             template += '  </div>';
             template += '</div>';
             return template;

         }
         function initJournalTable() {
             $.ajax({
                 type: 'POST',
                 url: 'config/Ajax.php',
                 data: {
                     action: 'fetchJournals'
                 },
                 success: function (res) {
                     var data = JSON.parse(res);
                     var $output = '';
                     $output += '<div class="maso-list gap-30" data-columns="3" data-columns-lg="2" data-columns-sm="1">';
                     $output += '<div class="maso-box">';
                     for (var i = 0; i < data.journal.length; i++) {
                         $output += generateTemplate(data.journal[i]);
                     }
                     $output += '</div>';
                     $output += '</div>';

                     $("#journals_view").append($output);
                 }

             })
         }

         initJournalTable();
     })
    </script>
</footer>
</body>
</html>
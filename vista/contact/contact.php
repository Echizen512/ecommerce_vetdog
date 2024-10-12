<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">
    <title>Vetdog - Tienda de productos para tu mascota</title>
    <link rel="shortcut icon" href="../../assets/img/ico.png" type="image/x-icon" />
    <link href="../../../fonts.googleapis.com/css467e.css?family=Muli:300,400,400i,600,700,800%7CWork+Sans:300,400,500,600,700,800" rel="stylesheet">
    <link href="../../assets/css/vendor.css" rel="stylesheet">
    <link href="../../assets/css/style.css" rel="stylesheet">
</head>
<body>

<?php 
include '../Includes/Header.php'; 
include '../Includes/Aside.php';
?>

    <main>
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../tiendaonline">Home</a></li>
                                    
                                    <li class="breadcrumb-item active" aria-current="page">Contactanos</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="contact-area pt-40 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-message">
                            <h2>cuéntanos tu proyecto</h2>
                            <form id="contact-form" action="../../../external.html?link=https://template.hasthemes.com/ostromi/ostromi/assets/php/mail.php" method="post" class="contact-form">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="first_name" placeholder="Name *" type="text" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="phone" placeholder="Phone *" type="text" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="email_address" placeholder="Email *" type="text" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="contact_subject" placeholder="Subject *" type="text">
                                    </div>
                                    <div class="col-12">
                                        <div class="contact2-textarea text-center">
                                            <textarea placeholder="Message *" name="message" class="form-control2" required=""></textarea>
                                        </div>
                                        <div class="contact-btn">
                                            <button class="btn btn-outline" type="submit">Send Message</button>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-center">
                                        <p class="form-messege"></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-info">
                            <h2>Contactanos</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <ul>
                                <li><i class="fa fa-fax"></i> Address : No 40 Baria Sreet 133/2 Peru</li>
                                <li><i class="fa fa-phone"></i> vetdog@gmail.com</li>
                                <li><i class="fa fa-envelope-o"></i> +51 999999999</li>
                            </ul>
                            <div class="working-time">
                                <h3>Horas Laborales</h3>
                                <p><span>Lunes – Sabados:</span>08AM – 20PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php include '../Includes/Footer.php'; ?>

    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>

    <script src="../../assets/js/vendor.js"></script>
    <script src="../../assets/js/active.js"></script>
</body>
</html>
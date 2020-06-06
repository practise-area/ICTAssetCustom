<?php
   require(__DIR__.'/func/config.php');
 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>West Pokot County | Asset Manager</title>
    <link href="front/css/bootstrap.min.css" rel="stylesheet">
    <link href="front/css/font-awesome.min.css" rel="stylesheet">
    <link href="front/css/prettyPhoto.css" rel="stylesheet">
    <link href="front/css/main.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="front/images/ico/favicon1.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="front/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="front/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="front/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="front/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body data-spy="scroll" data-target="#navbar" data-offset="0">
    <header id="header" role="banner">
        <div class="container">
            <div id="navbar" class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- <a class="navbar-brand" href="index"></a> -->
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#main-slider"><i class="icon-home"></i></a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#about-us">About Us</a></li>
                        <li><a href="#login"><?php if( $user->is_logged_in() ){ echo "My Account"; }else{{ echo "Login"; } } ?></a></li>
                        <li><a href="#contact">Contact</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </header><!--/#header-->

    <section id="main-slider" class="carousel">
        <div class="carousel-inner">
            <div class="item active">
                <div class="container">
                    <div class="carousel-content">
                        <h1>West Pokot County Asset Manager</h1>
                        <p class="lead">Manage your asset information easily for free with us</p>
                    </div>
                </div>
            </div><!--/.item-->
            <div class="item">
                <div class="container">
                    <div class="carousel-content">
                          <h1>West Pokot County Asset Manager</h1>
                        <p class="lead">Access your information easily, from anywhere</p>
                    </div>
                </div>
            </div><!--/.item-->
        </div><!--/.carousel-inner-->
        <a class="prev" href="#main-slider" data-slide="prev"><i class="icon-angle-left"></i></a>
        <a class="next" href="#main-slider" data-slide="next"><i class="icon-angle-right"></i></a>
    </section><!--/#main-slider-->

    <section id="services">
        <div class="container">
            <div class="box first">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="center">
                            <i class="icon-desktop icon-md icon-color1"></i>
                            <h4>Assets</h4>
                            <p>Focus on your company as a whole instead of individual assets. Use our software to keep tabs on your assets. Make a detailed log of equipment check-out, create an unlimited number of custom fields, and download our Excel template. Upload it to start managing your assets in minutes. </p>
                        </div>
                    </div><!--/.col-md-4-->
                    <div class="col-md-4 col-sm-6">
                        <div class="center">
                            <i class="icon-thumbs-up icon-md icon-color2"></i>
                            <h4>Reports</h4>
                            <p>View predefined reports which include statements about your assets to help clean up your workload. Add information about status, depreciation, maintenance, check-out times, and more. Save and reuse an unlimited number of custom reports to get the most out of your data</p>
                        </div>
                    </div><!--/.col-md-4-->
                    <div class="col-md-4 col-sm-6">
                        <div class="center">
                            <i class="icon-windows icon-md icon-color3"></i>
                            <h4>Alerts</h4>
                            <p>Set reminders and alarms for assets that require regular maintenance, assets that are past due, contracts and licenses that are about to expire, and many others features. Avoid risks and handle problems before they impact your network.</p>
                        </div>
                    </div><!--/.col-md-4-->
                    <div class="col-md-12 col-sm-6">
                        <div class="center">
                            <i class="icon-user icon-md icon-color4"></i>
                            <h4>Users</h4>
                            <p>Add as many users as you need for your accounts. Make your system as mead, or as narrow, as you need. Each user has a unique level of access ranging from a limited viewer to full administrator. Our system is a convenient solution for everyone in your organization. </p>
                        </div>
                    </div><!--/.col-md-4-->
                </div><!--/.row-->
            </div><!--/.box-->
        </div><!--/.container-->
    </section><!--/#services-->

    <section id="about-us">
        <div class="container">
            <div class="box">
                <div class="center">
                    <h2>Meet the Team</h2>
                    <p class="lead">Order your tags today and benefit from our design technology, easy-to-customize system, and friendly customer service team. You can count on us for secure, affordable, and user-friendly service.<br> We're continually improving our quality products, so you can experience a better way to organize your assets. </p>
                </div>
                <div class="gap"></div>
                <div id="team-scroller" class="carousel scale">
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="member">
                                        <p><img class="img-responsive img-thumbnail img-circle" src="front/images/me.jpg" alt="" ></p>
                                        <h3>Senior Admin<small class="designation">Senior Admin</small></h3>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="member">
                                        <p><img class="img-responsive img-thumbnail img-circle" src="front/images/me.jpg" alt="" ></p>
                                        <h3>Senior Admin<small class="designation">Junior Admin</small></h3>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="member">
                                        <p><img class="img-responsive img-thumbnail img-circle" src="front/images/me.jpg" alt="" ></p>
                                        <h3>Senior Admin<small class="designation">Office User</small></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                          <div class="row">
                              <div class="col-sm-4">
                                  <div class="member">
                                      <p><img class="img-responsive img-thumbnail img-circle" src="front/images/me.jpg" alt="" ></p>
                                      <h3>Senior Admin<small class="designation">Senior Admin</small></h3>
                                  </div>
                              </div>
                              <div class="col-sm-4">
                                  <div class="member">
                                      <p><img class="img-responsive img-thumbnail img-circle" src="front/images/me.jpg" alt="" ></p>
                                      <h3>Senior Admin<small class="designation">Junior Admin</small></h3>
                                  </div>
                              </div>
                              <div class="col-sm-4">
                                  <div class="member">
                                      <p><img class="img-responsive img-thumbnail img-circle" src="front/images/me.jpg" alt="" ></p>
                                      <h3>Senior Admin<small class="designation">Office User</small></h3>
                                  </div>
                              </div>
                          </div>
                        </div>
                    </div>
                    <a class="left-arrow" href="#team-scroller" data-slide="prev">
                        <i class="icon-angle-left icon-4x"></i>
                    </a>
                    <a class="right-arrow" href="#team-scroller" data-slide="next">
                        <i class="icon-angle-right icon-4x"></i>
                    </a>
                </div><!--/.carousel-->
            </div><!--/.box-->
        </div><!--/.container-->
    </section><!--/#about-us-->

    <section id="login">
        <div class="container">
            <div class="box">
                <div class="center">
                    <h2>Welcome to Asset Manager</h2>
                    <p class="lead">Click <a href="login">here</a> to get started</p>
                </div><!--/.center-->
                <div class="big-gap"></div>
            </div>
        </div>
    </section><!--/#login-->

    <section id="contact">
        <div class="container">
            <div class="box last">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Contact Form</h1>
                        <p>Fill out the form below and submit to us we will get back in touch with you</p>
                        <div class="status alert alert-success" style="display: none"></div>
                        <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php" role="form">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" required="required" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" required="required" placeholder="Email address">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Message"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger btn-lg">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><!--/.col-sm-6-->
                    <div class="col-sm-6">
                        <h1>Our Address</h1>
                        <div class="row">
                            <div class="col-md-6">
                                <address>
                                    <strong>West Pokot County Government</strong><br>
                                    P.O. Box 222 - 30600, Kapenguria<br>

                                    <br>
                                    EMAIL: info@westpokot.go.ke<br>
                                    <abbr title="Phone">TEL:</abbr>: 0532014000
                                </address>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                        <h1>Connect with us</h1>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="social">
                                    <li><a href="http://facebook.com/westpokotcounty"><i class="icon-facebook icon-social"></i> Facebook</a></li>
                                    <li><a href="http://plus.google.com/westpokotcounty"><i class="icon-google-plus icon-social"></i> Google Plus</a></li>
                                    <li><a href="http://twitter.com/westpokotcounty"><i class="icon-twitter icon-social"></i> Twitter</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="social">
                                    <li><a href="http://linkedin.com/westpokotcounty"><i class="icon-linkedin icon-social"></i> Linkedin</a></li>

                                </ul>
                            </div>
                        </div>
                    </div><!--/.col-sm-6-->
                </div><!--/.row-->
            </div><!--/.box-->
        </div><!--/.container-->
    </section><!--/#contact-->

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; <?php echo date('Y'); ?>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <!-- <img class="pull-right" src="front/images/shapebootstrap.png" alt="ShapeBootstrap" title="ShapeBootstrap"> -->
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="front/js/jquery.js"></script>
    <script src="front/js/bootstrap.min.js"></script>
    <script src="front/js/jquery.isotope.min.js"></script>
    <script src="front/js/jquery.prettyPhoto.js"></script>
    <script src="front/js/main.js"></script>
</body>
</html>

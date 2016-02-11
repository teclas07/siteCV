<!DOCTYPE html>
<html>
  <head>
    <title>Romain MARGHERITI</title>
    <!-- Compiled and minified CSS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
   <!-- personal css -->
   <link rel="stylesheet" href="style.css">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <!-- Compiled and minified JavaScript -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
   <script>
     jQuery(document).ready(function(){
     	jQuery('.skillbar').each(function(){
     		jQuery(this).find('.skillbar-bar').animate({
     			width:jQuery(this).attr('data-percent')
     		},6000);
     	});
    });
  </script>
  </head>
  <body>
    <header>
      <nav>
        <div class="nav-wrapper light-blue darken-3">
          <ul id="nav-mobile" class="center hide-on-med-and-down">
            <li><a href="index.html">Index</a></li>
            <li><a href="blog.php">Blog</a></li>
            <?php
              if (isset($_SESSION['user'])) {
            ?>
                <li><a href="accout.php"><?php echo($_SESSION['User']->getLogin())?></a><?php echo($_SESSION['User']->getLogin())?></li>
            <?php
              }
            ?>
          </ul>
        </div>
      </nav>
    </header>

    <main>
      <div class="row">

        <div id="leftSide" class="col s3 light-blue lighten-1">
          <div id="statu" class="center-align">
            <img src="images/marghe_r.jpg" alt="" class="circle responsive-img z-depth-4" height="150" width="150" style="margin-top:10px"> <!-- notice the "circle" class -->
            <h4 style="color:white">Romain Margheriti</h4>
            <h5 style="color:white">Programmer</h5>
          </div>

          <div id="me" class="left-align">
            <div id="profil">
              <h5><i class="material-icons">face</i>PROFILE</h5>
              <p>
                Saepissime igitur mihi de amicitia cogitanti maxime illud considerandum videri solet,
                utrum propter imbecillitatem atque inopiam desiderata sit amicitia, ut dandis recipiendisque
                meritis quod quisque minus per se ipse posset, id acciperet ab alio vicissimque redderet.
              </p>
            </div>
            <div id="objectifs">
              <h5><i class="material-icons">flight_takeoff</i>OBJECTIVE</h5>
              <p>
                Saepissime igitur mihi de amicitia cogitanti maxime illud considerandum videri solet,
                utrum propter imbecillitatem atque inopiam desiderata sit amicitia, ut dandis recipiendisque
                meritis quod quisque minus per se ipse posset, id acciperet ab alio vicissimque redderet.
              </p>
            </div>
            <div id="skills">
              <h5><i class="medium material-icons">flash_on</i>PERSONAL SKILLS</h5>

              <div class="skillbar clearfix " data-percent="40%">
              	<div class="skillbar-title" style="background: #46465e;"><span>PHP</span></div>
              	<div class="skillbar-bar" style="background: #5a68a5;"></div>
              	<div class="skill-bar-percent">40%</div>
              </div> <!-- End Skill Bar -->

              <div class="skillbar clearfix " data-percent="75%">
              	<div class="skillbar-title" style="background: #333333;"><span>Wordpress</span></div>
              	<div class="skillbar-bar" style="background: #525252;"></div>
              	<div class="skill-bar-percent">75%</div>
              </div> <!-- End Skill Bar -->

              <div class="skillbar clearfix " data-percent="100%">
              	<div class="skillbar-title" style="background: #27ae60;"><span>SEO</span></div>
              	<div class="skillbar-bar" style="background: #2ecc71;"></div>
              	<div class="skill-bar-percent">100%</div>
              </div> <!-- End Skill Bar -->

              <div class="skillbar clearfix " data-percent="70%">
              	<div class="skillbar-title" style="background: #124e8c;"><span>Photoshop</span></div>
              	<div class="skillbar-bar" style="background: #4288d0;"></div>
              	<div class="skill-bar-percent">70%</div>
              </div> <!-- End Skill Bar -->

              <div id="aboutMe">
                <h5><i class="medium material-icons">email</i>CONTACT ME</h5>
                <p>
                  Saepissime igitur mihi de amicitia cogitanti maxime illud considerandum videri solet,
                  utrum propter imbecillitatem atque inopiam desiderata sit amicitia, ut dandis recipiendisque
                  meritis quod quisque minus per se ipse posset, id acciperet ab alio vicissimque redderet.
              </p>
            </div>
            </div>
        </div>
        </div>

        <div id="rightSide" class="col s6">

          <div id="education">
            <h4><i class="material-icons">school</i>EDUCATION</h4>
            <div clas="row" id="content">
              <div class="col s1" id="year">November</div>
              <div class="col s11" id="title">Master</div>

              <div class="col s1 center-align" id="month">2014</div>
              <div class="col s11" id="palce">Marseille</div>

              <div class="col s11 offset-s1">eazndjziuohr ajrrza ruzaerha</div>
            </div>
          </div>

          <div id="work">
            <h4><i class="material-icons">work</i>EXPERIENCES</h4>
            <div clas="row" id="content">
              <div class="col s1" id="year">November</div>
              <div class="col s11" id="title">Master</div>

              <div class="col s1 center-align" id="month">2014</div>
              <div class="col s11" id="palce">Marseille</div>

              <div class="col s11 offset-s1">eazndjziuohr ajrrza ruzaerha</div>
            </div>
          </div>

          <div id="professionalskills">
            <h4 style="color:"><i class="material-icons">flight_takeoff</i>PROFESSIONAL SKILLS</h4>
            <div id="content">
              <div class="skillbar clearfix " data-percent="40%">
                <div class="skillbar-title" style="background: #46465e;"><span>PHP</span></div>
                <div class="skillbar-bar" style="background: #5a68a5;"></div>
                <div class="skill-bar-percent">40%</div>
              </div> <!-- End Skill Bar -->

              <div class="skillbar clearfix " data-percent="75%">
                <div class="skillbar-title" style="background: #333333;"><span>Wordpress</span></div>
                <div class="skillbar-bar" style="background: #525252;"></div>
                <div class="skill-bar-percent">75%</div>
              </div> <!-- End Skill Bar -->

              <div class="skillbar clearfix " data-percent="100%">
                <div class="skillbar-title" style="background: #27ae60;"><span>SEO</span></div>
                <div class="skillbar-bar" style="background: #2ecc71;"></div>
                <div class="skill-bar-percent">100%</div>
              </div> <!-- End Skill Bar -->

              <div class="skillbar clearfix " data-percent="70%">
                <div class="skillbar-title" style="background: #124e8c;"><span>Photoshop</span></div>
                <div class="skillbar-bar" style="background: #4288d0;"></div>
                <div class="skill-bar-percent">70%</div>
              </div> <!-- End Skill Bar -->
            </div>
          </div>

          <div id="award">
            <h4><i class="material-icons">school</i>AWARD</h4>
            <div clas="row" id="content">
              <div class="col s1" id="year">November</div>
              <div class="col s11" id="title">Master</div>

              <div class="col s1 center-align" id="month">2014</div>
              <div class="col s11" id="palce">Marseille</div>

              <div class="col s11 offset-s1">eazndjziuohr ajrrza ruzaerha</div>
            </div>
          </div>
        </div>

        <div id="socialBar" class="col s2 offset-s1">

          <div id="twitterIntegration" style="margin-top:20px;">
            <a class="twitter-timeline" href="https://twitter.com/Rowm1n" data-widget-id="693082880604553216">Tweets de @Rowm1n</a>
              <script>!function(d,s,id) {
                var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
                if(!d.getElementById(id)) {
                  js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";
                  fjs.parentNode.insertBefore(js,fjs);
                }
              }
              (document,"script","twitter-wjs");
            </script>
          </div>
        </div>
      </div>
    </main>
    <footer>
      <footer class="page-footer light-blue darken-3">
        <div class="container">
          <div class="row">
            <div class="col l6 s12">
              <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
              © 2014 Copyright Text
              <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
          </footer>
    </footer>




  </body>
  </html>
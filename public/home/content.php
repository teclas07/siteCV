<main>
  <div id="content" class="row">

    <div id="left_side" class="col s3 light-blue lighten-1" style="color:white;">
      <div id="profile" class="center-align">
        <?php include('left/profile.php') ?>
      </div>
      <!-- ./profile -->
      <div id="me">
        <?php include('left/about_me.php') ?>
      </div>
      <!-- ./me -->
      <div id="goals">
        <?php include('left/goals.php') ?>
      </div>
      <!-- ./goals-->
      <div id="skills">
        <?php include('left/skills.php') ?>
      </div>
      <!-- ./skills-->
      <div id="contact_me">
        <?php include('left/informations.php') ?>
      </div>
      <!-- ./contact_me -->
    </div>
    <!-- ./left_side -->

    <div id="center" class="col s6">
  	   <div id="education">
         <?php include('center/education.php') ?>
       </div>
       <!-- ./education -->
       <div id="work_experiences">
         <?php include('center/work_experiences.php') ?>
       </div>
       <!-- ./works_experiences -->
       <div id="professional_skills">
         <?php include('center/professional_skills.php') ?>
       </div>
       <!-- ./professional_skills -->
       <div id="awards">
         <?php include('center/awards.php') ?>
       </div>
       <!-- ./awards -->
    </div>
    <!-- ./center_side -->
    <div class="col s3" id="social_bar">
      <?php include('center/social/twitter.php') ?>
    </div>
    <!-- ./social_bar -->
  </div>
  <!-- ./row -->
</main>

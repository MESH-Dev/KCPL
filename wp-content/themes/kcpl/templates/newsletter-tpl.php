<?php /* Template Name: Newsletter */ ?>

<?php get_header();
global $post;
$pID = KCPL_get_highest_ancestor($post);
$sidebar = KCPL_get_sidebar($pID);
$color = get_field('section_color',$pID);

?>


<?php if(have_posts()){while(have_posts()){the_post(); ?>

<div id="banner" class="KCPL_background-blue">
  <div class="container">
      <div class="gutter">
        <div id="searchResults">
          <span>Newsletter</span>
        </div>
      </div>
  </div>
</div>

<div id="content">
  <div class="container">
    <?php include_once(locate_template('partials/module-sidebar-nav.php')); ?>

    <div class="columns eight omega" id="contentPrimary">
      <div class="column eight alpha omega">

        <?php include_once(locate_template('partials/module-content-topcallout.php')); ?>
      </div>

      <div class="columns eight alpha omega">

        <?php include_once(locate_template('partials/module-content-8column.php')); ?>
      </div>

      <?php $rightSidebar = get_field('page_sidebar');
            $rsCount = count($rightSidebar); ?>

      <div class="columns page-content <?php if($rsCount != 0){echo 'six';}else{echo 'eight omega';} ?> alpha">
        <div class="gutter">
          <h2>Sign up for our newsletter</h2>

          <div id="newsletter">

            <form method="post" action="https://app.icontact.com/icp/signup.php" name="icpsignup" id="icpsignup7457" accept-charset="UTF-8" onsubmit="return verifyRequired7457();" >
            <input type="hidden" name="redirect" value="http://www.icontact.com/www/signup/thanks.html">
            <input type="hidden" name="errorredirect" value="http://www.icontact.com/www/signup/error.html">


                    <input type="text" name="fields_email" placeholder="Email address*">

                    <input type="text" name="fields_fname" placeholder="First name*">

                    <input type="text" name="fields_lname" placeholder="Last name*">

                    <input type="text" name="fields_address1" placeholder="Address">

                    <input type="text" name="fields_city" placeholder="City">

                    <input type="text" name="fields_state" placeholder="State">

                    <input type="text" name="fields_zip" placeholder="Zip">

                    <input type="checkbox" id="fields_adult" name="fields_adult"> <label for="fields_adult">Adult 18 - 50</label><br/>

                    <input type="checkbox" id="fields_child" name="fields_child"> <label for="fields_child">Child 12 & under</label><br/>

                    <input type="checkbox" id="fields_senior" name="fields_senior"> <label for="fields_senior">Senior 50+</label><br/>

                    <input type="checkbox" id="fields_teen" name="fields_teen"> <label for="fields_teen">Teen 12 - 18</label><br/>

                    <input type="hidden" name="listid" value="84233">
                    <input type="hidden" name="specialid:84233" value="IKBD">

                    <input type="hidden" name="clientid" value="484167">
                    <input type="hidden" name="formid" value="7457">
                    <input type="hidden" name="reallistid" value="1">
                    <input type="hidden" name="doubleopt" value="0">

                    <input type="submit" name="Submit" value="Submit"></td>

            </form>
          </div>

          <script type="text/javascript">

          var icpForm7457 = document.getElementById('icpsignup7457');

          if (document.location.protocol === "https:")

          	icpForm7457.action = "https://app.icontact.com/icp/signup.php";

            function verifyRequired7457() {
              if (icpForm7457["fields_email"].value == "") {
                icpForm7457["fields_email"].focus();
                alert("The Email field is required.");
                return false;
              }
              if (icpForm7457["fields_fname"].value == "") {
                icpForm7457["fields_fname"].focus();
                alert("The First Name field is required.");
                return false;
              }
              if (icpForm7457["fields_lname"].value == "") {
                icpForm7457["fields_lname"].focus();
                alert("The Last Name field is required.");
                return false;
              }

              return true;
            }

          </script>

        </div>
      </div>

      <?php if($rsCount != 0){ ?>

        <div class="columns two omega">
          <?php include_once(locate_template('partials/module-content-page-sidebar.php')); ?>
        </div>

      <?php } ?>

    </div>

  </div>
</div>

<?php } } ?>

<?php get_footer(); ?>

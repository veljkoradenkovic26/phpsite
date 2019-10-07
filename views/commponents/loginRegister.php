<div class="content">
<div class="form">

      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>

      <div class="tab-content">
        <div id="signup">
          <h1>Sign Up for Free</h1>

          <form action="register.php" method="post">

          <div class="top-row">
            <div class="field-wrap">
              <label>
First Name<span class="req">*</span>
              </label>
              <input type="text" name="fname" style="height:100%;width:100%" id="fname" required autocomplete="off" />
            </div>

            <div class="field-wrap">
              <label>
Last Name<span class="req">*</span>
              </label>
              <input type="text" name="lname" style="height:100%;width:100%" id="lname" required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
Email Address<span class="req">*</span>
            </label>
            <input type="email" style="height:100%;width:100%" name="email" id="email" required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
Set A Password<span class="req">*</span>
            </label>
            <input type="password" style="height:100%;width:100%" name="password" id="password" required autocomplete="off"/>
          </div>

          <button type="submit" name="register" class="button button-block"/>Get Started</button>

          </form>

        </div>

        <div id="login">
          <h1>Welcome Back!</h1>

          <form action="login.php" method="post">

            <div class="field-wrap">
            <label>
Email Address<span class="req">*</span>
            </label>
            <input type="email" style="height:100%;width:100%" name="email"required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
Password<span class="req">*</span>
            </label>
            <input type="password" style="height:100%;width:100%" name="password"required autocomplete="off"/>
          </div>

          <p class="forgot"><a href="#">Forgot Password?</a></p>

          <input type="submit" name="login" class="button button-block"/>Log In</button>

          </form>

        </div>

      </div><!-- tab-content -->
    <?php if(isset($_SESSION['greske'])){
        foreach($_SESSION['greske'] as $g){
            echo $g;
            echo '</br>';
        }
        unset($_SESSION['greske']);
    }?>
    <?php if(isset($_SESSION['greska'])){
        echo $_SESSION['greska'];
        unset($_SESSION['greska']);
    }?>

</div> <!-- /form -->
</div>
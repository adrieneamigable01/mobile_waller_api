<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        

        <div class="wrapper fadeInDown">
          <div id="formContent" class="p-5">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
              <img class="img-responsive" src="<?php echo base_url().'/assets/img/ico.png'?>" id="icon" alt="User Icon" style="width:100px" />
              <h3 class="text-muted bolder">POS Login</h3>
            </div>

            <!-- Login Form -->
              <form class="user" id="frm_login">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="usernameHelp" placeholder="Enter Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                </div>
                <!-- <div class="form-group">
                  <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="customCheck">
                    <label class="custom-control-label" for="customCheck">Remember Me</label>
                  </div>
                </div> -->
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Login
                </button>
              </form>
          </div>
    </div>

      </div>

    </div>

  </div>
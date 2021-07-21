<body style="background:#F5FFFA">

<div class="login">  
  <div id="card">
    <div id="card-content">
      <div id="card-title">
        <h2 class="login-title">LOGIN</h2>
          <div class="login-underline"></div>

            <form method="POST" action="<?=base_url()?>auth/proseslogin" class="form-login">
            <label for="user-username" style="padding-top:13px">&nbsp;Username</label>
            <input class="form-content-login" type="text"  name="username" id="username" value="<?= set_value('username'); ?>">
            <div class="form-border-login"></div>
            <label for="user-password" style="padding-top:22px">&nbsp;Password</label>
            <input class="form-content-login" name="password" id="password" type="password"> 
            <div class="form-border-login"></div>
            <input id="submit-btn-login" type="submit" value="Login">
            </form>

      </div>   
    </div> 
  </div>
</body>
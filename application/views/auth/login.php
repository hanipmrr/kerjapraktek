<body style="background-image: url(<?= base_url('assets/img/bg/bg6.jpg');?>)">

<div class="login">  
  <div id="card">
    <div id="card-content">
      <div id="card-title">
        <h2 class="text-2xl text-yellow-200 flex justify-center">LOGIN</h2>
          <div class="login-underline"></div>

            <form method="POST" action="<?=base_url()?>auth/proseslogin" class="form-login">
                <label for="user-username" style="padding-top:13px">&nbsp;Username</label>
                <input class="px-2 w-full border-b-2 border-green-500 border-t-0 border-l-0 border-r-0 focus:ring-green-500 focus:border-green-500 block w-60 shadow-sm sm:text-sm border-gray-300 rounded-md bg-white" type="text"  name="username" id="username" value="<?= set_value('username'); ?>">
                <!-- <div class="form-border-login"></div> -->
                <label for="user-password" style="padding-top:22px">&nbsp;Password</label>
                <input class="px-2 w-full border-b-2 border-green-500 border-t-0 border-l-0 border-r-0 focus:ring-green-500 focus:border-green-500 block w-60 shadow-sm sm:text-sm border-gray-300 rounded-md bg-white" name="password" id="password" type="password"> 
                <!-- <div class="form-border-login"></div> -->
                <input id="submit-btn-login" type="submit" value="Login">
            </form>

      </div>   
    </div> 
  </div>
</body>
<?php $this->layout('layout_app', ['title' => 'Welcome to PHP Test!']) ?>
<?php $this->start('form') ?>
<div class=" m-0 row justify-content-center">
    <div class="shadow p-3 mb-5 bg-body rounded col-sm-8 col-md-5 col-lg-5 col-xl-5">
    <div id="msnResp"></div>
    <div>
      <div class="mb-3">
        <label class="form-label">Email address</label>
        <input type="email" class="form-control" id="userEmail" placeholder="Please enter your email address" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" id="userPass" placeholder="Please enter your email password" required>
      </div>

      <button class="btn btn-primary" id="sub_log">Login</button>
  </div>
  </div>
  </div>
  <?php $this->end() ?>
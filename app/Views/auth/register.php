<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-6">
          <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                </div>
                <form class="user">
                  <div class="form-group row">
                    <div class="col mb-3 mb-sm-0">
                      <input
                        type="text"
                        class="form-control form-control-user"
                        name="username"
                        placeholder="Username" />
                    </div>
                  </div>
                  <div class="form-group">
                    <input
                      type="email"
                      class="form-control form-control-user"
                      name="email"
                      placeholder="Email Address" />
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input
                        type="password"
                        class="form-control form-control-user"
                        name="password"
                        placeholder="Password" />
                    </div>
                    <div class="col-sm-6">
                      <input
                        type="password"
                        class="form-control form-control-user"
                        id="exampleRepeatPassword"
                        placeholder="Repeat Password" />
                    </div>
                  </div>
                  <a
                    href="login.html"
                    class="btn btn-primary btn-user btn-block">
                    Register Account
                  </a>
                </form>
                <hr />
                <div class="text-center">
                  <a class="small" href="forgot-password.html"
                    >Forgot Password?</a
                  >
                </div>
                <div class="text-center">
                  <a class="small" href="<?= base_url('login') ?>"
                    >Already have an account? Login!</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        </div>
    </div>
  <?= $this->endSection() ?>

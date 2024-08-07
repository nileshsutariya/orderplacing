<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <style>
    .register-box {
      width: 400px;
      margin: auto;
    }
    .register-card-body {
      padding: 30px;
    }
    .form-group {
      margin-bottom: 1rem;
    }
    .input-group-text {
      width: 42px;
    }
  </style>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Admin</b>LTE</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new party</p>

      <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control" placeholder="Name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="address" class="form-control" placeholder="Address" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-map-marker-alt"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="input-group mb-3">
              <input type="text" name="gst_number" class="form-control" placeholder="GST Number" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-id-card"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-group mb-3">
              <input type="text" name="pan_number" class="form-control" placeholder="PAN Number" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-id-card"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="input-group mb-3">
              <input type="password" name="password" class="form-control" placeholder="Password" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-group mb-3">
              <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
                I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </div>
        </div>
      </form>

      <a href="{{ route('login') }}" class="text-center">Login</a>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
</body>
</html>

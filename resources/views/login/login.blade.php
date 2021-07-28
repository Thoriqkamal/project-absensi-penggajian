@if(session()->has('nama'))
{{session()->has('nama')}}
<script>window.location = "/jadwal";</script>
@endif
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <form id="form_login">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                    </div>
                    <form class="user">
                      <div class="form-group">
                        <input type="email" class="form-control form-control-user" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="InputPassword" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                          <input type="checkbox" class="custom-control-input" id="customCheck">
                          <label class="custom-control-label" for="customCheck">Remember Me</label>
                        </div>
                      </div>
                      <!-- <input type="submit" href="#" class="btn btn-primary btn-user btn-block btn-login" value="LOGIN"> -->
                      <button type="submit" class="btn btn-primary btn-user btn-block btn-login">
                        <img class="loader_image" src="" alt="" srcset=""><p class="text-login">Login</p></button>
                      <hr>
                    </form>
                    <div class="row">
                      <div class="col-6">
                        <div class="text-center">
                          <a class="small" href="{{ url('/') }}">Forgot Password?</a>
                        </div>
                      </div>
                      <div class="col-6">
                      <div class="text-center">
                        <a class="small" href="{{ url('/register')}}">Create an Account!</a>
                      </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }} "></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

  <script>
    // keadaan default
    let loader_image = document.querySelector('.loader_image');
    let text_login = document.querySelector('.text-login');
    text_login.style.margin = '0px';

    loader_image.style.display = 'none';
    // event ketika tombol login di klik
    let form_login = document.getElementById('form_login');

    form_login.addEventListener('submit', function(e){
      let email = e.srcElement[0].value;
      let password = e.srcElement[1].value;
      console.log(`email : ${email} & pass : ${password}`);

      // let loader_image = document.querySelector('.loader_image');
      text_login.style.display = 'none';
      loader_image.src = "{{ asset('loader/loader.gif')}}";
      loader_image.style.display = 'inline-block';

      setTimeout(() => {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type    : 'POST',
            url     : "{{url('/ajax_login')}}",
            data    : {email: email, password : password},
            // dataType: 'json',
            success: function(data){
                console.log(data);
                if(data.success == 1){
                    if(email == 'bendahara@gmail.com'){
                      window.location.href="{{url('/penggajian')}}";
                    }else if(email == 'kasiekbang@gmail.com'){
                      window.location.href="{{url('/rekap_absen')}}";
                    }else{
                      window.location.href="{{url('/rekap_absen')}}";
                    }
                }

            },
            error: function(){
                console.log('error');

            }
        });
      }, 2000);

      e.preventDefault();
    });
  </script>

</body>

</html>

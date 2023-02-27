<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login </title>
    <link rel="stylesheet" href="{{asset('assets/css/main/app.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/pages/auth.css')}}" />
    <link
      rel="shortcut icon"
      href="{{asset('assets/images/logo/favicon.svg')}}"
      type="image/x-icon"
    />
    <link
      rel="shortcut icon"
      href="{{asset('assets/images/logo/favicon.png')}}"
      type="image/png"
    />
  </head>

  <body>
    <div class="row mt-5">
      <div class="col-4 mx-auto">
        <div class="card border">
          <div class="card-header bg-primary ">
            <div class="card-title">
              <h3 class="text-white"><i class="bi bi-door-open"></i> Login</h3>
            </div>
          </div>
          <div class="card-body p-4 bg-light">
            <form action="/auth/login" method="post">
              @csrf
              <div class="form-group row mt-2">
                <label for="" class="col-3">Email</label>
                <div class="col-9">
                  <input
                    type="text"
                    name="email"
                    class="form-control"
                    placeholder="Email"
                  />
                </div>
              </div>
              <div class="form-group row mt-2">
                <label for="" class="col-3">Password</label>
                <div class="col-9">
                  <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Password"
                  />
                </div>
              </div>
              <div class="form-group row mt-2">
                <label for="" class="col-3"></label>
                <div class="col-9">
                  <button type="submit" class="btn btn-primary w-100"><i class="bi bi-door-open"></i> Login</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

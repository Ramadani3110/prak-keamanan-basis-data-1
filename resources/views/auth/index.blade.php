<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />

    <title>Login</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


</head>

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Gudangin Aja</h1>
                            <p class="lead">
                                Log in to your account to continue
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <form action="/auth" method="post" id="cap">
                                    @csrf
                                    <div class="m-sm-3">
                                        <form>
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input class="form-control form-control-lg" type="email" name="email"
                                                    placeholder="Enter your email" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Password</label>
                                                <input class="form-control form-control-lg" type="password"
                                                    name="password" placeholder="Enter your password" />
                                            </div>
                                            <div class="mb-3">
                                                <div class="g-recaptcha"
                                                    data-sitekey="{{ env('GOOGLE_RECAPTHA_KEY') }}"></div>
                                            </div>
                                            <div class="d-grid gap-2 mt-3">
                                                <button type="submit" class="btn btn-lg btn-primary">Log in</button>
                                            </div>
                                        </form>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="text-center mb-3">
                            Don't have an account? <a href="/register">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });

        @if(session('error'))
            Toast.fire({
                icon: "error",
                title: @json(session('error'))
            });
        @endif
        @if(session('success'))
            Toast.fire({
                icon: "success",
                title: @json(session('success'))
            });
        @endif
    </script>

    <script>
        function onSubmit(token) {
            document.getElementById("cap").submit();
        }
    </script>

</body>

</html>
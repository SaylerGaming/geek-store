<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>geek-store.gg</title>
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css"
    rel="stylesheet"
    />
</head>
<body>
    <div class="container" style="width: 50%; margin-left: 25%">
        <!-- Pills navs -->
    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
        <a
            class="nav-link active"
            id="tab-login"
            data-mdb-toggle="pill"
            href="#pills-login"
            role="tab"
            aria-controls="pills-login"
            aria-selected="true"
            >Login</a
        >
        </li>
        <li class="nav-item" role="presentation">
        <a
            class="nav-link"
            id="tab-register"
            data-mdb-toggle="pill"
            href="#pills-register"
            role="tab"
            aria-controls="pills-register"
            aria-selected="false"
            >Register</a
        >
        </li>
    </ul>
    <!-- Pills navs -->
    
    <!-- Pills content -->
    <div class="tab-content">
        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
        <form method="POST" action="/login">
            @csrf
            @if(Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('error') }}
                </div>
            @endif
            <!-- Email input -->
            <div class="form-outline mb-4">
            <input type="email" id="loginName" class="form-control" name="login_email"/>
            <label class="form-label" for="loginName">Email</label>
            </div>
    
            <!-- Password input -->
            <div class="form-outline mb-4">
            <input type="password" id="loginPassword" class="form-control" name="login_password"/>
            <label class="form-label" for="loginPassword">Password</label>
            </div>
            <!-- Submit button -->
            <div class="text-center">
                <button type="submit" class="btn btn-outline-success btn-rounded mb-4">Sign in</button>
            </div>
        </form>
        </div>
        <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
        <form method="POST" action="/register">
            @if(Session::has('register-error'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('register-error') }}
                </div>
            @endif
            @csrf
            <!-- Name input -->
            <div class="form-outline mb-4">
            <input type="text" id="registerName" class="form-control" name="register_name"/>
            <label class="form-label" for="registerName">Name</label>
            </div>
    
            <!-- Email input -->
            <div class="form-outline mb-4">
            <input type="email" id="registerEmail" class="form-control" name="register_email"/>
            <label class="form-label" for="registerEmail">Email</label>
            </div>
    
            <!-- Password input -->
            <div class="form-outline mb-4">
            <input type="password" id="registerPassword" class="form-control" name="register_password"/>
            <label class="form-label" for="registerPassword">Password</label>
            </div>
    
            <!-- Repeat Password input -->
            <div class="form-outline mb-4">
            <input type="password" id="registerRepeatPassword" class="form-control" name="register_password_confirtmation"/>
            <label class="form-label" for="registerRepeatPassword">Repeat password</label>
            </div>
    
            <!-- Submit button -->
            <div class="text-center">
                <button type="submit" class="btn btn-outline-success btn-rounded mb-3">Sign in</button>
            </div>
        </form>
        </div>
    </div>
    <!-- Pills content -->
</div>

    
    <!-- MDB -->
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"
    ></script>
</body>
</html>
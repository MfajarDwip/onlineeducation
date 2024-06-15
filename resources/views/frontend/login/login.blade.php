<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="css/login.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="{{ route('daftar') }}" method="post">
            @csrf
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" name="nama" id="nama" placeholder="Nama" >
                <input type="email" name="email" id="email" placeholder="Email" >
                <input type="password" name ="password" id="password" placeholder="Password" >
                <button type="submit">Sign up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="{{ route('masuk') }}" method="post"> <!-- Perbaikan 1: action dan method di form -->
                @csrf <!-- Perbaikan 2: CSRF token untuk keamanan form Laravel -->
                <h1>Sign in</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for password</span>
                <input type="email" placeholder="Email" name="email" id="email"> <!-- Perbaikan 3: name pada input -->
                <input type="password" placeholder="Password" name="password" id="password"> <!-- Perbaikan 4: name pada input -->
                <a href="#">Forget Your Password?</a>
                <button type="submit">Sign in</button> <!-- Perbaikan 5: type submit untuk tombol sign in -->
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const container = document.getElementById('container');
        const registerBtn = document.getElementById('register');
        const loginBtn = document.getElementById('login');

        registerBtn.addEventListener('click', () => {
            container.classList.add("active");
        });

        loginBtn.addEventListener('click', () => {
            container.classList.remove("active");
        });
    </script>
</body>

</html>

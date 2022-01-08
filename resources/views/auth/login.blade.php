<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header>
        <h1>Zahra is my love</h1>
    </header>
    <main>
        <article>
            <section>
                <div class="card">
                    <h3 id="message"></h3>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <fieldset>
                            <legend>Login form</legend>
                         
                            <div class="wrapper">

                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" name="email" id="email">
                                <p class="error"></p>

                            </div>
                            <div class="wrapper">

                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" autocomplete>
                                <p class="error"></p>

                            </div>
                       
                            <div class="wrapper">
                                <label for="seller">I am seller</label>
                                <input type="checkbox" name="seller"  id="seller">
                                <p class="error"></p>

                            </div>
                            <div class="actions">

                                <button>Login</button>
                                <a href="{{ route('register.index') }}">dont have account?  create new</a>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </section>
        </article>
    </main>
    <script src="{{ asset('js/auth.js') }}"></script>
</body>
</html>
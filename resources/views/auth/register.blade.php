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
                    <h4 id="message"></h4>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <fieldset>
                            <legend>Register form</legend>
                            <div class="wrapper">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name">
                                <p class="error"></p>
                            </div>
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
                                <label for="password_confirmation" class="form-label">Password confirmation</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" autocomplete>
                                <p class="error"></p>

                            </div>
                            <div class="wrapper">
                                <label for="seller">I am seller</label>
                                <input type="checkbox" name="seller"  id="seller">
                                <p class="error"></p>

                            </div>
                            <div class="actions">

                                <button>Register</button>
                                <a href="{{ route('login.index') }}">I have already account</a>
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
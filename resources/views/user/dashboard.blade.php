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
                    <fieldset>
                        <legend>Dashboard</legend>
                        <ul>
                            <li>Your name: {{ $user->name }}</li>
                            <li>Your email: {{ $user->email }}</li>
                        </ul>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button>Logout</button>    
                        </form>
                    </fieldset>
                </div>
            </section>
        </article>
    </main>
    <script src="{{ asset('js/auth.js') }}"></script>
</body>
</html>
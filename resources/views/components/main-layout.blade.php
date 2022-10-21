<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Document</title>
    </head>
    <body>
        <section class="bg-white  font-mono">

            @if (session()->has('loginId'))
            <div class="flex justify-between p-5">

                <a href="/" class="text-xl font-semibold text-gray-800 hover:underline m-5 ">
                    Hi, {{$user->name}}
                </a>
                <a href="logout" class="text-xl font-semibold text-gray-800 hover:underline m-5 ">
                    logout
                </a>

            </div>

            @else
            <div class="flex justify-end">

                <a href="login" class="text-xl font-semibold text-gray-800 hover:underline m-5 ">
                    Login
                </a>
                <a href="register" class="text-xl font-semibold text-gray-800 hover:underline m-5 ">
                    Register
                </a>

            </div>
            @endif
            @yield("contents")

    </body>
</html>

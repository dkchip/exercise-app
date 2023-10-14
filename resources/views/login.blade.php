<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="../css/app.css">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <div class="py-8 lg:px-2 xs:px-3">
        <h1 class="text-black text-3xl font-semibold text-center py-3">Đăng nhập</h1>
        <form class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post"
            action="{{route('login')}}">
            @csrf
            @method('post')
            <div class="mb-5">
                <label class="block text-gray-700 text-lg font-semibold mb-1" htmlFor="email">
                    Tên đăng nhập hoặc email
                </label>
                <input
                    class="w-full border border-gray-400 rounded py-2 px-3 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="email" />
            </div>
            <div class="mb-5">
                <label class="block text-gray-700 text-lg font-semibold mb-1" htmlFor="password">
                    Mật khẩu
                </label>
                <input
                    class="w-full border border-gray-400 rounded py-2 px-3 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    id="password" type="password" name="password" />

            </div>

            @if($errors->any())
            <ul class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
                @foreach($errors->all() as $error)
                <li class="text-sm">{{$error}}</li>
                @endforeach
            </ul>
            @endif

            @if(session()->has('error'))
            <div class="bg-green-100 border border-red-500 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{session('error')}}</span>
            </div>
            @endif
            <div class="mb-5 flex justify-between items-center">
                <div class="">
                    <input class="cursor-pointer" id="memorize" type="checkbox" />
                    <label class="ml-1 text-gray-700 text-sm cursor-pointer font-semibold" htmlFor="memorize">
                        Ghi nhớ
                    </label>
                </div>
                <div class="">
                    <Link class="text-gray-700 text-sm hover:text-blue-500 font-semibold">
                    Quên mật khẩu?
                    </Link>
                    <p class="text-gray-700 text-sm">
                        Bạn chưa có tài khoản ?
                        <a href="./register" class="text-blue-500 font-semibold hover:underline">
                            Đăng ký
                        </a>
                    </p>
                </div>
            </div>
            <div class="mb-2">
                <button class="w-full py-2 rounded-lg bg-blue-500 text-white text-lg hover:opacity-90" type="submit">
                    Đăng nhập
                </button>
            </div>
        </form>
    </div>
</body>

</html>
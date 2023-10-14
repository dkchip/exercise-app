<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 py-5">
    <h1 class="text-black text-4xl font-semibold text-center py-3">Đăng Ký</h1>
    <div class="py-8 px-2 lg:px-2 xs:px-3 bg-white rounded-lg shadow-md max-w-xl mx-auto">
        <form class="max-w-lg mx-auto" method="post" action="{{route('register')}}">
            @csrf
            @method('post')
            <div class="mb-5">
                <label class="font-semibold text-lg py-1 block" htmlFor="email">
                    Email
                </label>
                <input
                    class="w-full border border-gray-300 p-2 rounded outline-primary-color focus:border-primary-color"
                    id="email" type="text" name="email" />
            </div>
            <div class="mb-5 w-full flex justify-between">
                <div class="w-1/2 mr-2">
                    <label class="font-semibold text-lg py-1 block" htmlFor="firstName">
                        Họ
                    </label>
                    <input
                        class="w-full border border-gray-300 p-2 rounded outline-primary-color focus:border-primary-color"
                        type="text" name="firstName" />
                </div>
                <div class="w-1/2 ml-2">
                    <label class="font-semibold text-lg py-1 block" htmlFor="lastName">
                        Tên
                    </label>
                    <input
                        class="w-full border border-gray-300 p-2 rounded outline-primary-color focus:border-primary-color"
                        type="text" name="lastName" />
                </div>
            </div>
            <div class="mb-5">
                <label class="font-semibold text-lg py-1 block" htmlFor="password">
                    Mật khẩu
                </label>
                <input
                    class="w-full border border-gray-300 p-2 rounded outline-primary-color focus:border-primary-color"
                    type="password" name="password" />
            </div>
            <div class="mb-5">
                <label class="font-semibold text-lg py-1 block" htmlFor="rePassword">
                    Nhập lại mật khẩu
                </label>
                <input
                    class="w-full border border-gray-300 p-2 rounded outline-primary-color focus:border-primary-color"
                    type="password" name="password_confirmation" />
            </div>
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
            @if(session()->has('error'))
            <div class="bg-green-100 border border-red-500 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{session('error')}}</span>
            </div>
            @endif
            <div class="mb-5 w-full flex justify-between items-center">
                <div class="">
                    <input class="cursor-pointer accent-primary-color" id="memorize" type="checkbox" />
                    <label class="font-semibold cursor-pointer ml-1" htmlFor="memorize">
                        Ghi nhớ
                    </label>
                </div>
                <div class="text-right">
                    <a class="hover:text-primary-color">
                        Quên mật khẩu?
                    </a>
                    <p>
                        Bạn đã có tài khoản ?
                        <a class="font-semibold hover:text-primary-color text-[#3b82f6]" href="/">
                            Đăng nhập
                        </a>
                    </p>
                </div>
            </div>
            <div>
                <button
                    class="w-full py-1.5 rounded-lg bg-blue-500 bg-primary-color text-white text-[24px] font-semibold hover:opacity-90"
                    type="submit">
                    Đăng kí
                </button>
            </div>
        </form>
    </div>
</body>

</html>
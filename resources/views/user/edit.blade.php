<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chỉnh sửa tài khoản</title>
    <link rel="stylesheet" href="../css/app.css">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-200">

    <div class="flex  min-h-screen">
        <div class="flex flex-1">
            <!-- Left sidebar -->
            <div class="w-1/4 h-screen bg-white">
                <div class="border-b-[0.5px] px-2 py-3 border-b-[#ccc] h-[64px]">
                    <h2 class="text-lg font-bold mb-4">Xin chào</h2>
                </div>
                <div class="px-2 py-3">
                    <ul class="list-inside text-white">
                        <li class="mb-2"><a href="/user" class="text-black hover:text-blue-800 text-[18px]">Tất cả tài
                                khoản</a></li>
                        <li class="mb-2"><a href="/user/create" class="text-black hover:text-blue-800 text-[18px] ">Tạo
                                mới
                                tài khoản</a></li>

                    </ul>
                </div>
            </div>

            <!-- Main content -->
            <div class="flex-1 px-2 bg-gray-200">
                <div>
                    <div class="flex justify-between bg-white  py-4 px-6">
                        <div class="">
                            <h1 class="text-2xl font-bold">"Cập nhật tài khoản"</h1>
                        </div>
                        <div class="">
                            <a href="/logout" class="font-semiblod text-blue-700  hover:underline">Đăng xuất</a>
                        </div>
                    </div>
                    <div class="p-3">
                        <div>
                            @if($errors->any())
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                        <form method="post" action="{{route('user.update', ['user' => $user])}}"
                            class="max-w-md mx-auto bg-white shadow-lg rounded-lg px-8 py-6">
                            @csrf
                            @method('put')
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="email">
                                    Email:
                                </label>
                                <input
                                    class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="email" type="text" name="email" placeholder="Email" value="{{$user->email}}">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="firstName">
                                    Họ:
                                </label>
                                <input
                                    class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="firstName" type="text" name="firstName" placeholder="Họ"
                                    value="{{$user->firstName}}">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="lastName">
                                    Tên:
                                </label>
                                <input
                                    class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="lastName" type="text" name="lastName" placeholder="Tên"
                                    value="{{$user->lastName}}">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="phone">
                                    Số điện thoại:
                                </label>
                                <input
                                    class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="phone" type="text" name="phone" placeholder="Số điện thoại"
                                    value="{{$user->phone}}">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2" for="address">
                                    Địa chỉ:
                                </label>
                                <input
                                    class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="address" type="text" name="address" placeholder="Địa chỉ"
                                    value="{{$user->address}}">
                            </div>
                            <div class="text-center">
                                <button
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                    type="submit">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
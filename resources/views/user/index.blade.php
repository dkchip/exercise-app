<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tất cả tài khoản</title>
    <link rel="stylesheet" href="../css/app.css">
    @vite('resources/css/app.css')
</head>

<body class="">
    <div class="flex  min-h-screen">
        <!-- Content area -->
        <div class="flex flex-1">
            <!-- Left sidebar -->
            <div class="w-1/4 h-screen bg-gradient-to-b ">
                <div class="border-b-[0.5px] px-2 py-3 border-b-[#ccc] h-[64px]">
                    <h2 class="text-lg font-bold mb-4">Xin chào</h2>
                </div>
                <div class="px-2 py-3">
                    <ul class="list-inside text-white">
                        <li class="mb-2"><a href="/user"
                                class="text-black hover:text-blue-800 text-[#2691d9] text-[18px] font-semibold">Tất cả
                                tài
                                khoản</a></li>
                        <li class="mb-2"><a href="/user/create" class="text-black hover:text-blue-800 text-[18px]">Tạo
                                mới tài
                                khoản</a></li>

                    </ul>
                </div>
            </div>

            <!-- Main content -->
            <div class="flex-1 px-2 bg-gray-200">
                <div class="flex justify-between bg-white  py-4 px-6">
                    <div class="">
                        <h1 class="text-2xl font-bold">Tài khoản</h1>
                    </div>
                    <div class="">
                        <a href="/logout" class="font-semiblod text-blue-700  hover:underline">Đăng xuất</a>
                    </div>
                </div>
                <div class="p-3">
                    <div>
                        @if(session()->has('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                            role="alert">
                            <span class="block sm:inline">{{session('success')}}</span>
                        </div>
                        @endif
                    </div>
                    <div class="my-6">
                        <div class="mb-4">
                            <a href="{{route('user.create')}}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tạo mới
                                người
                                dùng</a>
                        </div>
                        <table class="table-auto border-collapse border border-blue-800 w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 border border-blue-800">ID</th>
                                    <th class="px-4 py-2 border border-blue-800">Email</th>
                                    <th class="px-4 py-2 border border-blue-800">Họ</th>
                                    <th class="px-4 py-2 border border-blue-800">Tên</th>
                                    <th class="px-4 py-2 border border-blue-800">Địa chỉ</th>
                                    <th class="px-4 py-2 border border-blue-800">Số ĐT</th>
                                    <th class="px-4 py-2 border border-blue-800">Edit</th>
                                    <th class="px-4 py-2 border border-blue-800">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user )
                                <tr>
                                    <td class="px-4 py-2 border border-blue-800">{{$user->id}}</td>
                                    <td class="px-4 py-2 border border-blue-800">{{$user->email}}</td>
                                    <td class="px-4 py-2 border border-blue-800">{{$user->firstName}}</td>
                                    <td class="px-4 py-2 border border-blue-800">{{$user->lastName}}</td>
                                    <td class="px-4 py-2 border border-blue-800">{{$user->address}}</td>
                                    <td class="px-4 py-2 border border-blue-800">{{$user->phone}}</td>
                                    <td class="px-4 py-2 border border-blue-800">
                                        <a href="{{route('user.edit', ['user' => $user])}}"
                                            class="text-blue-500 hover:text-blue-800">Edit</a>
                                    </td>
                                    <td class="px-4 py-2 border border-blue-800">
                                        <form method="post" action="{{route('user.destroy', ['user' => $user])}}"
                                            class="w-full">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="text-red-500 hover:text-red-800">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
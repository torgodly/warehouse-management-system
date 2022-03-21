<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>session reports</title>
</head>

<body class="bg-gray-300">
    <main class="h-screen ">
        <div class="flex justify-between ">
            <a href="/"> <button
                    class=" mt-5 ml-5 md:w-[200%] w-[210%] inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold capitalize text-white hover:bg-red-700 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 disabled:opacity-25 transition">رجوع</button></a>
            <img src="images\ICTSC.png" class="w-[10%] mt-5 mr-5">
        </div>
        <div class="flex flex-col justify-center items-center">


            <h1 class="text-2xl font-bold">قسم تقارير الجلسة</h1>
            <table class="rounded-t-lg m-5 w-5/6 mx-auto text-gray-100 bg-gradient-to-l from-indigo-500 to-indigo-800">
                <tr class="text-left border-b-2 border-indigo-300">
                    <th class="px-4 py-3">اسم المستخدم</th>
                    <th class="px-4 py-3">وظيفة المستخدم</th>
                    <th class="px-4 py-3">action</th>
                    <th class="px-4 py-3">الوقت</th>
                </tr>

                @foreach ($sessions_reports as $sessions_report)
                    <tr class="border-b border-indigo-400">
                        <td class="px-4 py-3">{{ $sessions_report->name }}</td>
                        <td class="px-4 py-3">{{ $sessions_report->postion }}</td>
                        <td class="px-4 py-3">
                            @if ($sessions_report->login_logout == 'login')
                                <span class="rounded bg-green-600 py-1 px-3 text-xs font-bold">تسجيل الدخول</span>
                            @else
                                <span class="rounded bg-red-600 py-1 px-3 text-xs font-bold">تسجيل خروج</span>
                            @endif

                        </td>
                        <td class="px-4 py-3">{{ $sessions_report->created_at->format('d/m/Y/ h:i:s') }}</td>
                    </tr>
                @endforeach


            </table>
            <div class="w-5/6 mb-5">
                {{ $sessions_reports->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </main>
</body>

</html>

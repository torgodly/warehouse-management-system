<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>wms - home</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body class="bg-gray-300">
    <main class="  h-full ">




        <div class="pt-5 pl-10 pr-10 flex justify-between">

            <div class="w-1/3 ">
                @auth
                    <p class="text-2xl font-bold">{{ Auth::user()->name }}</p>
                    <h1 class="text-right mr-3 w-fit font-bold">{{ Auth::user()->position }}</h1>
                @endauth
            </div>

            <div class="w-1/3  flex flex-col justify-center items-center space-y-3 text-2xl font-bold ">
                <p>نــظـام إدارة الــمخــزن </p>
                <div id="time"></div>
            </div>

            <div class="w-1/3 flex justify-end">
                @auth
                    <div class="grid grid-cols-2 gap-5">
                        <form action="/logout" method="post">
                            @csrf
                            <button
                                class="w-full inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold capitalize text-white hover:bg-red-700 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 disabled:opacity-25 transition">تسجيل
                                خروج</button>
                        </form>


                        {{-- @if (auth::user()->level == 0) --}}
                        @can('view', App\Models\Product_import::class)
                            <a href="/register"> <button
                                    class="w-full inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold capitalize text-white hover:bg-red-700 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 disabled:opacity-25 transition">تسجيل
                                    مستخدم جديد</button>
                            </a>
                            <a href="/section"> <button
                                    class="w-full inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold capitalize text-white hover:bg-red-700 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 disabled:opacity-25 transition">تسجيل
                                    جهة جديد</button>
                            </a> <a href="/type"> <button
                                    class="w-full inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold capitalize text-white hover:bg-red-700 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 disabled:opacity-25 transition">
                                    تسجيل نوع جديد</button>
                            </a>
                        @endcan

                        {{-- @endif --}}
                    </div>
                @else
                    <a href="/login"> <button
                            class="w-full inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold capitalize text-white hover:bg-red-700 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 disabled:opacity-25 transition">تسجيل
                            الدخول</button>
                    </a>

                @endauth
            </div>
        </div>

        <div class="pt-5">


            <div class="flex-col flex justify-center space-y-5 items-center">
                <img src="images\ICTSC.png" class="w-[30%]">

            </div>
            @auth
                <div
                    class="mb-10 flex flex-col justify-center items-center space-y-5 mt-10 md:flex-row-reverse md:space-x-5 md:justify-center">
                    <a href=""></a>
                    @can('view', App\Models\Product_import::class)
                        <a href=""></a>
                        <a href="import">
                            <div class="bg-white p-5 w-fit rounded-xl text-2xl shadow-lg shadow-teal-500">استيراد</div>
                        </a>
                    @endcan
                    <a href="export">
                        <div class="bg-white p-5 w-fit rounded-xl text-2xl shadow-lg shadow-teal-500">تصدير</div>
                    </a>
                    @can('view', App\Models\Product_import::class)
                        <a href="reports">
                            <div class="bg-white p-5 w-fit rounded-xl text-2xl shadow-lg shadow-teal-500">التقارير</div>

                        </a>
                    @endcan
                    <a href="inventory">
                        <div class="bg-white p-5 w-fit rounded-xl text-2xl shadow-lg shadow-teal-500">المخزون</div>

                    </a>
                    @can('view', App\Models\Product_import::class)
                        <a href="sessions">
                            <div class="bg-white p-5 w-fit rounded-xl text-2xl shadow-lg shadow-teal-500">تقارير الجلسات</div>

                        </a>
                    @endcan

                </div>
            @endauth

        </div>


        @if (Session::has('success'))
            <div class=" bg-blue-500 p-5 ml-5 w-fit rounded-xl absolute bottom-14 font-bold text-white"
                id="successMessage">
                <p>{{ Session::get('success') }}</p>
            </div>
        @endif


    </main>
    <script>
        $(function() {
            setTimeout(function() {
                $("#successMessage").fadeOut(1500);
            }, 3000)

        })
    </script>
    <script type="text/javascript">
        window.onload = displayClock();

        function displayClock() {
            var display = new Date().toLocaleTimeString('ar-LY');
            document.getElementById('time').innerHTML = display;
            setTimeout(displayClock, 1000);
        }
    </script>
</body>

</html>

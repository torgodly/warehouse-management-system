<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>reports</title>
</head>

<body class="bg-gray-300">

    <main class="h-screen ">
        <div class="flex justify-between ">
            <a href="/"> <button
                    class=" mt-5 ml-5 md:w-[200%] w-[210%] inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold capitalize text-white hover:bg-red-700 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 disabled:opacity-25 transition">رجوع</button></a>
            <img src="images\ICTSC.png" class="w-[10%] mt-5 mr-5">
        </div>
        <div class="flex flex-col justify-center items-center">
            <h1 class="text-2xl font-bold">قسم التقارير</h1>
            <table class="rounded-t-lg m-5 w-5/6 mx-auto text-gray-100 bg-gradient-to-l from-indigo-500 to-indigo-800">
                <tr class="text-left border-b-2 border-indigo-300">
                    <th class="px-4 py-3">اسم المنتج</th>
                    <th class="px-4 py-3">نوع المنتج</th>
                    <th class="px-4 py-3">الكمية</th>
                    <th class="px-4 py-3">السعر</th>
                    <th class="px-4 py-3">السعر الكلي</th>
                    <th class="px-4 py-3">تصدير / استيراد</th>
                    <th class="px-4 py-3">الجهة</th>
                    <th class="px-4 py-3">التاريخ</th>
                </tr>

                @foreach ($reports as $report)
                    <tr class="border-b border-indigo-400">
                        <td class="px-4 py-3"><a
                                href="{{ url()->current() }}/name/{{ $report->product_name }}">{{ $report->product_name }}</a>
                        </td>
                        <td class="px-4 py-3"><a
                                href="/reports/name/{{ $report->product_name }}/type/{{ $report->product_type }}">{{ $report->product_type }}</a>
                        </td>
                        <td class="px-4 py-3">{{ $report->quantity }}</td>
                        <td class="px-4 py-3">{{ $report->price }}</td>
                        <td class="px-4 py-3">{{ $report->price * $report->quantity }}د.ل</td>
                        <td class="px-4 py-3 ">

                            @if ($report->in_out == 'in')
                                <a href="{{ url()->current() }}/in"> <span
                                        class="rounded bg-green-600 py-1 px-3 text-xs font-bold">استيراد</span></a>
                            @else
                                <a href="{{ url()->current() }}/out""> <span
                                        class="

                                    rounded bg-red-600 py-1 px-3 text-xs font-bold">تصدير</span></a>
                            @endif
                        </td>
                        <td class="px-4 py-3">{{ $report->section }}</td>
                        <td class="px-4 py-3">{{ $report->created_at->format('d/m/Y/ h:i:s') }}</td>

                    </tr>
                @endforeach


            </table>
            <div class="w-5/6 mb-5">
                {{ $reports->links('vendor.pagination.tailwind') }}
            </div>

        </div>
    </main>
</body>

</html>

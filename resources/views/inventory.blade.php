<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>inventory</title>
</head>

<body class="bg-gray-300">
    <main class="h-screen ">
        <div class="flex justify-between ">
            <a href="/"> <button
                    class=" mt-5 ml-5 md:w-[200%] w-[210%] inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold capitalize text-white hover:bg-red-700 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 disabled:opacity-25 transition">رجوع</button></a>
            <img src="images\ICTSC.png" class="w-[10%] mt-5 mr-5">
        </div>
        <div class="flex flex-col justify-center items-center">


            <h1 class="text-2xl font-bold">قسم الجرد</h1>
            <table class="rounded-t-lg m-5 w-5/6 mx-auto text-gray-100 bg-gradient-to-l from-indigo-500 to-indigo-800">
                <tr class="text-left border-b-2 border-indigo-300">
                    <th class="px-4 py-3">اسم المنتج</th>
                    <th class="px-4 py-3">نوع المنتج</th>
                    <th class="px-4 py-3">الكمية</th>
                    <th class="px-4 py-3">السعر</th>
                    <th class="px-4 py-3">السعر الكلي</th>
                    <th class="px-4 py-3">التاريخ</th>
                    <th class="px-4 py-3">حذف</th>
                </tr>

                @foreach ($items as $item)
                    <tr class="border-b border-indigo-400">
                        <td class="px-4 py-3">{{ $item->product_name }}</td>
                        <td class="px-4 py-3">{{ $item->product_type }}</td>
                        <td class="px-4 py-3">{{ $item->quantity }}</td>
                        <td class="px-4 py-3">{{ $item->price }}</td>
                        <td class="px-4 py-3">{{ $item->price * $item->quantity }} د.ل</td>

                        {{-- <td class="px-4 py-3 ">

                        @if ($item->in_out == 'in')
                            <span
                                class="rounded bg-green-600 py-1 px-3 text-xs font-bold">{{ $item->in_out }}</span>

                        @else
                            <span class="rounded bg-red-600 py-1 px-3 text-xs font-bold">{{ $item->in_out }}</span>
                        @endif
                    </td> --}}
                        <td class="px-4 py-3">{{ $item->created_at->format('d/m/Y') }}</td>
                        <td class="px-4 py-3">
                            <form action="/delete/inventory/{{ $item->product_name }}/{{ $item->product_type }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="rounded bg-red-600 py-1 px-3 text-md font-bold">مسح</button>
                            </form>
                        </td>

                    </tr>
                @endforeach


            </table>
            <div class="w-5/6 mb-5">
                {{ $items->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </main>
</body>

</html>

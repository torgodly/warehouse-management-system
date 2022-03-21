<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>import</title>
</head>

<body class="bg-gray-300">
    <main class="h-screen w-screen">
        <div class="flex justify-between ">
            <a href="/"> <button
                    class=" mt-5 ml-5 md:w-[200%] w-[210%] inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold capitalize text-white hover:bg-red-700 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 disabled:opacity-25 transition">رجوع</button></a>
            <img src="images\ICTSC.png" class="w-[10%] mt-5 mr-5">
        </div>
        <div class="flex flex-col justify-center items-center">


            <h1 class="text-2xl font-bold">قسم الاستيراد</h1>
            <div class="bg-white p-5 rounded-xl mt-10">
                <form action="/import" method="post">
                    @csrf
                    <div>
                        <label for="product_name">اسم المنتج</label>
                        <input type="text" name="product_name" value="{{ old('name') }}"
                            class=" mt-1 pl-5 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                        @error('product_name')
                            <p class="text-red-600 mt-1 ml-2">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class="mt-3">

                        <label for="product_type">نوع المنتج</label>
                        <select name="product_type"
                            class="mt-1 pl-5 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                            <option value="" disabled selected>النوع</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->name }}" >{{ $type->name }}</option>
                            @endforeach

                        </select>
                        @error('product-type')
                            <p class="text-red-600 mt-1 ml-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-3">

                        <label for="section">الجهة</label>
                        <select name="section"
                            class="mt-1 pl-5 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                            <option value="" disabled selected>الجهة</option>
                            @foreach ($sections as $section)
                                <option value="{{ $section->name }}">{{ $section->name }}</option>
                            @endforeach
                        </select>
                        @error('section')
                            <p class="text-red-600 mt-1 ml-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="quantity">كمية</label>
                        <input type="text" name="quantity"
                            class="mt-1 pl-5 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                        @error('quantity')
                            <p class="text-red-600 mt-1 ml-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="price">السعر</label>
                        <input type="text" name="price"
                            class="mt-1 pl-5 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                        @error('price')
                            <p class="text-red-600 mt-1 ml-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-7">
                        <button
                            class="bg-blue-500 w-full py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                            ادخال

                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

</body>

</html>

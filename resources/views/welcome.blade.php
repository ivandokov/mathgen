@php
    $equasions = request('equasions', 35);
    $signs = str_split(request('signs', '+-'));
    $minDigits = request('min-digits', 2);
    $maxDigits = request('max-digits', 3);
    $min = 1 . Illuminate\Support\Str::repeat('0', $minDigits - 1);
    $max = Illuminate\Support\Str::repeat('9', $maxDigits);
    $padLength = $maxDigits + 1;
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Math Generator</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased">
        <form method="get" action="" class="flex gap-3 mb-5 print:hidden">
            <div>
                <label for="equasions" class="block text-sm font-medium text-gray-700">Number of equasions</label>
                <div class="mt-1">
                    <input type="number" name="equasions" id="equasions" value="{{ $equasions }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="you@example.com">
                </div>
            </div>
            <div>
                <label for="signs" class="block text-sm font-medium text-gray-700">Signs</label>
                <select id="signs" name="signs" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option{{ $signs === '+-' ? ' selected' : '' }}>+-</option>
                    <option{{ $signs === '+' ? ' selected' : '' }}>+</option>
                    <option{{ $signs === '-' ? ' selected' : '' }}>-</option>
                </select>
            </div>
            <div>
                <label for="min_digits" class="block text-sm font-medium text-gray-700">Minimum digits</label>
                <div class="mt-1">
                    <input type="number" name="min-digits" id="min_digits" value="{{ $minDigits }}" min="1" step="1" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>
            <div>
                <label for="max_digits" class="block text-sm font-medium text-gray-700">Maximum digits</label>
                <div class="mt-1">
                    <input type="number" name="max-digits" id="max_digits" value="{{ $maxDigits }}" min="2" step="1" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>
            <div class="flex items-end pb-0.5">
                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Generate
                </button>
            </div>
        </form>
        <div class="flex flex-wrap gap-x-10 gap-y-20 text-3xl">
            @for ($i = 1; $i <= $equasions; $i++)
                <div class="grid">
                    <div class="col-start-1 row-span-2 flex items-center justify-end pr-3">{{ Illuminate\Support\Arr::random($signs) }}</div>
                    <div class="col-start-2 text-right">
                        <pre>{!! Illuminate\Support\Str::padLeft(rand($min, $max), $padLength) !!}</pre>
                    </div>
                    <div class="col-start-2 text-right border-b border-black">
                        <pre>{!! Illuminate\Support\Str::padLeft(rand($min, $max), $padLength) !!}</pre>
                    </div>
                </div>
            @endfor
        </div>
    </body>
</html>

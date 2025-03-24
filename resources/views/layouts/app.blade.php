<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Lattice Multiplication Game</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex justify-center items-center min-h-screen bg-gray-100 p-4">
<div class="container bg-white rounded-lg shadow-lg p-6 w-full max-w-4xl">
    @include('flash')
{{--    <h1 class="text-2xl font-bold mb-4 text-center">Lattice Multiplication Practice</h1>--}}
    <p class="text-lg mb-6 text-center">Multiply {{ $topNumber }} × {{ $sideNumber }}</p>
    <form id="lattice-form" method="POST" action="{{ route('game.validate') }}" class="space-y-4">
        @csrf
        <input type="hidden" name="top_number" value="{{ $topNumber }}"/>
        <input type="hidden" name="side_number" value="{{ $sideNumber }}"/>

        <!-- Lattice Grid -->
        <div class="overflow-x-auto">
            <table class="table-auto mx-auto border-collapse border border-gray-300">
                <tr>
    {{--                    <td class="border px-2 py-1"></td>--}}
                    @foreach(str_split($topNumber) as $digit)
                        <td class="border px-4 py-2 font-bold text-center">{{ $digit }}</td>
                    @endforeach
                </tr>
                @foreach(str_split($sideNumber) as $rowDigit)
                    <tr>

                        @foreach(str_split($topNumber) as $colDigit)
                            <td class="relative border w-16 h-16 bg-gray-50">
                                <svg class="absolute inset-0 w-full h-full" xmlns="http://www.w3.org/2000/svg">
                                    <line x1="60" y1="0" x2="0" y2="60" stroke="red" stroke-width="2"/>
                                </svg>
                                <div class="absolute top-1 left-1 w-1/2 h-1/2 text-xs">
                                    <input type="text" name="answers[{{ $loop->parent->index * count(str_split($topNumber)) + $loop->index }}][tens]"
                                           class="w-full text-center border-none bg-transparent placeholder-gray-400 outline-none"
                                           placeholder="T">
                                </div>
                                <div class="absolute bottom-1 right-1 w-1/2 h-1/2 text-xs">
                                    <input type="text" name="answers[{{ $loop->parent->index * count(str_split($topNumber)) + $loop->index }}][ones]"
                                           class="w-full text-center border-none bg-transparent placeholder-gray-400 outline-none"
                                           placeholder="O">
                                </div>
                            </td>
                        @endforeach
                            <td class="border px-4 py-2 font-bold text-center">{{ $rowDigit }}</td>
                    </tr>
                @endforeach
            </table>
        </div>

        <!-- Final Answer Input -->
        <div class="flex justify-center">
            <input type="text" id="final-answer" name="final_answer"
                   class="w-full max-w-md px-4 py-2 border rounded-md placeholder-gray-400 focus:ring focus:ring-blue-300"
                   placeholder="Enter your final answer here" required />
        </div>

        <!-- Submit Button -->
        <div class="flex justify-center">
            <button type="submit"
                    class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:ring focus:ring-blue-300">
                Submit
            </button>
        </div>
    </form>

    <!-- Result Message -->
    <div id="result" class="mt-4 text-center"></div>
</div>
</body>
</html>

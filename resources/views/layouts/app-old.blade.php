<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Lattice Multiplication Game</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f9f9f9;
        }

        .container {
            text-align: center;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        .header-cell {
            text-align: center;
            font-weight: bold;
            width: 60px;
            height: 40px;
            border: 1px solid black;
        }

        .lattice-cell {
            width: 60px;
            height: 60px;
            position: relative;
            border: 1px solid black;
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60"><line x1="60" y1="0" x2="0" y2="60" stroke="red" stroke-width="2"/></svg>');
            background-size: cover;
        }

        .cell-top, .cell-bottom {
            position: absolute;
            width: 50%;
            height: 50%;
            text-align: center;
            font-size: 14px;
        }

        .cell-top {
            top: 5px;
            left: 5px;
        }

        .cell-bottom {
            bottom: 5px;
            right: 5px;
        }

        .cell-input {
            width: 80%;
            text-align: center;
            font-size: 14px;
            border: none;
            background: transparent;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        #result {
            margin-top: 20px;
        }

        .final-answer-container {
            margin-top: 20px;
        }

        .final-answer-container input {
            width: 200px;
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>
<body>
<div class="container">
@include('flash')
    <h1>Lattice Multiplication Practice</h1>
    <p>Multiply {{ $topNumber }} × {{ $sideNumber }}</p>
    <form id="lattice-form" method="POST" action="{{route('game.validate')}}">
        @csrf
        <input type="hidden" name="top_number" value="{{$topNumber}}"/>

        <input type="hidden" name="side_number" value="{{$sideNumber}}"/>
        <!-- Lattice Grid -->
        <table>
            <tr>
                <td></td>
                @foreach(str_split($topNumber) as $digit)
                    <td class="header-cell">{{ $digit }}</td>
                @endforeach
            </tr>
            @foreach(str_split($sideNumber) as $rowDigit)
                <tr>
                    <td></td>
                    @foreach(str_split($topNumber) as $colDigit)
                        <td class="lattice-cell">
                            <div class="cell-top">
                                <input type="text" name="answers[{{ $loop->parent->index * count(str_split($topNumber)) + $loop->index }}][tens]" class="cell-input" placeholder="T">
                            </div>
                            <div class="cell-bottom">
                                <input type="text" name="answers[{{ $loop->parent->index * count(str_split($topNumber)) + $loop->index }}][ones]" class="cell-input" placeholder="O">
                            </div>
                        </td>
                    @endforeach
                        <td class="header-cell">{{ $rowDigit }}</td>
                </tr>
            @endforeach
        </table>

        <!-- Final Answer Input -->
        <div class="final-answer-container">

            <input type="text" id="final-answer" name="final_answer" placeholder="Enter your final answer here" required />
        </div>

        <!-- Submit Button -->
        <button type="submit">Submit</button>
    </form>

    <!-- Result Message -->
    <div id="result"></div>
</div>

</body>
</html>

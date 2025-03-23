<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LatticeGameController extends Controller
{
    public function index(Request $request)
    {
        // Generate two random two-digit numbers for the game.
        $topNumber = null !== $request->query('topNumber') ? $request->query('topNumber') : rand(10, 99);
        $sideNumber = null !== $request->query('sideNumber') ? $request->query('sideNumber') : rand(10, 99);


        return view('game.index', compact('topNumber', 'sideNumber'));
    }

    public function validateGrid(Request $request)
    {

        $topNumber = $request->input('top_number');
        $sideNumber = $request->input('side_number');
        $answer = $request->input('final_answer');

        $correct_answer = $topNumber * $sideNumber;

        if($answer == $correct_answer) {
            $message = 'CORRECT, '.$topNumber.' * '.$sideNumber.' = '.$correct_answer.', Try Another!';

            return redirect()->route('game')->with('success', $message);
        }
        else
            return redirect()->route('game', ['topNumber' => $topNumber, 'sideNumber' => $sideNumber])->with('fail', 'INCORRECT, try again');

    }
}

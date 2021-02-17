<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return Question::paginate(15);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $validation = Validator::make($request->all(),[ 
            'title' => 'required',
            'description' => 'required',
            'id_student' => 'required',
            'id_subject' => 'required',
        ]);

        if($validation->fails()){
            return response()->json([
                'error' => true,
                'messages'  => $validation->errors(),
            ], 200);
        }
        else
        {
            $question = Question::create($request->all());

            return response()->json([
                'error' => false,
                'question'  => $question,
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);

        if(is_null($question)){
            return response()->json([
                'error' => true,
                'message'  => "Record with id # $id not found",
            ], 404);
        }

        return response()->json([
            'error' => false,
            'question'  => $question,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(),[ 
            'title' => 'required',
            'description' => 'required',
            'id_student' => 'required',
            'id_subject' => 'required',
        ]);

        if($validation->fails()){
            return response()->json([
                'error' => true,
                'messages'  => $validation->errors(),
            ], 200);
        }
        else
        {
            $question = Question::find($id);
            $question->title = $request->input('title');
            $question->description = $request->input('description');
            $question->id_student = $request->input('id_student');
            $question->id_subject = $request->input('id_subject');
            $question->save();

            return response()->json([
                'error' => false,
                'question'  => $question,
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id);

        if(is_null($question)){
            return response()->json([
                'error' => true,
                'message'  => "Record with id # $id not found",
            ], 404);
        }

        $question->delete();

        return response()->json([
            'error' => false,
            'message'  => "Question record successfully deleted id # $id",
        ], 200);
    }
}

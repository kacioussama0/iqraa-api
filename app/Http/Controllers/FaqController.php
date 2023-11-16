<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Faq::paginate(6);
        return view('admin.faq.index',compact('questions'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request -> validate([
            'question' => 'required|min:5',
            'answer' => 'required|min:10',
        ]);

        $validatedData['question_fr'] = $request->question_fr;
        $validatedData['answer_fr'] = $request->answer_fr;

        Faq::create($validatedData);

        return redirect()->to('admin/faq')->with([
            'success' => 'Faq Created Successfully'
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        $question = $faq;
        return view('admin.faq.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        $validatedData = $request -> validate([
            'question' => 'required|min:5',
            'answer' => 'required|min:10',
        ]);

        $validatedData['question_fr'] = $request->question_fr;
        $validatedData['answer_fr'] = $request->answer_fr;

        $faq->update($validatedData);

        return redirect()->to('admin/faq')->with([
            'success' => 'Faq Updated Successfully'
        ]);

    }


    public function questionsAnswers() {
        $faqs = Faq::all();
        return response()->json($faqs);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
       if($faq->delete()) {
           return redirect()->to('admin/faq')->with([
               'success' => 'Faq Deleted Successfully'
           ]);
       }
     }



}

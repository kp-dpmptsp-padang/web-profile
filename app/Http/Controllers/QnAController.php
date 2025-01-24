<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionAndAnswer;
use App\Mail\AnsweredQuestionMail;
use Illuminate\Support\Facades\Mail;

class QnAController extends Controller
{
    public function index() {
        $belumTerjawab = QuestionAndAnswer::where('status', 'belum-terjawab')->latest()->paginate(10);
        $terjawab = QuestionAndAnswer::where('status', 'terjawab')->latest()->paginate(10);

        return view('admin.qnas.index', compact('belumTerjawab', 'terjawab'));
    }

    public function update(Request $request, $id) {
        $question = QuestionAndAnswer::findOrFail($id);
        $question->jawaban = $request->input('jawaban');
        $question->status = 'terjawab';
        $question->save();

        // Send email to the guest
        Mail::to($question->email_penanya)->send(new AnsweredQuestionMail($question));

        return redirect()->route('qna.index')->with('success', 'Pertanyaan berhasil dijawab.');
    }

    public function destroy($id) {
        $question = QuestionAndAnswer::findOrFail($id);
        $question->delete();
    
        return response()->json(['success' => true, 'message' => 'Pertanyaan berhasil diabaikan.']);
    }
}
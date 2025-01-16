<?php

namespace App\Mail;

use App\Models\QuestionAndAnswer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AnsweredQuestionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $question;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(QuestionAndAnswer $question)
    {
        $this->question = $question;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Jawaban untuk Pertanyaan Anda')
                    ->view('emails.answered_question');
    }
}
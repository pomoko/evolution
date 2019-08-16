<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;


class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->data['file'] != null){
            return $this->from($this->data['email'])->subject($this->data['subject'])->attach($this->data['file']->getRealPath(),
                [
                    'as' => $this->data['file']->getClientOriginalName(),
                    'mime' => $this->data['file']->getClientMimeType(),
                ])->view('contact.template')->with('data', $this->data);

        }
        else{
            return $this->from($this->data['email'])->subject($this->data['subject'])->view('contact.template')->with('data', $this->data);
        }

    }
}

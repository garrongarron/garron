<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Position;

class ApplyToPosition extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $position;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Position $position)
    {
        $this->user = $user;
        $this->position = $position;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.applyToPosition')
                ->from('infon@garron.com.ar', 'Garron Consulting Group')
                ->subject('Postulación: '.$this->position->title);
    }
}

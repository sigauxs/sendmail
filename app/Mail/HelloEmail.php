<?php

namespace App\Mail;

use App\Models\Email;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Nette\Utils\Strings;

class HelloEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $email;

    public function __construct(Email $email)
    {
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("control-operacional@sigpeco.sigpeconsultores.com.co")
        ->subject('Reporte de inspeccion')
        ->view('email-template')->with([

            'to' => $this->email->to,
            'cc' => $this->email->cc,
            'link'=> $this->email->link,
            'idIns'=>$this->email->idIns,
            'fecha'=>$this->email->fecha,
            'area' => $this->email->area,
            'inspector' => $this->email->inspector,
            'delegado' => $this->email->delegado

        ]);;
    }
}

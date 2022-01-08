<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Driver;

class DriverRegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $driver;
    protected $randomPassword;

    public function __construct(Driver $driver, $randomPassword)
    {
        $this->driver = $driver;
        $this->randomPassword = $randomPassword;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Verifikasi Pendaftaran Anda')
        ->view('emails.regdriver')
        ->with([
            'driver' => $this->driver,
            'password' => $this->randomPassword
        ]);
    }
}

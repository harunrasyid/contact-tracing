<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifikasiLaporan extends Notification
{
    use Queueable;
    private $pesanVerifikasi;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($pesanVerifikasi)
    {
        $this->pesanVerifikasi = $pesanVerifikasi;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'tanggal laporan' => $this->pesanVerifikasi['tanggal laporan'],
            'title' => $this->pesanVerifikasi['title'],
            'pesan' => $this->pesanVerifikasi['pesan'],
        ];
    }
}

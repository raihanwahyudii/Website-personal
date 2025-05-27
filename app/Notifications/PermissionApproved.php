<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Permission;

class PermissionApproved extends Notification
{
    protected $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Izin Anda Telah Disetujui')
            ->greeting('Assalamualaikum!')
            ->line('Permohonan izin Anda telah disetujui oleh atasan.')
            ->line('Tanggal: ' . $this->permission->tanggal)
            ->line('Keperluan: ' . $this->permission->keperluan)
            ->line('Terima kasih.');
    }
}

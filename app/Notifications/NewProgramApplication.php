<?php

namespace App\Notifications;

use App\Models\ProgramApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewProgramApplication extends Notification
{
    use Queueable;

    public function __construct(public ProgramApplication $application)
    {
    }

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Program Application Submitted')
            ->greeting('Hello Admin,')
            ->line('A new program application has been submitted.')
            ->line('Applicant: '.$this->application->user->name)
            ->line('Program: '.$this->application->program->title)
            ->action('View Applications', url(route('admin.applications.index')));
    }

    public function toArray(object $notifiable): array
    {
        return [
            'application_id' => $this->application->id,
            'user_id' => $this->application->user_id,
            'program_id' => $this->application->program_id,
            'status' => $this->application->status,
        ];
    }
}

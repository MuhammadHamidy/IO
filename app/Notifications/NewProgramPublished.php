<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Programs;

class NewProgramPublished extends Notification
{
    use Queueable;

    public $program;

    /**
     * Create a new notification instance.
     */
    public function __construct(Programs $program)
    {
        $this->program = $program;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        // Determine correct route based on program type
        $routeName = 'programs';
        if ($this->program->type === 'degree') {
            $routeName = 'programs.degree';
        } elseif ($this->program->type === 'non-degree') {
            $routeName = 'programs.non-degree';
        }

        return (new MailMessage)
            ->subject('New Program Available: ' . $this->program->title)
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('🎓 A new program has been published!')
            ->line('**Program:** ' . $this->program->title)
            ->line('**Type:** ' . ucfirst($this->program->type))
            ->line('**Duration:** ' . $this->program->duration)
            ->action('View Program Details', url(route($routeName)))
            ->line('Don\'t miss this opportunity to apply!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'program_id' => $this->program->id,
            'program_name' => $this->program->title,
            'program_type' => $this->program->type,
            'duration' => $this->program->duration,
            'message' => '🎓 New program "' . $this->program->title . '" is now available for application!',
        ];
    }
}

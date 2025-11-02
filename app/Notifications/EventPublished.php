<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Events;

class EventPublished extends Notification
{
    use Queueable;

    public $event;

    /**
     * Create a new notification instance.
     */
    public function __construct(Events $event)
    {
        $this->event = $event;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Event: ' . $this->event->title)
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('📅 A new event has been scheduled!')
            ->line('**Event:** ' . $this->event->title)
            ->line('**Date:** ' . \Carbon\Carbon::parse($this->event->date)->format('F d, Y'))
            ->action('View Event Calendar', url(route('home') . '#events'))
            ->line('Mark your calendar and don\'t miss out!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'event_id' => $this->event->id,
            'program_name' => $this->event->title,
            'event_date' => $this->event->date,
            'message' => '📅 New event "' . $this->event->title . '" scheduled on ' . \Carbon\Carbon::parse($this->event->date)->format('F d, Y'),
        ];
    }
}

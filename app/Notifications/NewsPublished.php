<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\PageNews;

class NewsPublished extends Notification
{
    use Queueable;

    public $news;

    /**
     * Create a new notification instance.
     */
    public function __construct(PageNews $news)
    {
        $this->news = $news;
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
            ->subject('Breaking News: ' . $this->news->title)
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('📰 New breaking news has been published!')
            ->line('**' . $this->news->title . '**')
            ->action('Read Full Article', url(route('news-detail', $this->news->id)))
            ->line('Stay informed with the latest updates!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'news_id' => $this->news->id,
            'program_name' => $this->news->title,
            'message' => '📰 Breaking news: "' . $this->news->title . '" - Click to read more.',
        ];
    }
}

<?php

namespace App\Notifications;

use App\Models\ProgramApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicationStatusUpdated extends Notification
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
        $stages = ProgramApplication::getStages();
        $currentStage = $stages[$this->application->current_stage] ?? 'Unknown';
        $status = ucfirst(str_replace('_',' ',$this->application->status));
        
        $message = match($this->application->status) {
            'accepted' => '🎉 Congratulations! Your application has been ACCEPTED!',
            'rejected' => 'Unfortunately, your application was not successful this time.',
            'under_review' => 'Good news! Your application is now under review.',
            'documents_verified' => 'Your documents have been verified successfully.',
            default => 'Your application status has been updated.'
        };
        
        $mail = (new MailMessage)
            ->subject('Application Update: ' . $this->application->program->title)
            ->greeting('Hello '.$notifiable->name.',')
            ->line($message)
            ->line('**Program:** '.$this->application->program->title)
            ->line('**Current Stage:** '.$currentStage)
            ->line('**Status:** '.$status);
        
        if ($this->application->admin_notes) {
            $mail->line('**Message from Admin:**')
                 ->line($this->application->admin_notes);
        }
        
        return $mail->action('View Application Details', url(route('user.applications.show', $this->application->id)))
                    ->line('Thank you for choosing our program!');
    }

    public function toArray(object $notifiable): array
    {
        $stages = ProgramApplication::getStages();
        
        return [
            'application_id' => $this->application->id,
            'program_name' => $this->application->program->title ?? 'Program',
            'status' => $this->application->status,
            'current_stage' => $this->application->current_stage,
            'stage_label' => $stages[$this->application->current_stage] ?? 'Unknown',
            'admin_notes' => $this->application->admin_notes,
        ];
    }
}

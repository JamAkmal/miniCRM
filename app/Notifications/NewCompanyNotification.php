<?php

namespace App\Notifications;

use App\Models\Company;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCompanyNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $company;
    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        $url = route('company.index', $this->company->id);
        return (new MailMessage)
        ->line('A new company has been added:')
        ->line('Company Name: ' . $this->company->name)
        ->line('Email: ' . $this->company->email)
        ->line('Website: ' . $this->company->website)
        ->action('View Company', $url)
        ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'data' => 'A New Company Has been Created'
        ];
    }
}

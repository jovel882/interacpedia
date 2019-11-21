<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewCompany extends Notification
{
    use Queueable;
    
    public $company;
    
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($company)
    {
        $this->company=$company;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->success()
                    ->subject(__("page.companies.notify.subject"))
                    ->greeting(__("page.companies.notify.greeting"))
                    ->line(__("page.companies.notify.txt"))
                    ->action(__("page.companies.notify.action"), route('companies.show',['lang' => app()->getLocale(),'company'=>$this->company->id]));
    }    
}

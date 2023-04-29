<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUser extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
   
    private $new_user;

  
    public function __construct(User $new_user)
    {
        $this->new_user = $new_user;
    }

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
            ->greeting('New user has registered!')
            ->line('Name: ' . $this->new_user->name)
            ->line('Email: ' . $this->new_user->email)
            ->action('Approve', route('admin.users.approve', $this->new_user->id));
    }

   
}

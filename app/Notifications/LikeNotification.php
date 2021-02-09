<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LikeNotification extends Notification
{
    use Queueable;

    public $user;

    public $object_id;

    public $type;
    
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $post_id, $type)
    {
        $this->user = $user;
        $this->post_id = $post_id;
        $this->type = $type;
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
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'sender'    => [
                'id'        => $this->user->id,
                'name'      => $this->user->name,
                'image' => $this->user->profileImage,
            ],
            'post'      => $this->post_id,
            'type'      => $this->type
        ];
    }
}

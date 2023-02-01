<?php

namespace Dptsi\PushNotification\Channels;

use Illuminate\Notifications\Notification;

class FirebaseChannel
{
    /**
     * Send the given notification.
     */
    public function send($notifiable, Notification $notification)
    {
        /** @var \Dptsi\PushNotification\FirebaseMessage $message */
        $message = $notification->toFirebase($notifiable);
    }
}

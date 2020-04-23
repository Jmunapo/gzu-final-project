<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushMessage; //for push
use NotificationChannels\WebPush\WebPushChannel; //for push
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PushDemo extends Notification
{
    use Queueable;
    public function via($notifiable)
    {
        return [WebPushChannel::class]; //push channel
    }
    public function toWebPush($notifiable, $notification)
    {
        $msg = 'New student just applied';

        $name = request()->firstname;
        if(isset($name)){
            $msg = ucfirst($name).' just applied';
        }
        return (new WebPushMessage)
            ->title('New GZU Applicant')
            ->icon('/reg-icon.svg')
            ->body($msg)
            ->data(['id' => $notification->id])
            ->image('/reg-icon.svg');
    }
}
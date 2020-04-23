<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushMessage; //for push
use NotificationChannels\WebPush\WebPushChannel; //for push
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class EmergencyPush extends Notification
{
    use Queueable;
    public function via($notifiable)
    {
        return [WebPushChannel::class]; //push channel
    }
    public function toWebPush($notifiable, $notification)
    {
        $msg = 'Emergency message.';

        $subject = request()->subject;
        $address = request()->address;
        if(isset($subject)){
            $msg = ucfirst($subject).' emergency';

            if(isset($address)){
                $msg.=' at '.$address;
            }
        }
        return (new WebPushMessage)
            ->title('Emergency message')
            ->icon('/reg-icon.svg')
            ->body($msg)
            ->data(['id' => $notification->id])
            ->image('/reg-icon.svg');
    }
}
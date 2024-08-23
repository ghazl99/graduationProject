<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateCategory extends Notification implements ShouldQueue
{
    use Queueable;
  private $category_id;
  private $user_id;
  private $title;
  private $p;
  private $photo;
  private $link;

    /**
     * Create a new notification instance.
     */
    public function __construct($category_id,$user_id,$title,$p,$photo,$link)
    {
      $this->category_id=$category_id;
      $this->user_id=$user_id;
      $this->title=$title;
      $this->p=$p;
      $this->photo=$photo;
      $this->link=$link;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
        // return ['database','mail'];

    }

    // public function toMail(object $notifiable): MailMessage
    // {
    //   $url = url('/categories-page/' . $this->category_id); // Add category_id to the URL

    //   return (new MailMessage)

    //   ->greeting('SwiftShip')->error()
    //       ->line('تتشرف شركتنا  بأن تعلن عن إضافة صنف جديد إلى مجموعة منتجاتها المتنوعة.
    //        نحن نسعد بتقديم هذا الصنف الجديد الذي يضم خدمات ومزايا مبتكرة تسهم في تطوير عمليات الشحن وتلبية احتياجات عملائنا الكرام بشكل أفضل.')
    //       ->line('نحن نثق بأن هذا الصنف الجديد سيكون له تأثير إيجابي على عملياتكم وسيساهم في تحسين تجربتكم مع شركتنا. نحن متحمسون للغاية لمشاركتكم هذه الابتكارات ونتطلع إلى خدمتكم بشكل أفضل من خلال هذا الصنف الجديد.')
    //       ->from('swiftShip@gmail.com','SwiftShip')
    //       ->action('اضغط هنا لرؤية الأصناف', $url) // Use the modified URL
    //       ->line('شكرًا لتفهمكم ودعمكم المستمر. نحن ملتزمون بتقديم أفضل خدمة ممكنة لكم، ونتطلع إلى رأيكم وملاحظاتكم حول هذا الصنف الجديد وأي تحسينات مستقبلية قد ترغبون في رؤيتها.');
    // }
    public function toArray(object $notifiable): array
    {
        return [
            'id'=>$this->category_id,
            'user_id'=>$this->user_id,
            'title'=>$this->title,
            'paragraph'=>$this->p,
            'photo'=>$this->photo,
            'link'=>$this->link
        ];
    }
}

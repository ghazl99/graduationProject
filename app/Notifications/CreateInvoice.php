<?php

namespace App\Notifications;

use App\Models\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CreateInvoice extends Notification
{
    use Queueable;
    private $invoice_id;
    private $title;
    private $p;
    private $photo;
    private $link;

    /**
     * Create a new notification instance.
     */
    public function __construct($invoice_id,$title,$p,$photo,$link)
    {
      $this->invoice_id=$invoice_id;
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
        return ['database','mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
      $notification_id= DB::table('notifications')->where('data->id',$this->invoice_id)->pluck('id');
      DB::table('notifications')->whereIn('id', $notification_id)->where('notifiable_id', auth()->user()->id);
      $invoice = Invoice::with('shippingRequest.sender','shippingRequest.shipmentLines','shippingRequest.receiver','shippingRequest.source','shippingRequest.destination')->find($this->invoice_id);

      return (new MailMessage)->view('content.front-pages.invoiceEmail',compact('invoice'));

    }
    public function toArray(object $notifiable): array
    {
        return [
          'id'=>$this->invoice_id,
          'title'=>$this->title,
          'paragraph'=>$this->p,
          'photo'=>$this->photo,
          'link'=>$this->link
        ];
    }
}

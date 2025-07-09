<?php

namespace App\Notifications;

use App\Models\MembershipApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewMembershipApplicationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $application;

    /**
     * Create a new notification instance.
     */
    public function __construct(MembershipApplication $application)
    {
        $this->application = $application;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Membership Application - ' . $this->application->application_id)
            ->greeting('Hello Admin!')
            ->line('A new membership application has been submitted to Tanzania Youth Chamber of Commerce.')
            ->line('**Application Details:**')
            ->line('**Application ID:** ' . $this->application->application_id)
            ->line('**Name:** ' . $this->application->first_name . ' ' . $this->application->last_name)
            ->line('**Email:** ' . $this->application->email)
            ->line('**Phone:** ' . $this->application->phone)
            ->line('**Date of Birth:** ' . $this->application->date_of_birth)
            ->line('**Gender:** ' . ($this->application->gender ?? 'Not specified'))
            ->line('**Nationality:** ' . ($this->application->nationality ?? 'Not specified'))
            ->line('**Region:** ' . ($this->application->region ?? 'Not specified'))
            ->line('**District:** ' . ($this->application->district ?? 'Not specified'))
            ->lineIf($this->application->highest_level, '**Education Level:** ' . ($this->application->highest_level ?? 'Not specified'))
            ->lineIf($this->application->institution, '**Institution:** ' . ($this->application->institution ?? 'Not specified'))
            ->lineIf($this->application->field_of_study, '**Field of Study:** ' . ($this->application->field_of_study ?? 'Not specified'))
            ->lineIf($this->application->has_business, '**Has Business:** ' . ($this->application->has_business ? 'Yes' : 'No'))
            ->lineIf($this->application->business_name, '**Business Name:** ' . $this->application->business_name)
            ->lineIf($this->application->business_type, '**Business Type:** ' . $this->application->business_type)
            ->line('**Application Status:** ' . ucfirst(str_replace('_', ' ', $this->application->status)))
            ->line('**Submitted:** ' . $this->application->created_at->format('F j, Y \a\t g:i A'))
            ->action('View Application in Admin Panel', url('/admin/membership-applications/' . $this->application->id))
            ->line('Please review the application and take appropriate action.')
            ->salutation('Best regards, TYCC System');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'application_id' => $this->application->application_id,
            'applicant_name' => $this->application->first_name . ' ' . $this->application->last_name,
            'applicant_email' => $this->application->email,
            'submitted_at' => $this->application->created_at,
        ];
    }
}

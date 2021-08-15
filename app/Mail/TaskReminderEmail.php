<?php

namespace App\Mail;

use App\Models\Task;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TaskReminderEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $task;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Task $task, User $user)
    {
        $this->user = $user;
        $this->task = $task;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('TO-DO: Task Reminder')
            ->view('emails.task_reminder');
    }
}

<?php

namespace App\Console\Commands;

use App\Mail\TaskReminderEmail;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TaskReminderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:remind';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remind users of tasks with approaching due-dates';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $progressBar = $this->output->createProgressBar();
        $progressBar->start();
        $start = Carbon::now()->addHours(3)->subMinute();
        $end = Carbon::now()->addHours(3);
        $tasks = Task:: whereBetween('due_on', [$start, $end])->get();
        $tasks->each( function ($task) use ($progressBar){
            Mail::to($task->user->email)
                ->send(new TaskReminderEmail($task, $task->user));
            $progressBar->advance();
        });
        $progressBar->finish();
    }
}

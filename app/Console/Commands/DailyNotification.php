<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Log;
use App\Http\Services\UserService;
use App\Http\Services\DevotionService;
use App\Http\Services\NotificationService;


class DailyNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily_dotification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    protected $userService;
    protected $devotionService;
    protected $notificationService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct
    (
        UserService $userService,
        DevotionService $devotionService,
        NotificationService $notificationService    
    )
    {
        parent::__construct();
        $this->userService = $userService;
        $this->devotionService = $devotionService;
        $this->notificationService = $notificationService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        
        Log::info('Running Daily Notification schedules');

        $users = collect($this->userService->getAllUser());
        $devotion =  $this->devotionService->getAll()->first();

        $notifications = [];

        foreach($users as $key => $value) {
            if ($value['role'] != 'admin') {
                $notifications[] = [
                    'to' => $value['push_token'],
                    'title' => $devotion->title,
                    'body' => $devotion->description
                ];
            }
        }

        $this->notificationService->emeka($notifications);

        Log::info('Daily Notification schedules Complete');

    }
}

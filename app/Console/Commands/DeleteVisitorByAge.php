<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Visitor;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DeleteVisitorByAge extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deleteVisitorByAge
     {--S|seconds= : Delete visitors with X minutes of age.}
     {--m|minutes= : Delete visitors with X minutes of age.}
     {--H|hours= : Delete visitors with X hours of age.}
     {--D|days= : Delete visitors with X days of age.}
     {--W|weeks= : Delete visitors with X weeks of age.}
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'visitorqr: Delete visitors based on age after they are added to the system.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (!empty($this->option('seconds'))) {
            $optionSeconds = $this->option('seconds');
        } else {
            $optionSeconds = 0;
        }

        if (!empty($this->option('minutes'))) {
            $optionMinutes = $this->option('minutes');
            $optionMinutes = $optionMinutes * 60;
        } else {
            $optionMinutes = 0;
        }

        if (!empty($this->option('hours'))) {
            $optionHours = $this->option('hours');
            $optionHours = ($optionHours * 60) * 60;
        } else {
            $optionHours = 0;
        }

        if (!empty($this->option('days'))) {
            $optionDays = $this->option('days');
            $optionDays = (($optionDays * 24) * 60) * 60;
        } else {
            $optionDays = 0;
        }

        if (!empty($this->option('weeks'))) {
            $optionWeeks = $this->option('weeks');
            $optionWeeks = ((($optionWeeks * 7) * 24) * 60) * 60;
        } else {
            $optionWeeks = 0;
        }

        $totalAgeInSeconds = $optionSeconds + $optionMinutes + $optionHours + $optionDays + $optionWeeks;

        $this->info('<fg=black;bg=white>Total age limit in seconds: ' . $totalAgeInSeconds);
        Log::channel('deleteVisitorByAgeCommand')->info('Total age limit in seconds: ' . $totalAgeInSeconds);

        if (Visitor::first()) {

            $visitors = Visitor::select('uuid', 'created_at')->get();

            $now = Carbon::now();
            foreach ($visitors as $visitor) {
                $visitorAgeInSeconds = $visitor->created_at->diffInSeconds($now);
                $this->info('-----------------------------------------------------------');
                $this->info('Visitor UUID: ' . $visitor->uuid);
                $this->info('Visitor Created At: ' . $visitor->created_at);
                $this->info('Visitor Age In Seconds: ' . $visitorAgeInSeconds);

                // Deleting visitor if the age (in seconds) is more than the limit defined when running the command.
                if ($visitorAgeInSeconds > $totalAgeInSeconds) {

                    Visitor::where('uuid', $visitor->uuid)->delete();
                    $this->info('<fg=black;bg=white>Deleted visitor with UUID: ' . $visitor->uuid);
                    Log::channel('deleteVisitorByAgeCommand')->info('Deleted visitor with UUID: ' . $visitor->uuid);
                }
                $this->info('-----------------------------------------------------------');
            }
        } else {
            $this->info('No visitors found.');
            Log::channel('deleteVisitorByAgeCommand')->info('No visitors found.');
        }

        return Command::SUCCESS;
    }
}

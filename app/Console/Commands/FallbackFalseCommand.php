<?php

namespace App\Console\Commands;

use DB;
use Log;
use App\Post;
use Exception;
use App\Certificate;
use App\Replacement;
use Illuminate\Console\Command;
use App\Repositories\CertificateSource;

class FallbackFalseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'esijil:fallbackfalse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fallback false certificates';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CertificateSource $certificateSource)
    {
        parent::__construct();
        $this->certificateSource = $certificateSource;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info("Start Fallback False");

        $data = $this->certificateSource->fallbackFalse();

        $bar = $this->output->createProgressBar(count($data));

        foreach ($data as $row) {
            $certificate = Certificate::where('ic_number', $row->ic_number)
                ->where('batch_id', $row->batch_id)->first();

            if ($certificate) {
                try {
                    DB::transaction(function () use ($certificate) {
                        DB::table('replacements')->where('certificate_id', $certificate->id)->delete();
                        DB::table('posts')->where('certificate_id', $certificate->id)->delete();
                        DB::table('certificates')->where('id', $certificate->id)->delete();
                    });
                } catch (Exception $e) {
                    Log::error($e->getMessage());
                    echo "WARNING!: " . $e->getMessage();
                }
            }

            $bar->advance();
        }

        $bar->finish();

        $this->info("\nDone!");
    }
}

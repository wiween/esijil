<?php

namespace App\Console\Commands;

use App\MosqSKM;
use Illuminate\Console\Command;
use App\Repositories\CertificateSource;

class UpdateSKM extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'esijil-update:mosq-skm';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update mosq.skm when sebab cetak equal zero';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    private $certificateSource;

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
        $this->info("Start updating...");

        $data = $this->certificateSource->updateSKMSource();
        $bar = $this->output->createProgressBar(count($data));
        
        foreach ($data as $row)
        {
            $skm = MosqSKM::find($row->id_skm);
            $skm->no_sijil = $row->certificate_number;
            $skm->tarikh_cetak = $row->date_print;
            $skm->sebab_cetak = 1;
            $skm->save();
            $bar->advance();
        }

        $bar->finish();
        $this->info("\nDone!");
    }
}

<?php

namespace App\Console\Commands;

use App\Certificate;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use App\Repositories\CertificateSource;

class ImportCertificates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import-certificates:mosq';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Certificates from mosql database using API';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    private $client = null;
    private $certificateSource = null;

    public function __construct(Client $guzzleClient, CertificateSource $certificateSource)
    {
        parent::__construct();
        $this->client = $guzzleClient;
        $this->certificateSource = $certificateSource;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info("Start importing...");
        /* $response = $this->client->request('GET', env('MOSQ_IMPORT_CERTIFICATES_URL'));
        $data = json_decode($response->getBody()); */

        $data = $this->certificateSource->certSource();
        
        $bar = $this->output->createProgressBar(count($data));

        foreach($data as $row)
        {
            if($this->getOutput()->isVerbose())
                $this->info("\nImport ". $row->name);

            Certificate::updateOrCreate(
                ['ic_number' => $row->ic_number, 'batch_id' => $row->batch_id],
                [
                    'name' => $row->name,
                    'ic_number' => $row->ic_number,
                    'programme_name' => $row->programme_name,
                    'programme_code' => $row->programme_code,
                    'type' => $row->type,
                    'level' => $row->level,
                    'pb_name' => $row->pb_name,
                    'state_id' => $row->state_id,
                    'date_ppl' => $row->date_ppl,
                    'result_ppl' => $row->result_ppl,
                    'batch_id' => $row->batch_id,
                    'address' => $row->address,
                ]
            );

            $bar->advance();
        }

        $bar->finish();

        $this->info("\nDone!");
    }
}

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
                [
                    'ic_number' => trim($row->ic_number),
                    'batch_id' => trim($row->batch_id),
                    'programme_code' => trim($row->programme_code),
                    'level' => strtoupper($this->contructLevel(trim($row->programme_code), 'tahap'))
                ],
                [
                    'name' => trim($row->name),
                    'ic_number' => trim($row->ic_number),
                    'programme_name' => trim ($row->programme_name),
                    'programme_code' => trim ($row->programme_code),
                    'type' => trim ($row->type),
                    'level' => strtoupper($this->contructLevel(trim($row->programme_code), 'tahap')),
                    'kod_pusat' => trim($row->kod_pusat),
                    'pb_name' => trim ($row->pb_name),
                    'state_id' => trim ($row->state_id),
                    'date_ppl' => trim ($row->date_ppl),
                    'result_ppl' => trim ($row->result_ppl),
                    'batch_id' => trim ($row->batch_id),
                    'address' => trim ($row->address),
                    'tarikh_ppl' => trim ($row->tarikh_ppl),
                    'nama_syarikat' => trim ($row->nama_syarikat),
                    'negeri_syarikat' => trim ($row->negeri_syarikat),
                    'ndt_sah_mula' => trim ($row->ndt_sah_mula),
                    'ndt_sah_tamat' => trim ($row->ndt_sah_tamat),
                    'tarikh_ndt_terdahulu' => trim ($row->tarikh_ndt_terdahulu),
                    'tarikh_mesy_ndt' => trim ($row->tarikh_mesy_ndt),
                    'nama_program_terdahulu' => trim ($row->nama_program_terdahulu),
                    'no_sijil_dahulu' => trim ($row->no_sijil_dahulu),
                    'tarikh_sijil_baru_mula' => trim ($row->tarikh_sijil_baru_mula),
                    'jenis_sijil' => trim ($row->jenis_sijil),
                ]
            );

            $bar->advance();
        }

        $bar->finish();

        $this->info("\nDone!");
    }

    private function contructLevel($code, $pre = '')
    {
        if (strpos($code, ':') || strpos($code, ';'))
        {
            if(strpos($code, ':'))
                return $this->hasYearDeli($code, $pre, ':');
            elseif (strpos($code, ';'))
                return $this->hasYearDeli($code, $pre, ';');
        }
        else
        {
            if(isset(explode('-', $code)[2]))
                return ($pre) ? trim($pre) . " " . $this->certificateSource->numToWord(explode('-', $code)[2]) : $this->certificateSource->numToWord(explode('-', $code)[2]);
            
            return 'pc';
        }
    }

    private function hasYearDeli($code, $pre, $deli)
    {
        if (isset(explode('-', $code)[2]))
            return ($pre) ? trim($pre) . " " . $this->certificateSource->numToWord(explode($deli, explode('-', $code)[2])[0]) : $this->certificateSource->numToWord(explode($deli, explode('-', $code)[2])[0]);

        return 'pc';
    }
}

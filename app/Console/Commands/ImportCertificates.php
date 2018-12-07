<?php

namespace App\Console\Commands;

use App\Certificate;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
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

        foreach ($data as $row) {
            if ($this->getOutput()->isVerbose())
                $this->info("\nImport " . $row->name);

            try {
                Certificate::updateOrCreate(
                    ['ic_number' => trim($row->ic_number), 'batch_id' => trim($row->batch_id), 'programme_code' => trim($row->programme_code)],
                    [
                        'name' => trim($row->name) ?? null,
                        'ic_number' => trim($row->ic_number) ?? null,
                        'programme_name' => trim($row->programme_name) ?? null,
                        'programme_code' => trim($row->programme_code) ?? null,
                        'type' => trim($row->type) ?? null,
                        'level' => strtoupper($this->constructLevel($row, 'tahap')) ?? null,
                        'kod_pusat' => trim($row->kod_pusat) ?? null,
                        'pb_name' => trim($row->pb_name) ?? null,
                        'state_id' => trim($row->state_id) ?? null,
                        'date_ppl' => trim($row->date_ppl) ?? null,
                        'result_ppl' => trim($row->result_ppl) ?? null,
                        'batch_id' => trim($row->batch_id) ?? null,
                        'address' => trim($row->address) ?? null,
                        'tarikh_ppl' => trim($row->tarikh_ppl) ?? null,
                        'nama_syarikat' => trim($row->nama_syarikat) ?? null,
                        'negeri_syarikat' => trim($row->negeri_syarikat),
                        'ndt_sah_mula' => trim($row->ndt_sah_mula) ?? null,
                        'ndt_sah_tamat' => trim($row->ndt_sah_tamat) ?? null,
                        'tarikh_ndt_terdahulu' => trim($row->tarikh_ndt_terdahulu) ?? null,
                        'tarikh_mesy_ndt' => ($row->tarikh_mesy_ndt && $row->tarikh_mesy_ndt !== '0000-00-00') ? trim($row->tarikh_mesy_ndt) : null,
                        'nama_program_terdahulu' => trim($row->nama_program_terdahulu) ?? null,
                        'no_sijil_dahulu' => trim($row->no_sijil_dahulu) ?? null,
                        'tarikh_sijil_baru_mula' => trim($row->tarikh_sijil_baru_mula) ?? null,
                        'jenis_sijil' => trim($row->jenis_sijil) ?? null,
                    ]
                );
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                echo "WARNING!: " . $e->getMessage();
            }

            $bar->advance();
        }

        $bar->finish();

        $this->info("\nDone!");
    }

    private function constructLevel($record, $pre = '')
    {
        if ($record->type == 'pb') {
            if (strpos($record->programme_code, ':') || strpos($record->programme_code, ';')) {
                if (strpos($record->programme_code, ':'))
                    return $this->hasYearDeli($record->programme_code, $pre, ':');
                elseif (strpos($record->programme_code, ';'))
                    return $this->hasYearDeli($record->programme_code, $pre, ';');
            } else {
                if (isset(explode('-', $record->programme_code)[2]))
                    return ($pre) ? trim($pre) . " " . $this->certificateSource->numToWord(explode('-', $record->programme_code)[2]) : $this->certificateSource->numToWord(explode('-', $record->programme_code)[2]);

                return null;
            }
        } else {
            return trim($pre) . " " . $this->certificateSource->numToWord($record->level);
        }
    }

    private function hasYearDeli($code, $pre, $deli)
    {
        if (isset(explode('-', $code)[2]))
            return ($pre) ? trim($pre) . " " . $this->certificateSource->numToWord(explode($deli, explode('-', $code)[2])[0]) : $this->certificateSource->numToWord(explode($deli, explode('-', $code)[2])[0]);

        return 'pc';
    }
}

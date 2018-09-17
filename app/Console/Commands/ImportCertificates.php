<?php

namespace App\Console\Commands;

use App\Certificate;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

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

    public function __construct(Client $guzzleClient)
    {
        parent::__construct();
        $this->client = $guzzleClient;
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

        $data = DB::select("select c.nama_pelatih as name, c.ic_or_passport as ic_number,
            d.nama_program as programme_name, d.kod_program as programme_code, null as type,
            null as level, e.nama_pusat as pb_name, g.id as state_id,
            if(f.to_visit_date_tamat = '0000-00-00', null, to_visit_date_tamat) as date_ppl,
            a.keputusan_ppl as result_ppl, b.no_batch as batch_id, IFNULL(c.no_rumah, e.alamat_sykt) as address
            from mosq.penilaian_bukan_kredit as a
            join mosq.daftar_batch as b on a.batch_id = b.id
            join mosq.profil_pelatih as c on a.pelatih_id = c.id
            join mosq.program as d on b.program_id = d.id
            join mosq.pb as e on b.pusat_id = e.id
            left join mosq.urus_ppl as f on a.urus_ppl_id = f.id
            join mosq.negeri as g on g.kod_negeri = e.kod_negeri
            where 1 = 1
            and keputusan_ppl = 1");
        
        $bar = $this->output->createProgressBar(count($data));

        foreach($data as $row)
        {
            if($this->getOutput()->isVerbose())
                $this->info("\nImport ". $row->name);

            Certificate::updateOrCreate(
                ['ic_number' => $row->ic_number],
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

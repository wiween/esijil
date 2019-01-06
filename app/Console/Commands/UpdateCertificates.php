<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\CertificateSource;

class UpdateCertificates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'esijil:update-certificates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update certifcates where certifcates number is not null to printed equel to Y';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    private $_certificateSource;

    public function __construct(CertificateSource $certificateSource)
    {
        parent::__construct();
        $this->_certificateSource = $certificateSource;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info("Start update...");
        $this->_certificateSource->updateCertificateToY();
        $this->info("\nSuccessful update.");
    }
}

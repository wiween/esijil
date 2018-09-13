<?php

use Illuminate\Database\Seeder;

class CertificateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('certificates')->delete();

        $print = new \App\Certificate();
        $print->name = 'Maslina Maslan';
        $print->ic_number = '80080808888';
        $print->programme_name = 'OERASI EMU';
        $print->programme_code = 'GHK006';
        $print->type = 'ndt';
        $print->level = 'Tahap Dua';
        $print->pb_name = 'Maju Jaya';
        $print->state_id = '1';
        $print->address = '39, Jalan Nusaputra Puchong';
        $print->date_ppl = '2018-06-06';
        $print->result_ppl = 'T';
        $print->batch_id = 'B0109';
        $print->status = 'active';
        $print->remark = '';
        $print->save();

        $print = new \App\Certificate();
        $print->name = 'Farah Nur Adlina';
        $print->ic_number = '111111111111';
        $print->programme_name = 'OERASI EMU';
        $print->programme_code = 'GHK006';
        $print->type = 'sldn';
        $print->level = 'Tahap Dua';
        $print->pb_name = 'Maju Jaya';
        $print->state_id = '2';
        $print->address = '39, Jalan Nusaputra Puchong';
        $print->date_ppl = '2018-06-06';
        $print->result_ppl = 'T';
        $print->batch_id = 'B0209';
        $print->status = 'active';
        $print->remark = '';
        $print->save();

        $print = new \App\Certificate();
        $print->name = 'Azim Farhan';
        $print->ic_number = '11888007765';
        $print->programme_name = 'OERASI EMU';
        $print->programme_code = 'GHK006';
        $print->type = 'sldn';
        $print->level = 'Tahap Empat';
        $print->pb_name = 'Maju Jaya';
        $print->state_id = '1';
        $print->address = '39, Jalan Nusaputra Puchong';
        $print->date_ppl = '2018-06-06';
        $print->result_ppl = 'T';
        $print->batch_id = 'B0109';
        $print->status = 'active';
        $print->remark = '';
        $print->save();

        $print = new \App\Certificate();
        $print->name = 'Alia';
        $print->ic_number = '66666666666';
        $print->programme_name = 'OERASI EMU';
        $print->programme_code = 'GHK006';
        $print->type = 'pb';
        $print->level = 'Tahap Empat';
        $print->pb_name = 'Maju Jaya';
        $print->state_id = '7';
        $print->address = '39, Jalan Nusaputra Puchong';
        $print->date_ppl = '2018-06-06';
        $print->result_ppl = 'T';
        $print->batch_id = 'M0109';
        $print->status = 'active';
        $print->remark = '';
        $print->save();

        $print = new \App\Certificate();
        $print->name = 'Kamal';
        $print->ic_number = '44444444444';
        $print->programme_name = 'OERASI EMU';
        $print->programme_code = 'GHK006';
        $print->type = 'pb';
        $print->level = 'Tahap Empat';
        $print->pb_name = 'Maju Jaya';
        $print->state_id = '7';
        $print->address = '39, Jalan Nusaputra Puchong';
        $print->date_ppl = '2018-06-06';
        $print->result_ppl = 'T';
        $print->batch_id = 'M0109';
        $print->status = 'active';
        $print->remark = '';
        $print->save();
    }
}

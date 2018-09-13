<?php

use Illuminate\Database\Seeder;

class EspkmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('Espkms')->delete();

        $print = new \App\Espkm();
        $print->name = 'Ali Kasim';
        $print->ic_number = '2222222222222';
        $print->training_group_number = 'TP-711-667';
        $print->programme_name = 'OERASI EMU';
        $print->programme_code = 'GHK006';
        $print->type = 'pb';
        $print->level = 'pc';
        $print->pb_name = 'Maju Jaya';
        $print->state_id = '1';
        $print->address = '39, Jalan Nusaputra Puchong';
        $print->date_ppl = '2018-06-06';
        $print->result_ppl = 'T';
        $print->batch_id = 'B0108';
        $print->flag_boarded = 'N';
        $print->status = 'active';
        $print->remark = '';
        $print->save();

        $print = new \App\Espkm();
        $print->name = 'Tina Tunner';
        $print->ic_number = '303030303030';
        $print->training_group_number = 'TP-711-667';
        $print->programme_name = 'OERASI EMU';
        $print->programme_code = 'GHK006';
        $print->type = 'pb';
        $print->level = 'Tahap Dua';
        $print->pb_name = 'Maju Jaya';
        $print->state_id = '1';
        $print->address = '39, Jalan Nusaputra Puchong';
        $print->date_ppl = '2018-06-06';
        $print->result_ppl = 'T';
        $print->batch_id = 'B0108';
        $print->flag_boarded = 'N';
        $print->status = 'active';
        $print->remark = '';
        $print->save();

        $print = new \App\Espkm();
        $print->name = 'Aiman Tino';
        $print->ic_number = '101010101010';
        $print->training_group_number = 'TP-711-667';
        $print->programme_name = 'OERASI EMU';
        $print->programme_code = 'GHK006';
        $print->type = 'pb';
        $print->level = 'Tahap Empat';
        $print->pb_name = 'Maju Jaya';
        $print->state_id = '1';
        $print->address = '39, Jalan Nusaputra Puchong';
        $print->date_ppl = '2018-06-06';
        $print->result_ppl = 'T';
        $print->batch_id = 'B0108';
        $print->flag_boarded = 'N';
        $print->status = 'active';
        $print->remark = '';
        $print->save();

        $print = new \App\Espkm();
        $print->name = 'Haqim Rusli';
        $print->ic_number = '202020202020';
        $print->training_group_number = 'TP-711-667';
        $print->programme_name = 'OERASI EMU';
        $print->programme_code = 'GHK006';
        $print->type = 'pb';
        $print->level = 'Tahap Lima';
        $print->pb_name = 'Maju Jaya';
        $print->state_id = '1';
        $print->address = '39, Jalan Nusaputra Puchong';
        $print->date_ppl = '2018-06-06';
        $print->result_ppl = 'T';
        $print->batch_id = 'B0108';
        $print->flag_boarded = 'N';
        $print->status = 'active';
        $print->remark = '';
        $print->save();

    }
}

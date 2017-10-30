<?php

use Illuminate\Database\Seeder;
use Crockett\CsvSeeder\CsvSeeder;

class PortsTableSeeder extends CsvSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->filename = storage_path('/country.csv');
        $this->table = 'country_ports';
        $this->insert_chunk_size =0;
        parent::run();

        DB::table('country_ports')->update(['created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')]);

        $this->filename = storage_path('/ports.csv');
        $this->table = 'ports_name';
        $this->insert_chunk_size =0;
        $this->write_logs =false;
        $this->disable_query_log =true;
        parent::run();

        DB::table('ports_name')->update(['created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')]);

    }
}

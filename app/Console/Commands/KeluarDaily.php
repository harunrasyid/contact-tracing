<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class KeluarDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'keluar:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Keluar ruangan secara otomatis';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        \App\Models\lokasi_kegiatan::whereNull('keluar_at')->update(['keluar_at'=>now()]);
    }
}

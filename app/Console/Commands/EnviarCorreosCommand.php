<?php

namespace App\Console\Commands;

use App\Mail\CorreoDiarioNoticias;
use Illuminate\Console\Command;
use App\Post;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
class EnviarCorreosCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maildiario:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        //if(Post::whereDate("created_at",date("Y-m-d"))->count() >= 1){
            Mail::to("jose2001ascurra@gmail.com")->send(new CorreoDiarioNoticias(Post::all()));
            Log::info("Hola a todos");
        //}
    }
}

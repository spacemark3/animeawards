<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Jikan\AnimeMapper;
use App\Services\Jikan\JikanClient;
use App\Services\Jikan\AnimeImporter;

class ImportAnimeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'anime:import {page=1 : Pagina API da cui partire}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importa anime dalla API Jikan e li salva nel database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $page = $this->argument('page');

        $client = new JikanClient();
        $importer = new AnimeImporter();

        $this->info("Fetching top anime from page {$page}...");

        $rawAnimes = $client->fetchTopAnime($page);

        foreach ($rawAnimes as $rawAnime) {
            $dto = AnimeMapper::map($rawAnime);
            $importer->import($dto);
            $this->line("Imported: {$dto->title}");
        }

        $this->info('Import completed.');

        return Command::SUCCESS;
    }
}

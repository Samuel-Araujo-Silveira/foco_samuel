<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\XmlController;

class ImportXmlData extends Command
{
    protected $signature = 'app:import-xml';
    protected $description = 'Importa dados dos arquivos XML para o banco de dados';

    public function handle()
    {
        $xmlController = new XmlController();
        $success = $xmlController->readXml();

        if ($success) {
            $this->info('Importação concluída com sucesso.');
        } else {
            $this->error('Ocorreu um erro durante a importação.');
        }
    }
}

<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;



Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('app:import-xml', function () {
    $this->call('App\Console\Commands\ImportXmlData');
})->describe('Importa dados dos arquivos XML para o banco de dados');


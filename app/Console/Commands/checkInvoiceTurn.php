<?php

namespace App\Console\Commands;

use App\Models\Card;
use App\Models\Expense;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Container\Attributes\Log;
use Illuminate\Support\Facades\Log as FacadesLog;

class checkInvoiceTurn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-invoice-turn';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Todo dia 01 do mês ele realiza as validações estipuladas.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Expense::whereIn('category_id', '!=', [1, 2])
            ->where('installment_id', 1)
            ->delete();

        $parcelados = Expense::where('installment_id', '!=', 1)->get();
        foreach ($parcelados as $parcelado) {
            if (date('m', $parcelado->end_date) >= date('m')) {
                $parcelado->delete();
            }
        }
    }
}

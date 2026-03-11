<?php

namespace App\Console\Commands;

use App\Models\Expense;
use Illuminate\Console\Command;

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
    protected $description = 'Verifica uma vez ao dia qual a data atual a fim de validar se a fatura fechou.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (date("d") == 1) {
            Expense::whereIn('category_id', '!=', [1,2])
            ->where('installment_id', 1)
            ->delete();
        }

        $parcelados = Expense::where('installment_id', '!=', 1)->get();
        foreach ($parcelados as $parcelado) {
            if (date('m', $parcelado->end_date) >= date('m')) {
                $parcelado->delete();
            }
        }
    }
}

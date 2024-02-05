<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTransactionToDay()
    {
        $today = now()->format('Y-m-d');
        $transactionsToday = Transaction::whereDate('date_transaction', $today)->get();
        $totalPriceToday = 0;

        foreach ($transactionsToday as $transaction) {
            $totalPriceToday += $transaction->total_price;
        }

        return $totalPriceToday;
    }

    public function getTransactionThisMonth()
    {
        $startOfMonth = now()->startOfMonth();
        $endOfMonth = now()->endOfMonth();

        $transactionsThisMonth = Transaction::whereBetween('date_transaction', [$startOfMonth, $endOfMonth])->get();
        $totalTransactionsThisMonth = $transactionsThisMonth->count();

        $totalPriceThisMonth = 0;

        foreach ($transactionsThisMonth as $transaction) {
            $totalPriceThisMonth += $transaction->total_price;
        }

        return $totalPriceThisMonth;
    }

    public function getTotalTransactionToday()
    {
        $today = now()->format('Y-m-d');
        $transactionsToday = Transaction::whereDate('date_transaction', $today)->count();

        return $transactionsToday;
    }

    public function getTotalTransactionThisMonth()
    {
        $startOfMonth = now()->startOfMonth();
        $endOfMonth = now()->endOfMonth();

        $totalTransactionsThisMonth = Transaction::whereBetween('date_transaction', [$startOfMonth, $endOfMonth])->count();

        return $totalTransactionsThisMonth;
    }

    public function getTableTransactionToday()
    {
        $today = now()->format('Y-m-d');
        return Transaction::whereDate('date_transaction', $today)
            ->latest()
            ->paginate(15);
    }

    public function getTableTransactionThisMonth()
    {
        $startOfMonth = now()->startOfMonth();
        $endOfMonth = now()->endOfMonth();
        return Transaction::whereBetween('date_transaction', [$startOfMonth, $endOfMonth])
            ->latest()
            ->paginate(15);
    }

    public function getFilteredTransactions($startDate, $endDate)
    {
        return Transaction::with('user')
            ->whereBetween('date_transaction', [$startDate, $endDate])
            ->latest()
            ->paginate(15);
    }

    public function myTransactionFilterDate($startDate, $endDate)
    {
        $startDate && $endDate == null
            ? ($myTransactions = Transaction::where('user_id', Auth::user()->id)->paginate(15))
            : ($myTransactions = Transaction::where('user_id', Auth::user()->id)
                ->whereBetween('date_transaction', [$startDate, $endDate])
                ->paginate(15));

        return $myTransactions;
    }
}

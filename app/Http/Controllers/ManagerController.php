<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\ActivityHistory;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    public function index()
    {
        $transaction = new Transaction();

        return view('dashboard.manager.dashboard', [
            'title' => 'Dashboard Manager',
            'total_products' => Product::count(),
            'total_category_products' => CategoryProduct::count(),
            'transaction_today' => $transaction->getTransactionToDay(),
            'total_transaction_today' => $transaction->getTotalTransactionToday(),
            'transaction_this_month' => $transaction->getTransactionThisMonth(),
            'total_transaction_this_month' => $transaction->getTotalTransactionThisMonth(),
        ]);
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        $activity = [
            'fullname' => $user->fullname,
            'position' => optional($user->position)->position_name,
            'action' => 'Logout',
            'description' => 'Logout Successfully',
        ];

        ActivityHistory::create($activity);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('logout', 'You have successfully logged out.');
    }

    public function activity()
    {
        return view('dashboard.manager.activityHistory', [
            'title' => 'Activity History',
            'activityHistories' => ActivityHistory::latest()->paginate(15),
        ]);
    }

    public function transactionHistory()
    {
        return view('dashboard.manager.transactionHistory', [
            'title' => 'Transaction History',
            'transactions' => Transaction::with('user')
                ->latest()
                ->paginate(15),
        ]);
    }

    public function transactionSearch(Request $request)
    {
        $search = $request->input('search');
        $query = Transaction::with('user')->latest();

        if ($search !== null) {
            $query->whereHas('user', function ($userQuery) use ($search) {
                $userQuery->whereHas('position', function ($positionQuery) use ($search) {
                    $positionQuery->where('position_name', 'like', '%' . $search . '%');
                });
            });
        }

        $transactions = $query->paginate(15);

        return view('dashboard.manager.transactionHistory', [
            'title' => 'Transaction History',
            'transactions' => $transactions,
            'search' => $search,
        ]);
    }
    public function transactionFilter(Request $request)
    {
        $filter = $request->input('filter');

        $transaction = new Transaction();

        if ($filter === 'all' || $filter === null) {
            $transactions = Transaction::with('user')
                ->latest()
                ->paginate(15);
        } elseif ($filter === 'daily') {
            $transactions = $transaction->getTableTransactionToday();
        } elseif ($filter === 'monthly') {
            $transactions = $transaction->getTableTransactionThisMonth();
        }

        return view('dashboard.manager.transactionHistory', [
            'title' => 'Transaction History',
            'transactions' => $transactions,
        ]);
    }

    public function transactionFilterDate(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $transaction = new Transaction();
        $filteredTransactions = $transaction->getFilteredTransactions($startDate, $endDate);

        return view('dashboard.manager.transactionHistory', [
            'title' => 'Transaction History',
            'transactions' => $filteredTransactions,
        ]);
    }
}

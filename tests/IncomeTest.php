<?php

use PHPUnit\Framework\TestCase;

/* For testing, run the command "./vendor/bin/phpunit --testdox tests" for a prettier display of results */

class Transaction
{
    private $type;
    private $category;
    private $amount;

    public function __construct($type, $category, $amount)
    {
        $this->type = $type;
        $this->category = $category;
        $this->amount = $amount;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getAmount()
    {
        return $this->amount;
    }
}

class FinanceTracker
{
    private $transactions;

    public function __construct()
    {
        $this->transactions = [];
    }

    public function addTransaction(Transaction $transaction)
    {
        $this->transactions[] = $transaction;
    }

    public function getTransactions()
    {
        return $this->transactions;
    }

    public function calculateTotalBalance()
    {
        $balance = 0;
        foreach ($this->transactions as $transaction) {
            if ($transaction->getType() === 'Income') {
                $balance += $transaction->getAmount();
            } elseif ($transaction->getType() === 'Expense') {
                $balance -= $transaction->getAmount();
            }
        }
        return $balance;
    }
}

class FinanceTrackerTest extends TestCase
{
    public function testAddTransaction()
    {
        $financeTracker = new FinanceTracker();

        $transaction = new Transaction('Expense', 'Gas', 10);
        $financeTracker->addTransaction($transaction);

        $transactions = $financeTracker->getTransactions();
        $this->assertCount(1, $transactions);
        $this->assertSame($transaction, $transactions[0]);
    }

    public function testCalculateTotalBalance()
    {
        $financeTracker = new FinanceTracker();

        $transaction1 = new Transaction('Income', 'Freelance Project', 2000);
        $transaction2 = new Transaction('Expense', 'House Rent', 800);

        $financeTracker->addTransaction($transaction1);
        $financeTracker->addTransaction($transaction2);

        $balance = $financeTracker->calculateTotalBalance();
        $this->assertEquals(1200, $balance);
    }

    public function testGetTransactions()
    {
        $financeTracker = new FinanceTracker();

        $transaction1 = new Transaction('Expense', 'Food', 10);
        $transaction2 = new Transaction('Expense', 'Rent', 800);

        $financeTracker->addTransaction($transaction1);
        $financeTracker->addTransaction($transaction2);

        $transactions = $financeTracker->getTransactions();
        $this->assertCount(2, $transactions);
        $this->assertSame($transaction1, $transactions[0]);
        $this->assertSame($transaction2, $transactions[1]);
    }

    public function testEmptyFinanceTracker()
    {
        $financeTracker = new FinanceTracker();

        $transactions = $financeTracker->getTransactions();
        $this->assertEmpty($transactions);

        $balance = $financeTracker->calculateTotalBalance();
        $this->assertSame(0, $balance);
    }
}

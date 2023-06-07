<?php
use PHPUnit\Framework\TestCase;
/* For testing write command "./vendor/bin/phpunit --testdox tests" for prittier display of results */
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
    
    $transaction1 = new Transaction('Income', 'Freelance project', 2000);
    $transaction2 = new Transaction('Expense', 'House rent', 800);
    
    $financeTracker->addTransaction($transaction1);
    $financeTracker->addTransaction($transaction2);
    
    $balance = $financeTracker->calculateTotalBalance();
    $this->assertEquals(1200, $balance);
}
}
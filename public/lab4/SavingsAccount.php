<?php

require_once "BankAccount.php";

class SavingsAccount extends BankAccount
{
    public static $interestRate = 5; // % ставка

    public function applyInterest()
    {
        $interest = $this->balance * (self::$interestRate / 100);
        $this->balance += $interest;
    }
}

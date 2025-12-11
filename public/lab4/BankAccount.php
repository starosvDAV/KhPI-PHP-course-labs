<?php

require_once "AccountInterface.php";

class BankAccount implements AccountInterface
{
    const MIN_BALANCE = 0;

    protected $balance;
    protected $currency;

    public function __construct($currency, $initialBalance = 0)
    {
        if ($initialBalance < self::MIN_BALANCE) {
            throw new Exception("Початковий баланс не може бути меншим за " . self::MIN_BALANCE);
        }

        $this->currency = $currency;
        $this->balance = $initialBalance;
    }

    public function deposit($amount)
    {
        if ($amount <= 0) {
            throw new Exception("Сума поповнення повинна бути додатньою.");
        }

        $this->balance += $amount;
    }

    public function withdraw($amount)
    {
        if ($amount <= 0) {
            throw new Exception("Сума зняття повинна бути додатньою.");
        }

        if ($amount > $this->balance) {
            throw new Exception("Недостатньо коштів");
        }

        $this->balance -= $amount;
    }

    public function getBalance()
    {
        return $this->balance . " " . $this->currency;
    }
}

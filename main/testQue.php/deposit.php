<?php
class BankAccount {
    public $account;
    public $bank;
    private $balance = 1000;

    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance = $this->balance + $amount;
            echo "Balance is: " . $this->balance;
        } else {
            echo "Invalid amount!";
        }
    }

    public function display() {
        echo "Balance is: " . $this->balance;
    }
}

$b = new BankAccount();
$b->deposit(500);   // amount pass 
echo "<br>";
$b->display();
?>
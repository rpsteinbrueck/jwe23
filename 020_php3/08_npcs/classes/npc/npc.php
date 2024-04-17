<?php
#########################
# namespace
#########################
namespace rpsteinbrueck\jwe23\classes\npc;


#########################
# class
#########################
abstract class npc {

    #########################
    # properties
    #########################
    private $name;
    private $occupation;
    private $monthly_salary;
    private $bankaccount;

    #########################
    # magic methods
    #########################
    public function __construct(string $name, $bankaccount) {
        $this->name = $name;
        $this->occupation = "Dr.";
        $this->monthly_salary = 5000;
        $this->bankaccount = $bankaccount;
    }

    abstract public function work(): string;

    public function details(): string {
        $details = "Name: " . $this->name;
        $details .= "Occupation: " . $this->occupation;
        $details .= "Monthly Salary: " . $this->monthly_salary;
        $details .= "Bank account: " . $this->bankaccount;

        return $details; 
    }
}
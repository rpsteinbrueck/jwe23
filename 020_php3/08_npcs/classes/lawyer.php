<?php
#########################
# namespace
#########################
namespace rpsteinbrueck\jwe23\classes;
use rpsteinbrueck\jwe23\classes\abstract_npc;

#########################
# class
#########################
class lawyer extends abstract_npc {

    #########################
    # properties
    #########################

    #########################
    # magic methods
    #########################
    public function __construct(string $name, $occupation = "lawyer", $monthly_salary = 7000, $bankaccount) {
        $this->name = $name;
        $this->name = $occupation;
        $this->name = $monthly_salary;
        $this->name = $bankaccount;
    }

    #########################
    # methods
    #########################
    public function work(): string {
        return "Going to court today to defend a client";
    }
}
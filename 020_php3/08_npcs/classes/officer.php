<?php
#########################
# namespace
#########################
namespace rpsteinbrueck\jwe23\classes;
use rpsteinbrueck\jwe23\classes\abstract_npc;

#########################
# class
#########################
class officer extends abstract_npc {

    #########################
    # properties
    #########################

    #########################
    # magic methods
    #########################
    public function __construct(string $name, $occupation = "officer", $monthly_salary = 4500, $bankaccount) {
        $this->name = $name;
        $this->name = $occupation;
        $this->name = $monthly_salary;
        $this->name = $bankaccount;
    }

    #########################
    # methods
    #########################
    public function work(): string {
        return "Going on patrol, to watch the neighborhood";
    }
}
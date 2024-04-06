<?php



class animals_abstract {

    private string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function get_name(): string {
        return $this->name;
    }

    public function introduce(): string {
        return "Hi this is " . $this->name . ".";
    }

}


?>
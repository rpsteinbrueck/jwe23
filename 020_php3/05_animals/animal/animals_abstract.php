<?php
namespace rpsteinbrueck\jwe23\animal;
# ^ for above: namespace for the project, specifically for this class
# namespaces are used to allow classes which are named the same in the same porject or different projects.
#

# abstract before class means this class cannot be used as a class to 
# create an object as is and must be extended in a none abstract class.
abstract class animals_abstract {

    # visibility modifiers for properties
    # public scope to make that property/method available from anywhere, other classes and instances of the object.
    # private scope when you want your property/method to be visible in its own class only.
    # protected scope when you want to make your property/method visible in all classes that extend current class including the parent class.
    
    # protected string $name;
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

    # abstract before method function means that this method should
    # be declared on child classes which use this parent class
    abstract public function favourite_food(): string;

}

?>
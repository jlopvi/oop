<?php

function show($message)
{
    echo "<p>$message</p>";
}

abstract class Unit {
    protected $alive = true;
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function move($direction)
    {
        show("{$this->name} se mueve hacia $direction");
    }

    abstract public function attack($opponet);

    public function dies()
    {
        show("{$this->name} Muere");
    }
}

class Soldier extends Unit
{
    public function attack($opponet)
    {
        show(
            "{$this->name} corta a {$opponet->getName()} en dos."
        );
        $opponet->dies();
    }
}

class Archer extends Unit
{
    public function attack($opponet)
    {
        show("{$this->name} lanza flechas a {$opponet->getName()}");
        $opponet->dies();
    }
}

$jeez = new Soldier('jeez');
$jeez->move('el norte');


$jlopvi = new Archer('jlopvi');

$jeez->attack($jlopvi);

 ?>

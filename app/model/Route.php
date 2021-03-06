<?php
namespace Model;

/**
 * Class Route
 * Represent le matched route
 */
class Route {

    /**
     * @var string
     */
    private $name;

    /**
     * @var callable
     */
    private $callback;

    /**
     * @var array
     */
    private $parameters;

    public function __construct(string $name, callable $callback, array $parameters)
    {
        $this->name = $name;
        $this->callback = $callback;
        $this->parameters = $parameters;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @return callable
     */
    public function getCallback(): callable {
        return $this->callback;
    }

    /**
     * Retour du URL parameters
     * @return string[]
     */
    public function getParameters(): array {
        return $this->parameters;
    }
}
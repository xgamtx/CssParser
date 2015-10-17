<?php
/**
 * Created by PhpStorm.
 * User: vasilij
 * Date: 29.08.15
 * Time: 21:55
 */

class Config {
    /** @var self */
    protected static $instance;
    /* Class */
    protected $invalidCssElementStorage;

    protected function __construct() {}

    public static function instance() {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @param string $name
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($name) {
        if (property_exists($this, $name)) {
            return $this->{$name};
        }

        throw new InvalidArgumentException('Required config parameter not exist: "' . $name . '"');
    }
}
<?php
namespace Puja\Configure;
use Puja\Configure\Result\Result;
use Puja\Configure\Exception;
class Configure
{
    protected static $configures;
    protected static $init;
    public function __construct(array $configurePaths)
    {
        if (self::$init) {
            return $this;
        }
        self::$init = true;
        $configures = array();
        foreach ($configurePaths as $path) {

            $path = rtrim($path, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
            if (file_exists($path . 'configure.php')) {
                require $path . 'configure.php';
            }

            if (file_exists($path . 'configure_local.php')) {
                require $path . 'configure_local.php';
            }
        }
        self::$configures = $configures;

    }

    public static function getInstance($partial = null)
    {
        if (null === self::$init) {
            throw new Exception('You do not load the configure files yet');
        }

        if (empty($partial)) {
            return new Result(self::$configures);
        }

        if (!array_key_exists($partial, self::$configures)) {
            throw new Exception('Partial ' . $partial . ' doesnt exist');
        }

        return new Result(self::$configures[$partial]);

    }


}
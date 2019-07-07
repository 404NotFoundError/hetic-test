<?php 

namespace Tests\Helpers;

/**
 * Test Trait
 * 
 * @author HOUNTONDJI A. <hountondjigodwill@gmail.com>
 */
trait TestTrait
{

    /**
     * This method is called before the first test of this test class is run.
     * 
     * @return void
     */
    public static function setUpBeforeClass(): void
    {
        $GLOBALS['note'] = 0;
        $GLOBALS['totalPoints'] = 0;
    }

    /**
     * @return void
     */
    private function increaseNote(int $value)
    {
        $GLOBALS['note'] =  $GLOBALS['note'] + $value;
    }

    /**
     * @return void
     */
    private function increasePoints(int $value)
    {
        $GLOBALS['totalPoints'] = $GLOBALS['totalPoints'] + $value;
    }

    /**
     * This method is called after the last test of this test class is run.
     */
    public static function tearDownAfterClass(): void
    {
        $message = "Vous avez cumulé {$GLOBALS['note']} point(s) sur un total de {$GLOBALS['totalPoints']}";
        echo "\n\n" . shell_exec('echo "\033[32m' . $message . '  \033[0m" ');
    }

    /**
     * Highlights customizing errors in the terminal
     * 
     * @return string
     */
    private function sendError(string $todo, string $message, string $log = null, string $malus = null, string $info = null): string
    {
        $content = '\033[31m\033[5m-->\033[7m\033[0m \033[31m' . $todo;
        $content.= '\nMessage: ' . $message;
        $content.= is_null($log) ? '' : '\nAss-Error: ' . $log;
        $content.= is_null($malus) ? '' : '\nNiv: ' .  $malus;
        $content.= ' \033[0m';
        $content.= is_null($info) ? '' : '\n\033[43m' . $info . '\033[0m';

        $message = shell_exec('echo " '. $content .' " ');

        return $this->fail($message);
    }

    
}

<?php

namespace AsyncPHP;

use Closure;
use AsyncPHP\Interfaces\Threaded;

class Thread implements Threaded
{
    /**
     * Stores the count of the spawned threads.
     *
     * @var static int
     */
    public static $count = 0;

    /**
     * Stores the callable function.
     *
     * @var Closure
     */
    protected $callable;

    /**
     * Stores the current process id.
     *
     * @var integer
     */
    private $pid;

    /**
     * Takes a closure and set it.
     *
     * @param Closure | $callable
     * @return void
     */
    public function __construct($callable)
    {
       	$this->callable = $callable;
    }

    /**
     * Waits for the child proccess to finish,
     * and join him to the called context.
     *
     * @return void
     */
    public function join()
    {
    	\pcntl_waitpid($this->pid, $status, WUNTRACED);

    	do {
    		if (\pcntl_wifexited($status)) {
    			self::$count--;
    			break;
    		}

    		usleep(10000);
    	} while (true);
    }

    /**
     * Starts the new thread.
     *
     * @return void
     */
    public function start()
    {
    	$pid = @\pcntl_fork();

    	if ($pid == -1) {
        		throw new \Exception('Could not create the thread');
    	}

  		if ($pid) {
        		$this->pid = $pid;
        		++self::$count;
    	} else {
        	if (! empty($arguments)) {
            	call_user_func_array($this->callable, func_get_args());
        	} else {
            	call_user_func($this->callable);
        	}

        	exit(0);
        }
    }
}

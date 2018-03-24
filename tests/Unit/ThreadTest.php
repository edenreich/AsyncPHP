<?php

namespace Tests\Unit;

use AsyncPHP\Thread;

class ThreadTest extends \PHPUnit\Framework\TestCase
{
	public function test_that_a_new_child_proccess_spawns()
	{
		$thread1 = new Thread([Task1::class, 'run']);
		$thread2 = new Thread([Task2::class, 'run']);

		$thread1->start();
		$thread2->start();

		$this->assertEquals(Thread::$count, 2);

		$thread1->join();

		$this->assertEquals(Thread::$count, 1);

		$thread2->join();

		$this->assertEquals(Thread::$count, 0);	
	}
}

class Task1
{
	public function run()
	{
		for ($i = 0; $i < 10; ++$i) {
			dump("Running task 1...");
			usleep(100000);
		}
	}
}

class Task2
{
	public function run()
	{
		for ($i = 0; $i < 25; ++$i) {
			dump("Running task 2...");
			usleep(100000);
		}
	}
}
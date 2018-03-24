<?php

namespace AsyncPHP\Interfaces;

interface Threaded
{
	/**
	 * Starts the new thread.
	 *
	 * @return void
	 */
	public function start();

	/**
	 * Joins the thread to
	 * the main context.
	 * 
	 * @return void
	 */
	public function join();
}
<p align="center"><img src="https://s7.postimg.org/dq0odxamj/php.png" width="300" height="350"></p>

# AsyncPHP

A simple way to make async operations using PHP

# Installation

in the terminal:
```sh
composer require asyncphp/threads
```

# Usage

To create a new thread:
```php
$thread = new Thread(function);
```

To join the thread to the main context:
```php
$thread->join();
```

To get the currently running threads:
```php
echo Thread::$count
```

# Note
This small package uses pcnl extension(which is normally installed by default) and does not require pthreads extension to be installed.
It's probably not as fast as using pthreads, yet it solves the async problem.
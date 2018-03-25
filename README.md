<p align="center"><img src="https://s7.postimg.org/dq0odxamj/php.png" width="300" height="300"></p>

# AsyncPHP

A simple way to make async operations using PHP

# Installation

in the terminal:
```sh
composer require reich/async
```

# Usage

To create a new thread:
```php
$thread = new \AsyncPHP\Thread(function);
```

To join the thread to the main context:
```php
$thread->join();
```

To get the currently running threads:
```php
echo \AsyncPHP\Thread::$count
```

# Note
This can only be used from the command line atm.

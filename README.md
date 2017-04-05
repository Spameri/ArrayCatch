# ArrayCatch
Catch exceptions of undefined array fields instead of crash.

## Usage
```php?start_inline=true 
set_error_handler('handleError');

$data = [];
try {
	echo $data['test'];

} catch (ArrayFieldNotSet $exception) {
	echo $exception->getMessage();
}

restore_error_handler();

```

<?php

class ArrayFieldNotSet extends RuntimeException
{
	public function __construct(
		$message = "",
		$code = 0,
		Exception $previous = NULL,
		$errorFile,
		$errorLine
	)
	{
		$message = $message . ' in ' . $errorFile . ' on line ' . $errorLine;
		parent::__construct($message, $code, $previous);
	}
}

set_error_handler('handleError');

$data = [];
try {
	echo $data['test'];

} catch (ArrayFieldNotSet $exception) {
	echo $exception->getMessage();
}

restore_error_handler();

function handleError($errorNumber, $errorString, $errorFile, $errorLine)
{
	if (strpos($errorString, 'Undefined index') !== FALSE) {
		throw new ArrayFieldNotSet($errorString, $errorNumber, NULL, $errorFile, $errorLine);
	}
}

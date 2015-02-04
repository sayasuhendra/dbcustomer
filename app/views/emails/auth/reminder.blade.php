<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Password Reset</h2>

		<div>
			Untuk mereset password Anda, silahkan klik link ini : {{ URL::to('password/reset', array($token)) }}.
		</div>
	</body>
</html>

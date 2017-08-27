<html>

<head>
    <title>test cfr</title>
</head>

<body>

<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
{!! csrf_field() !!}


<form method="POST" action="V1.3/testma">
    {$csrf_field}
    <input type="submit" value="Test"/>
</form>

</body>
</html>





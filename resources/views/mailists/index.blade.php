<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mailist</title>
</head>
<body>
    <h1>Page subscribe</h1>
    <form action="/mailists" method="post">
        {{ csrf_field() }}
        <input type="checkbox"  @if($subscribed) checked
        @endif value="subscribed" name="mailist" /> subscribe mailist <br>
        
        <input type="submit" name="submit" value="submit" > 
    
    </form>
</body>
</html>
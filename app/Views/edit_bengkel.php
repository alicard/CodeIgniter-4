<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Bengkel</title>
</head>
<body>
    <form action="/user/update" method="post">
        <input type="text" name="nmBengkel" value="<?= $bengkel->nmBengkel;?>">
        <input type="text" name="rtBengkel" value="<?= $bengkel->rtBengkel;?>">
        <input type="hidden" name="idBengkel" value="<?= $bengkel->idBengkel;?>">
        <button type="submit">Update</button>
    </form>
</body>
</html>
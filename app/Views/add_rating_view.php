<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Rating</title>
</head>
<body>
    <form action="/bengkel/add_new_rating/save_rating" method="post">
        Nama User <input type="text" name="nmUser">
        Nama Bengkel <input type="text" name="nmBengkel">
        Nilai <input type="text" name="nilai">
        <button type="submit">Save</button>
    </form>
</body>
</html>
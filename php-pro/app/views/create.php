<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            color: #333;
        }
        form {
            width: 400px;
            border: 1px solid #ccc;
            padding: 20px 20px;
            margin: 100px auto;
        }
        form h1 {
            margin-bottom: 20px;
        }
        form input {
            width: 100%;
            border: #ccc 1px solid;
            padding: 5px;
        }

        button {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: all ease .5s;
        }
        button:hover{
            transition: all ease .5s;
            background-color: #000;
            color: #ccc;
        }
    </style>
</head>
<body>
    
    <form action="/create" method="post">
        <h1> <?=$title?> </h1>
        <?=getFlash('message')."<hr> <br>"?>
        <input type="text" name="name" placeholder="name"> <br> <br>
        <input type="text" name="email" placeholder="Email"> <br> <br>
        <input type="password" name="password" placeholder="Password"> <br><br>
        <button type="submit"> Sign in </button>
    </form>


</body>
</html>
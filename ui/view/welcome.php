<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300&display=swap" rel="stylesheet">
    <title>Welcome to Sketch framework</title>

    <style>
        body {
            backgroubnd: #fafafa;
            font-family: 'Oxygen', sans-serif;
            font-size: 20px;
            color: #555;
        }
        .container {
            max-width: 1200px;
            margin: 100px auto;
            padding: 20px;
            border: 1px solid #d1d1d1;
            box-shadow: 0 0 20px rgb(216 180 254);
        }
        .code {
            background: #444;
            color: #fff;
            padding: 15px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome To Sketch Framework</h1>

        <h3 style="background: aquamarine; padding: 15px;">
            <?php echo $message; ?>
        </h3>
        The following variables are passed from controller with view.<br>
        <?php echo $first; ?><br>
        <?php echo $second->third; ?><br>s
        <p class="code">
            Change the content of this page in <b>"ui/view/welcome.php"</b>
        </p>
        <p class="code">
            Change the Variable from <b>"welcome()"</b> method in <b>"build/App/Controllers/WelcomeController"</b>
        </p>
    </div>
    </div>
</body>
</html>
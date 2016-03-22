<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keyword" content="innomaid, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="/favicon.png">

        <title>Request Email</title>
    </head>

    <body>
        <div>
            <p>Hi, <?php echo $from_name; ?>!</p>
            <p>I have created new account for joining to InnoMaid.com.</p>
            <p>And I hope to approve my new account.</p>
            <p>Account information:</p>
            <p style="margin-left: 20px"> Company Name: <?php echo $to_name; ?></p>
            <p style="margin-left: 20px">Email Address: <?php echo $email; ?></p>

            <p style="margin-left: 20px">Regards, Thanks</p>
            <p>From <?php echo $to_name; ?></p>
        </div>
    </body>
</html>

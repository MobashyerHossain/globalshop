<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1 class="bg-dark">welcome to Grobal Car Shop!!</h1>

    <h4>Mr. {{ $user->name }}</h4>

    <p>
      To finish setting up your account, please click <a href="https://globalcarshop.com">here</a>. <br>
      If you are having trouble accessing the link provided, <br>
      simply copy and paste the following URL into your browser: <br>
      https://globalcarshop.com
    </p>

    <p>
      Thanks,<br>
      Khandaker Mobashyer Hossain, <br>
      CEO Grobal Car Shop, <br>
      {{ env('MAIL_FROM_ADDRESS', 'hello@example.com') }}
    </p>
  </body>
</html>

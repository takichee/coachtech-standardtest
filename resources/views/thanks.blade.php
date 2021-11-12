<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thank you</title>
	<link rel="stylesheet" href="{{ asset('css/reset.css') }}">
	<link rel="stylesheet" href="{{ asset('css/default.css') }}">
  <style>
    .thanks-wrapper {
      margin: 100px auto;
      padding: 20px 10px 40px 10px;
      display: flex;
      flex-flow: column;
      align-items: center;
    }
    .thanks-to-top {
      margin-top: 30px;
    }
    .thanks-to-top button {
      width: 150px;
    }
  </style>
</head>
<body>
  <div class="thanks-wrapper">
    <div class="thanks-message">
      <p>ご意見いただきありがとうございました。</p>
    </div>
    <div class="thanks-to-top">
      <a href="{{ url('/') }}">
        <button>トップページへ</button>
      </a>
    </div>
  </div>
  <div>

  </div>
</body>
</html>
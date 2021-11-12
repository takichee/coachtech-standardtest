<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" href="{{ asset('css/reset.css') }}">
	<link rel="stylesheet" href="{{ asset('css/default.css') }}">
	<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
</head>
<body>
  <div class="confirm-wrapper">
    <div class="confirm-header">
        <h1>内容確認</h1>
    </div>
    <table class="confirm-table">
      <tr class="confirm-row">
        <th class="confirm-item">お名前</th>
        <td class="confirm-content">{{ $fullname }}</td>
      </tr>
      <tr class="confirm-row">
        <th class="confirm-item">性別</th>
        <td class="confirm-content">{{ $gender }}</td>
      </tr>
      <tr class="confirm-row">
        <th class="confirm-item">メールアドレス</th>
        <td class="confirm-content">{{ $email }}</td>
      </tr>
      <tr class="confirm-row">
        <th class="confirm-item">郵便番号</th>
        <td class="confirm-content">{{ $postcode }}</td>
      </tr>
      <tr class="confirm-row">
        <th class="confirm-item">住所</th>
        <td class="confirm-content">{{ $address }}</td>
      </tr>
      <tr class="confirm-row">
        <th class="confirm-item">建物名</th>
        <td class="confirm-content">{{ $building_name ?? '' }}</td>
      </tr>
      <tr class="confirm-row">
        <th class="confirm-item">ご意見</th>
        <td class="confirm-content">{{ $opinion }}</td>
      </tr>
    </table>
    <div class="confirm-footer">
      <form action="confirm" method="post">
      @csrf
        <input type="submit" value="送信">
      </form>
      <a href="{{ url('contact') }}">修正</a>
    </div>
  </div>
</body>
</html>
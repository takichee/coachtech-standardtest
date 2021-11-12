<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>お問い合わせ</title>
	<link rel="stylesheet" href="{{ asset('css/reset.css') }}">
	<link rel="stylesheet" href="{{ asset('css/default.css') }}">
	<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
</head>
<body>
  <div class="signup-form">
    <form action="contact" method="post" class="contact-form">
    @csrf
      <!-- form header -->
      <div class="form-header">
        <h1>お問い合わせ</h1>
      </div>
      <!-- fom body -->
      <div class="form-body">
        <!-- Firstname and Lastname -->
        <div class="form-row">
          <div class="form-item">
            <h3>お名前<span class="form-item--red">*</span></h3>
          </div>
          <div class="form-name">
            <div class="form-name-left">
              <input type="text" name="lastName" value="{{ $lastName ?? '' }}">
              <p class="form-example" >例) 山田</p>
              @error('lastName')
                <p class="error-message">{{$message}}</p>
              @enderror
            </div>
            <div class="form-name-right">
              <input type="text" name="firstName" value="{{ $firstName ?? '' }}">
              <p class="form-example" >例) 花子</p>
              @error('firstName')
                <p class="error-message">{{$message}}</p>
              @enderror
            </div>
          </div>
        </div>
        <!-- Gender -->
        <div class="form-row">
          <div class="form-item">
            <h3>性別<span class="form-item--red">*</span></h3>
          </div>
          <div class="form-radio">
            @if ( $gender == '' || $gender == 1 )
              <label>
                <input type="radio" name="gender" value="1" checked>男性
              </label>
              <label>
                <input type="radio" name="gender" value="2">女性
              </label>
            @else
              <label>
                <input type="radio" name="gender" value="1">男性
              </label>
              <label>
                <input type="radio" name="gender" value="2" checked>女性
              </label>
            @endif
          </div>
        </div>
        <!-- Email -->
        <div class="form-row">
          <div class="form-item">
            <h3>メールアドレス<span class="form-item--red">*</span></h3>
          </div>
          <div class="form-input">
            <input type="email" name="email" value="{{ $email ?? '' }}">
            <p class="form-example" >例) test@gmail.com</p>
            @error('email')
              <p class="error-message">{{$message}}</p>
            @enderror
          </div>
        </div>
        <!-- Postcode -->
        <div class="form-row">
          <div class="form-item">
            <h3>郵便番号<span class="form-item--red">*</span></h3>
          </div>
          <div class="form-input">
            <div class="form-postcode">
              <div class="postcode-mark">〒</div>
              <input class="postcode-input" type="text" name="postcode" onKeyUp="AjaxZip3.zip2addr('postcode', '', 'address', 'address');" value="{{ $postcode ?? '' }}">
            </div>
            <p class="form-example" >例) 123-4567</p>
            @error('postcode')
              <p class="error-message">{{$message}}</p>
            @enderror
          </div>
        </div>
        <!-- Address -->
        <div class="form-row">
          <div class="form-item">
            <h3>住所<span class="form-item--red">*</span></h3>
          </div>
          <div class="form-input">
            <input type="text" name="address" value="{{ $address ?? '' }}">
            <p class="form-example" >例) 東京都渋谷区千駄ヶ谷1-2-3</p>
            @error('address')
              <p class="error-message">{{$message}}</p>
            @enderror
          </div>
        </div>
        <!-- Building name -->
        <div class="form-row">
          <div class="form-item">
            <h3>建物名</h3>
          </div>
          <div class="form-input">
            <input type="text" name="building_name" value="{{ $building_name ?? '' }}">
            <p class="form-example" >例) 千駄ヶ谷マンション101</p>
            @error('building_name')
              <p class="error-message">{{$message}}</p>
            @enderror
          </div>
        </div>
        <!-- Opinion -->
        <div class="form-row">
          <div class="form-item">
            <h3>ご意見<span class="form-item--red">*</span></h3>
          </div>
          <div class="form-input">
            <textarea name="opinion" rows="3">{{ $opinion }}</textarea>
            @error('opinion')
              <p class="error-message">{{$message}}</p>
            @enderror
          </div>
        </div>
        <!-- form footer -->
        <div class="form-footer">
          <div class="btn-submit">
            <input type="submit" value="確認">
          </div>
        </div>
      </div>
    </form>
  </div>
</body>
</html>
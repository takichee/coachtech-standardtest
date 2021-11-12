<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>管理システム</title>
	<link rel="stylesheet" href="{{ asset('css/reset.css') }}">
	<link rel="stylesheet" href="{{ asset('css/default.css') }}">
	<link rel="stylesheet" href="{{ asset('css/admin/index.css') }}">
  <style>
    svg.h-5.w-5 {
      height: 10px;
    }
  </style>
</head>
<body>
  <div class="admin-index-wrapper">
    <div class="admin-index-title">
      <h1>管理システム</h1>
    </div>
    <div class="admin-index-search">
      <form class="admin-index-search__form" action="admin.search" method="GET">
        @csrf

        <!-- Fullname and Gender -->
        <div class="admin-index-search__row">
          <div class="admin-index-search__name">
            <div class="admin-index-search__item-group__label">
                <h3>お名前</h3>
            </div>
            <div class="admin-index-search__item-group__input">
              <input name="fullname" type="text" class="search-box__item" value="{{ $fullname ?? '' }}">
            </div>
          </div>
          <div class="admin-index-search__gender">
            <div class="admin-index-search__item-group__label--gender">
              <h3>性別</h3>
            </div>
            <label><input type="radio" name="gender" checked>全て</label>
            <label><input type="radio" name="gender" value="1">男性</label>
            <label><input type="radio" name="gender" value="2">女性</label>
          </div>
        </div>
        <!-- Created-at -->
        <div class="admin-index-search__row">
            <div class="admin-index-search__item-group__label">
              <h3>登録日</h3>
            </div>
            <div class="admin-index-search__item-group__input">
              <input type="date" name="created_at_start" value="{{ $created_at_start ?? '' }}">
            </div>
            <div class="admin-index-search__item-group__calendar--span"><span>~</span></div>
            <div class="admin-index-search__item-group__input">
              <input type="date" name="created_at_end" value="{{ $created_at_end ?? '' }}">
            </div>
        </div>
        <div class="admin-index-search__row">
          <div class="admin-index-search__item-group__label">
            <h3>メールアドレス</h3>
          </div>
          <div class="admin-index-search__item-group__input">
            <input name="email" type="text" value="{{ $email ?? '' }}">
          </div>
        </div>
        <div class="admin-index-search__footer">
          <input type="submit" value="検索"><br>
          <a href="{{ route('admin.reset') }}">リセット</a>
        </div>
      </form>
    </div>

    <div class="admin-index">
      <div class="admin-index__pagination">
        {{ $contacts->appends(['fullname'=>$fullname ?? '', 'gender'=>$gender ?? '', 'email'=>$email ?? '', 'created_at_start'=>$created_at_start ?? '', 'created_at_end'=>$created_at_end ?? ''])->links() }}
      </div>
      <table class="admin-index__contacts">
        <tr class="admin-index__contacts__row admin-index__contacts__header">
          <th class="th-width--id">ID</th>
          <th class="th-width--name">お名前</th>
          <th class="th-width--gender">性別</th>
          <th class="th-width--email">メールアドレス</th>
          <th class="th-width--opinion">ご意見</th>
          <th class="th-width--del"></th>
        </tr>
        @foreach ($contacts as $contact)
        <tr class="admin-index__contacts__row">
          <td class="contacts-table__row__item">{{ $contact->id }}</td>
          <td class="contacts-table__row__item">{{ $contact->fullname }}</td>
          <td class="contacts-table__row__item">
            @if ( $contact->gender === 2 )
              女性
              @else
              男性
            @endif
          </td>
          <td class="contacts-table__row__item">{{ $contact->email }}</td>
          <td class="contacts-table__row__item">
            <div id="{{ $contact->id }}-out">{{ \Illuminate\Support\Str::limit($contact->opinion, 25, '...') }}</div>
            <div id="{{ $contact->id }}-over" style="display:none">{{ $contact->opinion }}</div>
          </td>
          <script type="text/javascript">
            document.getElementById("{{ $contact->id }}-out").addEventListener("mouseover", function() {
                document.getElementById("{{ $contact->id }}-over").style.display = 'block';
                document.getElementById("{{ $contact->id }}-out").style.display = 'none';
            }, false);
            document.getElementById("{{ $contact->id }}-out").addEventListener("mouseout", function() {
                document.getElementById("{{ $contact->id }}-over").style.display = 'none';
                document.getElementById("{{ $contact->id }}-out").style.display = 'block';
            }, false);
          </script>
          <td class="contacts-table__row__item">
            <form method="POST" action="{{route( 'admin.destroy', $contact )}}">
              @csrf
              @method('delete')
              <input type="submit" class="btn-delete" value="削除"></input>
            </form>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</body>
</html>



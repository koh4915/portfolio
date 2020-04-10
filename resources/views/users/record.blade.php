<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>MUSCLE GAIN</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        
        <!--css/jsを読み込む-->
        <link href='js/fullcalendar/core/main.css' rel='stylesheet' />
        <link href='js/fullcalendar/daygrid/main.css' rel='stylesheet' />
        <script src='js/fullcalendar/core/main.js'></script>
        <script src='js/fullcalendar/daygrid/main.js'></script>
        
        <!--カレンダーの設定-->
        <script>
          document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
              plugins: [ 'dayGrid','timeGrid','list','interaction' ],
              
              editable: true, // イベントを編集
              allDaySlot: false, // 終日表示の枠を表示
              eventDurationEditable: false, // イベント期間をドラッグしで変更
              slotEventOverlap: false, // イベントを重ねて表示
              selectable: true,
              selectHelper: true,
              firstDay : 1, // パラメータが１だと月曜日から表示
              droppable: true,// イベントをドラッグできるか
              select: function(start, end, allDay) {
                  //日の枠内を選択したときの処理
              },
              dayClick: function(date, jsEvent, view) {
                  //日付をクリックしたときの処理
                  document.location.href ="http://0fec1bce591f478d8261cf02373cc004.vfs.cloud9.us-east-1.amazonaws.com/posts/create";
                  alert('Clicked on: ' + date.format());
              },
              eventClick: function(calEvent, jsEvent, view) {
                  //イベントをクリックしたときの処理
                  alert('Clicked on: ' + calEvent);
                  console.log(calEvent);
                  console.log(jsEvent);
                  console.log(view);
              },
              eventDrop: function(item, delta,revertFunc,jsEvent,ui, view) {
                  //ドロップした情報
                  alert('Clicked on: ' + item.title);
                  //ドロップしたことを元に戻したいとき
                  revertFunc();
              },
            });
            
            // カレンダーを呼び出すメ��ッド
            calendar.render();
          });
  
        </script>
      
        <style>
            html, body {
                background-color: black;
                color:white;
                font-family: 'Raleway', sans-serif;
            }
        </style>
        
    </head>
    <body>

        @include('commons.navbar')
        
        <div class="text-center"><h1><i>Record</i></h1></div>
        
        <div id='calendar'></div>
        
        {!! link_to_route('posts.create','新規作成(テスト)',[],['class' => 'btn btn-primary']) !!}
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>
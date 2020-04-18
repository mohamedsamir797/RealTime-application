<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
      <div id="app">
              <app-home></app-home>
      </div>
      <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
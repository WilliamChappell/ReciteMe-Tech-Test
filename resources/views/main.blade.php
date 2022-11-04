<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <title>RSS Feed</title>
        <style>
            .links{display: none};
        </style>
        <script type="text/javascript">
            function hideLinks()
            {
                var links = document.querySelectorAll('.link');
                links.forEach(link => {
                    link.style.display = 'none';
                });
            }

            function showLinks()
            {
                var links = document.querySelectorAll('.link');
                links.forEach(link => {
                    link.style.display = '';
                });
            }

            function keyPress(e) {
                if(e.altKey){
                    showLinks();
                }else{
                    hideLinks();
                }

            }
        </script>
    </head>

    <body onkeydown="keyPress(event);" onclick="hideLinks()">
        <div class="container">
            <h1>RSS Feed</h1>
            <ul class="nav nav-tabs">
                @foreach($feeds as $feed)
                    <li>
                        <a data-toggle="tab" href="#feed-{{$feed->id}}">{{$feed->name}}</a>
                    </li>
                @endforeach
            </ul>

            <div class="tab-content">
                @foreach($feeds as $feed)
                    <div id="feed-{{$feed->id}}" class="tab-pane fade">
                        <x-feed :posts="$feed->posts"/>
                    </div>
                @endforeach
            </div>
        </div>
    </body>

</html>
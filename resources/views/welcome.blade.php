<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Tweets</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .twitter-media{
            background: #f5f2f2;
            padding: 10px;
            border-radius: 3px;
        }
        .twitter-media .media-object{
            border-radius: 3px;
        }
        .media-body{
            color: #666;
        }
        .media-body a{
            color: #666;
            text-decoration: none;
        }
        .pagination{
            margin-bottom: 0;
        }
        .panel-body{
            position: relative;
        }
        .panel-body .overlay{
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(253, 252, 252, 0.8);
            top: 0;
            left: 0;
            border-radius: 5px;
            z-index: 99;
        }
        .btn-refresh{
            margin-top: 20px;
            border-radius: 2px;
        }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Tweets</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="alert alert-info">Kamaal Rashid Khan - Latest tweets</div>
                <div class="panel panel-default">
                  <div class="panel-body" id="tweets">
                    <div class="text-muted text-center">Loading...</div>                    
                  </div>
                </div>     
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script>
        $(function(){

            getPosts(1);

            $(document).on('click', '.pagination a', function (e) {
                getPosts($(this).attr('href').split('page=')[1]);
                e.preventDefault();
            });

            $(document).on('click', '.btn-refresh', function (e) {
                getPosts(1);
            });
        });

        function getPosts(page) {
            $('.overlay').show();
            $.ajax({
                url : 'tweets?page=' + page,
                dataType: 'json',
            }).done(function (data) {
                $('#tweets').html(data);
                $('.overlay').hide();
            }).fail(function () {
                alert('Tweets could not be loaded.');
            });
        }

    </script>
  </body>
</html>
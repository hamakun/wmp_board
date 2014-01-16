<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        {{ get_title() }}
        {{ stylesheet_link('css/bootstrap.min.css') }}
    </head>
    <body>
        {{ content() }}
        {{ javascript_include('js/jquery-2.0.3.min.js') }}
        {{ javascript_include('js/bootstrap.js') }}
    </body>
</html>
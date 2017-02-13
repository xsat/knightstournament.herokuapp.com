<!DOCTYPE html>
<html>
<head>
    {{ get_title() }}
    <meta content="text/html; charset=utf-8" http-equiv="Content-type" />
    <meta content="width=device-width, initial-scale=1, user-scalable=0" name="viewport" />
    <meta charset="UTF-8" />
    <meta property="og:title" content="{{ get_title(false) }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://knightstournament.herokuapp.com/" />
    {{ assets.outputCss() }}
</head>
<body>
    {{ content() }}
    {{ assets.outputJs() }}
</body>
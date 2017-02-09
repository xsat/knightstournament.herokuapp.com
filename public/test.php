<!DOCTYPE html>
<html>
<head>
    <title>It's your game - KnightsTournament</title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-type" />
    <meta content="width=device-width, initial-scale=1, user-scalable=0" name="viewport" />
    <meta charset="UTF-8" />
    <meta property="og:title" content="It's your game - KnightsTournament" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://knightstournament.herokuapp.com/" />
    <link rel="stylesheet" href="/css/styles.css?v<?= rand() ?>" type="text/css" />
</head>
<body>
    <div class="container">
        <ul class="grid"></ul>
        <button type="button" class="attack">Attack</button>
        <button type="button" class="move">Move</button>
        <button type="button" class="block">Block</button>
        <button type="button" class="end">End turn</button>
        <button type="button" class="reset">Reset</button>
        <button type="button" class="log">Log</button>
        <button type="button" class="test">Test</button>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.js" type="application/javascript"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" type="application/javascript"></script>
    <script src="/js/main.js?v<?= rand() ?>" type="application/javascript"></script>
</body>
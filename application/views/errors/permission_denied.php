<style>
    body * {
    margin: 0;
    padding: 0;
    }

    body {
    font: normal 100%/1.15 "Merriweather", serif;
    background: #000;
    color: #fff;
    }

    h1 {
    margin: 0 0 1rem 0;
    font-size: 8em;
    text-shadow: 0 0 6px #8b4d1a;
    }

    p {
    margin-bottom: 0.5em;
    font-size: 1.75em;
    color: #ea8a1a;
    }

    p > a {
    border-bottom: 1px dashed #837256;
    font-style: italic;
    text-decoration: none;
    color: #837256;
    }

    .box{
        text-align:center;
        margin-top: 10px
    }
</style>

<!DOCTYPE html>
<html>
    <head>
        <title>Access Denied</title>
    </head>
    <body>
        <div class="box">
            <h1>403</h1>
            <p>Desculpe, você não tem acesso para essa página</p>
            <p><a href="<?php echo base_url("login");?>">Por favor, volte por aqui.</a></p>
        </div>
    </body>
</html>
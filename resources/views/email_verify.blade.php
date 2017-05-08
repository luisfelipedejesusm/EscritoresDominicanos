<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verifica tu correo electronico</h2>

        <div>
            Gracias por ccrear una cuenta en EscritoresDominicanos.
            Porfavor haga click en este link para verificar su correo electronico
            {{ URL::to('register/verify/' . $confirmation_code) }}.<br/>

        </div>

    </body>
</html>
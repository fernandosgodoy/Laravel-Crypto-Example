<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref">
            
            <div style="clear:both; width:400px;">
                <form action="{{url('criptografia')}}" name="frm" 
                    method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <label for="txtPalavra">Palavra (*):</label>
                    <input type="text" id="txtPalavra" name="txtPalavra"
                        old="{{old('txtPalavra')}}" />
                    <br>
                    <button type="submit"> 
                        Criptografar
                    </button>
                    <span class="alert alert-error">
                        {{ $errors->first('txtPalavra') }}
                    </span>
                </form>
            </div>
            <br>
        </div>

        <h4>Resultado Crypto:</h4>
        @if (isset($resultado) && $resultado != "")
            <div style="clear:both; width:400px; word-wrap:anywhere;">
                <?= $resultado; ?>
            </div>
        @else
            <p>Nenhum ainda.</p>
        @endif

        <br>
        <h2>Decrypt</h2>
            <div style="clear:both; width:400px;">
                <form action="{{url('descriptografa')}}" name="frm" 
                    method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <label for="txtHash">Hash (*):</label>
                    <input type="text" id="txtHash" name="txtHash"
                        old="{{old('txtHash')}}" />
                    <br>
                    <button type="submit"> 
                        Descifrar
                    </button>
                    <span class="alert alert-error">
                        {{ $errors->first('txtHash') }}
                    </span>
                </form>
            <br>
            <br>
            <h4>Resultado Decrypto:</h4>
            @if (isset($decrResult) && $decrResult != "")
                <div style="clear:both; width:400px; word-wrap:anywhere; ">
                    <?= $decrResult; ?>
                </div>
            @else
                <p>Nenhum ainda.</p>
            @endif
        </div>
    </body>
</html>

<!DOCTYPE>
<html>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de venta</title>
    <style>
        body {
        /*position: relative;*/
        /*width: 16cm;  */
        /*height: 29.7cm; */
        /*margin: 0 auto; */
        /*color: #555555;*/
        /*background: #FFFFFF; */
        font-family: Arial, sans-serif;
        font-size: 14px;
        /*font-family: SourceSansPro;*/
        }


        #datos{
        float: left;
        margin-top: 0%;
        margin-left: 2%;
        margin-right: 2%;
        /*text-align: justify;*/
        }

        #encabezado{
        text-align: center;
        margin-left: 35%;
        margin-right: 35%;
        font-size: 15px;
        }

        #fact{
        /*position: relative;*/
        float: right;
        margin-top: 2%;
        margin-left: 2%;
        margin-right: 2%;
        font-size: 20px;
        background:#E3E9E8;
        }

        section{
        clear: left;
        }

        #cliente{
        text-align: left;
        }

        #facliente{
        width: 40%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        }

        #fac, #fv, #fa{
        color: #FFFFFF;
        font-size: 15px;
        }

        #facliente thead{
        padding: 20px;
        background:#E3E9E8;
        text-align: left;
        border-bottom: 1px solid #FFFFFF;
        }

        #facvendedor{
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        }

        #facvendedor thead{
        padding: 20px;
        background: #58D68D;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
        border-radius: 2px;
        border-bottom: #000;
        }
        #faccomprador{
        width: 100%;
        border-collapse: collapse;
        text-align: center;
        border-spacing: 0;
        margin-bottom: 15px;
        }

        #faccomprador thead{
        padding: 20px;
        background: #A2D9CE;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
        }

        #facproducto{
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        }

        #facproducto thead{
        padding: 20px;
        background: #58D68D;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
        }
        #facproducto tbody{
        padding: 20px;
        background: #F8F9F9;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
        }


    </style>
    <body>
        @foreach ($venta as $v)
        <header>
            <div id="logo">
                <img src="assets/img/logo.png" alt="" id="imagen">
            </div>

            <div>

                <table id="datos">
                    <thead>
                        <tr>
                            <th id="">DATOS DEL VENDEDOR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th><p id="proveedor">Nombre: {{$v->nombre}}<br>
                            {{$v->tipo_identificacion}}-VENTA: {{$v->num_venta}}<br>
                            Dirección: {{$v->direccion}}<br>
                            Teléfono: {{$v->telefono}}<br>
                            Email: {{$v->email}}</</p></th>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="fact" class="text-center">
                <p>{{$v->tipo_identificacion}}-VENTA<br>
                  {{$v->num_venta}}</p>
            </div>
        </header>
        <br>

        @endforeach
        <br>
        <section>
            <div>
                <table id="faccomprador">
                    <thead>
                        <tr id="fv">
                            <th>CLIENTE</th>
                            <th>FECHA COMPRA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$v->nombre}}</td>
                            <td>{{$v->fecha_venta}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <section>
            <div>
                <table id="facproducto">
                    <thead>
                        <tr id="fa">
                            <th>CANTIDAD</th>
                            <th>PRODUCTO</th>
                            <th>PRECIO VENTA</th>
                            <th>DESCUENTO</th>
                            <th>SUBTOTAL (S/)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detalles as $det)
                        <tr>
                            <td>{{$det->cantidad.' '.$det->unidad}}</td>
                            <td>{{$det->producto}}</td>
                            <td>S/{{$det->precio}}</td>
                            <td>{{$det->descuento}}</td>
                            <td>S/{{number_format($det->cantidad*$det->precio - $det->cantidad*$det->precio*$det->descuento/100,2)}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        @foreach ($venta as $v)
                        <tr>
                           <th colspan="4"><p align="right">Total:</p></th>
                           <td><p align="right">S/{{number_format($v->total,2)}}</p></td>
                        </tr>
                        <tr>
                            <th colspan="4"><p align="right">Total Impuesto (18%):</p></th>
                            <td><p align="right">S/{{number_format($v->total*18/100,2)}}</p></td>
                        </tr>
                        <tr>
                            <th  colspan="4"><p align="right">Total Pagar:</p></th>
                            <td><p align="right">S/{{number_format($v->total+($v->total_venta*18/100),2)}}</p></td>
                        </tr>
                        @endforeach
                    </tfoot>
                </table>
            </div>
        </section>
        <br>
        <br>
        <footer>
            <!--puedes poner un mensaje aqui-->
            <div id="datos">
                <p id="encabezado">
                    <b>Maxi Fruver Express E.I.R.L</b><br>Meiner Silva<br>Telefono:(+51) 959127011<br>Email:m.silva@maxifruverexpress.com
                </p>
            </div>
        </footer>
    </body>
</html>
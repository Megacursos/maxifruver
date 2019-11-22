<!DOCTYPE>
<html>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de compra</title>
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

        #faproveedor{
        width: 40%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        text-align: center;
        }

        #fac, #fv, #fa{
        color: #FFFFFF;
        font-size: 15px;
        }

        #faproveedor thead{
        padding: 20px;
        background:#33AFFF;
        text-align: left;
        border-bottom: 1px solid #FFFFFF;
        }

        #faccomprador{
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        }

        #faccomprador thead{
        padding: 20px;
        background: #58D68D;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
        }

        #faccomprador tbody{
        padding: 20px;
        background: #E3E9E8;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
        }

        #facproducto{
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        text-align: center;
        }

        #facproducto thead{
        padding: 20px;
        background: #33AFFF;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
        }


    </style>
    <body>
        @foreach ($compra as $c)
        <header>
            <div id="logo">
                <img src="assets/img/logo.png" alt="" id="imagen">
            </div>

             <div>

                <table id="datos">
                    <thead>
                        <tr>
                            <th id="">DATOS DEL PROVEEDOR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th><p id="proveedor">
                                Nombre: {{$c->nombre}}<br>
                                {{$c->tipo_identificacion}}-COMPRA: {{$c->num_compra}}<br>
                                Dirección: {{$c->direccion}}<br>
                                Teléfono: {{$c->telefono}}<br>
                                Email: {{$c->email}}</</p>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="fact">
                <p>{{$c->tipo_identificacion}} N°:<br/>
                  {{$c->num_compra}}</p>
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
                            <th>COMPRADOR</th>
                            <th>FECHA COMPRA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$c->usuario}}</td>
                            <td>{{$c->created_at}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <br>
        <section>
            <div>
                <table id="facproducto">
                    <thead>
                        <tr id="fa">
                            <th>CANTIDAD</th>
                            <th>PRODUCTO</th>
                            <th>PRECIO COMPRA (S/)</th>
                            <!--<th>CANTIDAD*PRECIO</th>-->
                            <th>SUBTOTAL (S/)</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($detalles as $det)
                        <tr>
                            <td>{{$det->cantidad.' '.$det->unidad}}</td>
                            <td>{{$det->producto}}</td>
                            <td>S/{{$det->precio}}</td>
                            <!--<td>${{$det->cantidad*$det->precio}}</td>-->
                            <td>S/{{number_format($det->cantidad*$det->precio,2)}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        @foreach ($compra as $c)
                        <tr>
                           <th colspan="3"><p align="right">Total:</p></th>
                            <td><p align="right">S/{{number_format($c->total)}}<p></td>
                        </tr>
                        <tr>
                           <th colspan="3"><p align="right">Total Impuesto (18%):</p></th>
                            <td><p align="right">S/ {{number_format($c->total*$c->impuesto,2)}}</p></td>
                        </tr>
                        <tr>
                           <th  colspan="3"><p align="right">Total Pagar:</p></th>
                            <td><p align="right">S/ {{number_format($c->total+($c->total*$c->impuesto),2)}}</p></td>
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
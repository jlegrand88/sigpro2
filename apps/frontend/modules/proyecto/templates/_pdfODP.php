<?php
/**
 * Created by Javier Legrand Cancino.
 * Contact: javier.legrand@gmail.com
 * Date: 12/07/2017
 * Time: 3:07
 */
//echo "<<<EOD";
?>

<!--created by: Javier Legrand-->
<!--contact to: javier.legrand@gmail.com-->
<!--WhatsApp:   +569941044521-->


<!--<!DOCTYPE html>-->
<!--<html lang="es">-->
<!--    <head>-->
<!--        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>-->
<!--        <title>Listado Ordenes De Compra</title>-->
<!--        <link rel="stylesheet" href="/css/pdf.css" type="text/css"/>-->
<!--        <link rel="stylesheet" href="/css/app.css" type="text/css"/>-->
<!--    </head>-->
<!--    <body>-->
        <table style="width:100%;">
            <tr>
                <td style="text-align: left;width: 30%">
                    <img src="/images/rimisp_logo.jpg" alt="RIMISP">
                </td>
                <td valign="bottom">
                    <h1> ORDEN DE PAGO</h1>
                </td>
            </tr>
        </table>
        <br /><br />
        <table class="row_oc" style="width: 100%;">
            <tr>
                <td style="padding-right: 50px;"><b>Fecha :  <?php echo DateTime::createFromFormat('Y-m-d H:m:i',$ODP->getFechaIngreso())->format('d-m-Y'); ?></b></td>
                <td><b>Folio: <?php echo DateTime::createFromFormat('Y-m-d H:m:i',$ODP->getFechaIngreso())->format('Y').'-'.$ODP->getIdOrdenPago(); ?></b></td>
            </tr>
        </table>
        <table style="width:100%;border: 2px black solid; border-collapse: collapse; margin-top: 10px;">
            <tr style="border: 2px black solid;width: 100%;">
                <td style="padding: 0px 5px 0px 5px;border: 2px black solid;width: 10%;"><b>A:</b></td>
                <td style="padding: 0px 5px 0px 5px;border: 2px black solid;width: 90%;"> CONTABILIDAD </td>
            </tr>
            <tr style="border: 2px black solid;">
                <td style="padding: 0px 5px 0px 5px;border: 2px black solid;width: 10%;" ><b>DE:</b></td>
                <td style="padding: 0px 5px 0px 5px;"> <?php echo $ODP->getUsuario(); ?></td>
            </tr>
        </table>
        <br /><br />
        <table style="width:100%;border: 2px black solid; border-collapse: collapse; margin-top: 10px;">
            <tr style="border: 2px black solid;">
                <td style="padding: 0px 5px 0px 5px;border: 2px black solid;"><b>PAGAR A:</b></td>
                <td colspan="3" style="padding: 0px 5px 0px 5px;;border: 2px black solid;"> <?php echo $ODP->getProveedor(); ?> </td>
            </tr>
            <tr style="border: 2px black solid;">
                <td style="padding: 0px 5px 0px 5px; border: 2px black solid;"><b>POR PROYECTO:</b></td>
                <td style="padding: 0px 5px 0px 5px;border: 2px black solid;"> <?php echo $ODP->getProyecto()->getNombreProyectoResum(); ?></td>
                <td style="padding: 0px 5px 0px 5px; border: 2px black solid;"><b>C.C:</b></td>
                <td style="padding: 0px 5px 0px 5px;border: 2px black solid;"> <?php echo $ODP->getProyecto(); ?></td>
            </tr>
        </table>
        <br /><br />
        <table style="width:100%; border-collapse: collapse; margin-top: 10px; border: 2px black solid;">
            <tbody>
                <?php
                    $subTotal = 0;
                    $detalles = $ODP->getDetalleOrdenPago();
                ?>
                <?php if(count($detalles) > 0): ?>
                    <?php foreach($detalles as $detalle): ?>
                        <tr style="border: 2px black solid;">
                            <td style="padding: 0px 5px 0px 5px;border: 2px black solid;text-align: left;"><?php echo $detalle->getCuenta(); ?></td>
                            <td style="padding: 0px 5px 0px 5px;border: 2px black solid;text-align: left;"><?php echo $detalle->getNombreCuenta(); ?></td>
                            <td style="padding: 0px 5px 0px 5px;border: 2px black solid;text-align: right;"><?php echo number_format($detalle->getMontoPago(),2); ?></td>
                        </tr>
                        <?php $subTotal = $detalle->getMontoPago() + $subTotal; ?>
                    <?php endforeach; ?>
<!--                    <tr>-->
<!--                        <td  colspan="1" style="border:0px !important;">-->
<!--                        </td>-->
<!--                        <td style="border: 2px black solid;">-->
<!--                            <b>Total</b>-->
<!--                        </td>-->
<!--                        <td style="border: 2px black solid;text-align: right;">-->
<!--                            --><?php //echo $subTotal; ?>
<!--                        </td>-->
<!--                    </tr>-->
                <?php else: ?>
                    <tr>
                        <td style="padding: 0px 5px 0px 5px;border-right: 2px black solid;text-align: right;" colspan="4">No existen datos</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <br /><br />
        <table style="width:100%;border: 2px black solid; border-collapse: collapse; margin-top: 10px;">
            <tr>
                <td style="padding: 0px 5px 0px 5px;"><?php echo $ODP->getObservacion(); ?></td>
            </tr>
        </table>
<!--    </body>-->
<!--</html>-->
<?php //echo "EOD"; ?>
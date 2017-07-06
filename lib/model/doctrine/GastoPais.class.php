<?php

/**
 * GastoPais
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sigpro
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class GastoPais extends BaseGastoPais
{
    public static function validaArchivo($idProyecto, $objPHPExcel)
    {
        //  Get worksheet dimensions
        $sheet = $objPHPExcel->getSheet(0);     //Selecting sheet 0
        $highestRow = $sheet->getHighestRow();     //Getting number of rows
        $highestColumn = $sheet->getHighestColumn();     //Getting number of columns
        $errores = array();
        //  Loop through each row of the worksheet in turn
        for ($row = 1; $row <= $highestRow; $row++)
        {
            if($row > 1)
            {
                //  Read a row of data into an array
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
                $data = $rowData[0];
                
                $cuenta = $data[0];
                $idTipoMovimiento = $data[1];
                $nombreCuenta = $data[2];
                $periodo = $data[3];
                $enero = $data[4];
                $febrero = $data[5];
                $marzo = $data[6];
                $abril = $data[7];
                $mayo = $data[8];
                $junio = $data[9];
                $julio = $data[10];
                $agosto = $data[11];
                $septiembre = $data[12];
                $octubre = $data[13];
                $noviembre = $data[14];
                $diciembre = $data[15];

                //numero_cuenta
                if(isset($cuenta))
                {
                    if(PresupuestoTable::getInstance()->countCuentaPorProyecto($idProyecto, $cuenta) == 0)
                    {
                        $errores[$row]['numero_cuenta'] = "Cuenta no valida, esta no se encuentra entre los registros de prosupuestos.";
                    }
                    if(MovimientosContablesTable::getInstance()->countCuentaPorProyecto($idProyecto, $cuenta) > 0)
                    {
                        $errores[$row]['numero_cuenta'] = "Cuenta no valida, se encuentra entre los registros de movimientos contables para el proyecto seleccionado.";
                    }
                }else{
                    $errores[$row]['numero_cuenta'] = "Valor obligatorio.";
                }
                //tipo_movimiento
                if(isset($idTipoMovimiento)) {
                    if ($idTipoMovimiento != TipoMovimiento::INGRESO && $idTipoMovimiento != TipoMovimiento::EGRESO && $idTipoMovimiento != TipoMovimiento::COMPROMISO) {
                        $errores[$row]['tipo_movimiento'] = 'Valor no admitido. Los valores admitidos son "1" para ingreso, "2" para egreso y "3" para compromiso.';
                    }
                }else{
                    $errores[$row]['tipo_movimiento'] = "Valor obligatorio.";
                }
                //nombre_cuenta
                if(!isset($nombreCuenta))
                {
                    $errores[$row]['nombre_cuenta'] = "Valor obligatorio.";
                }
                //periodo
                if(isset($periodo))
                {
                    if(!is_numeric($periodo)){
                        $errores[$row]['periodo'] = "Solo se permiten valores numericos.";
                    }
                }else{
                    $errores[$row]['periodo'] = "Valor obligatorio.";
                }

                //enero
                if(isset($enero) && !is_numeric($enero)){
                    $errores[$row]['enero'] = "Solo se permiten valores numericos.";
                }
                //febrero
                if(isset($febrero) && !is_numeric($febrero)){
                    $errores[$row]['febrero'] = "Solo se permiten valores numericos.";
                }
                //marzo
                if(isset($marzo) && !is_numeric($marzo)){
                    $errores[$row]['marzo'] = "Solo se permiten valores numericos.";
                }
                //abril
                if(isset($abril) && !is_numeric($abril)){
                    $errores[$row]['abril'] = "Solo se permiten valores numericos.";
                }
                //mayo
                if(isset($mayo) && !is_numeric($mayo)){
                    $errores[$row]['mayo'] = "Solo se permiten valores numericos.";
                }
                //junio
                if(isset($junio) && !is_numeric($junio)){
                    $errores[$row]['junio'] = "Solo se permiten valores numericos.";
                }
                //julio
                if(isset($julio) && !is_numeric($julio)){
                    $errores[$row]['julio'] = "Solo se permiten valores numericos.";
                }
                //agosto
                if(isset($agosto) && !is_numeric($agosto)){
                    $errores[$row]['agosto'] = "Solo se permiten valores numericos.";
                }
                //septiembre
                if(isset($septiembre) && !is_numeric($septiembre)){
                    $errores[$row]['septiembre'] = "Solo se permiten valores numericos.";
                }
                //octubre
                if(isset($octubre) && !is_numeric($octubre)){
                    $errores[$row]['octubre'] = "Solo se permiten valores numericos.";
                }
                //noviembre
                if(isset($noviembre) && !is_numeric($noviembre)){
                    $errores[$row]['noviembre'] = "Solo se permiten valores numericos.";
                }
                //diciembre
                if(isset($diciembre) && !is_numeric($diciembre)){
                    $errores[$row]['diciembre'] = "Solo se permiten valores numericos.";
                }

                if(strtolower($data[16]) !== "x" && $data[16] !== "1" && strtolower($data[16]) !== "s" && strtolower($data[16]) !== "y" && strtolower($data[16]) !== "si"
                    && strtolower($data[16]) !== "yes" && strtolower($data[16]) !== "true" && strtolower($data[16]) !== "")
                {
                   $errores[$row]['cuenta_ovh'] = 'Valor no admitido. Para ingresar registro como cuenta overhead los valores permitodos son "x", "1", "y", "s", "yes", "si" o "true". Para un registro de una cuenta que no es overhead solo dejar en blanco.';
                }
            }
        }
        return $errores;
    }
}
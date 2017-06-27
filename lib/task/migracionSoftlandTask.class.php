<?php

class migracionSoftlandTask extends sfBaseTask
{
    protected function configure()
    {
        // // add your own arguments here
        // $this->addArguments(array(
        //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
        // ));

        $this->addOptions(array(
          new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
          new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
          new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'mssql'),
          // add your own options here
        ));

        $this->addArgument('tipo_migracion', sfCommandArgument::OPTIONAL, 'Tipo de migracion', 'current');
        $this->addArgument('test', sfCommandArgument::OPTIONAL, 'Test del comando CLI, solo retornara informacion', false);

        $this->namespace        = '';
        $this->name             = 'migracionSoftland';
        $this->briefDescription = 'Migracion de datos desde BBDD softland a BBDD MySQL de sigpro';
        $this->detailedDescription = <<<EOF
              La tarea [migracionSoftland|INFO] es utilizada para la migracion de datos de movimientos contables desde las BBDD de softland a BBDD MySQL del sistema sigpro:              
              
                [php symfony migracionSoftland|INFO]
                
                Puedes especificar el comportamiento de la misma mediante el argumento opcional [tipo_migracion|COMMENT], las opciones disponibles son:
                
                    - current (* por defecto): Migracion de datos desde las BBDD ONG2016 y FONDECYT.
                    - legacy: Migracion de datos desde la BBDD ONG2007
                    - complete: Migracion de datos desde las BBDD ONG2016, FONDECYT y BBDD ONG2007
                    
                 Puedes especificar en 1 el argumento [test|COMMENT] con el fin de no realizar el proceso de migracion y solo obtener informacion de los registros existentes en softland.
EOF;
    }

    protected function execute($arguments = array(), $options = array())
    {
        set_time_limit(0);
        ini_set('memory_limit', '-1');
        // initialize the database connection
        $databaseManager = new sfDatabaseManager($this->configuration);
        //$connection = $databaseManager->getDatabase($options['connection'])->getConnection();
        $mssqlConnection = Doctrine_Manager::getInstance()->getConnection('mssql');

        $bbdd = "ONG2007";
        $bbdd1 = "ONG2016";
        $bbdd2 = "FONDECYT";

        $ddbbList = array();
        switch ($arguments['tipo_migracion']){
            case "current":
                $ddbbList[] = $bbdd1;
                $ddbbList[] = $bbdd2;
                if(!$arguments['test'])
                    MovimientosContablesTable::getInstance()->deleteCurrents();
                break;
            case "legacy":
                $ddbbList[] = $bbdd;
                if(!$arguments['test'])
                    MovimientosContablesTable::getInstance()->deleteLegacy();
                break;
            case "complete":
                $ddbbList[] = $bbdd;
                $ddbbList[] = $bbdd1;
                $ddbbList[] = $bbdd2;
                if(!$arguments['test']) {
                    MovimientosContablesTable::getInstance()->deleteLegacy();
                    MovimientosContablesTable::getInstance()->deleteCurrents();
                }
                break;
        }

        foreach($ddbbList as $db)
        {
            $query = "SELECT PCTCOD as codigo_cta,CPBNUM,CPBFEC,GLOSAMOV,MONTOMA,MONTOMB,PCDESC as nombre_cta,(Right(Left(PCTCOD,7),3)) AS proyecto,
                    CASE 
                        WHEN 
                            CHARINDEX('(c/P',PCDESC,1) > 0 THEN 3 else '' 
                        END compromiso,
                    CASE 
                        WHEN Right(PCTCOD,2) = '01' THEN '1' ELSE '2' 
                    END ingresos 
                    FROM ".$db.".softland.cw_vsnpmovcpbtsitinicnoconc
                        INNER JOIN ".$db.".softland.cwpctas ON ".$db.".softland.cw_vsnpmovcpbtsitinicnoconc.PCTCOD = ".$db.".softland.cwpctas.PCCODI
                    WHERE PCTCOD LIKE '2-2-1%' OR PCTCOD LIKE '4-2%' OR PCTCOD LIKE '5-6%' OR PCTCOD LIKE '2-2-2%'
                ORDER BY ".$db.".softland.cw_vsnpmovcpbtsitinicnoconc.CPBFEC;";

            $response = $mssqlConnection->fetchAssoc($query);
            $totalRegistros = count($response);
            $this->logSection("migracionSoftlandTask", "Se han encontrado ".$totalRegistros." registros en ".$db);
            $i = 1;
            if(!$arguments['test'])
            {
                foreach ($response as $row)
                {
                    $this->logSection("migracionSoftlandTask", "Procesando ".$i." de ".$totalRegistros);
                    $movimientoContable = new MovimientosContables();
                    $movimientoContable->setCodigoCuenta($row['codigo_cta']);
                    $movimientoContable->setNumeroComprobante($row['CPBNUM']);
                    $fecha = new DateTime($row['CPBFEC']);
                    $movimientoContable->setFecha($fecha->format('Y-m-d'));
                    $movimientoContable->setMes($fecha->format('m'));
                    $movimientoContable->setAnho($fecha->format('Y'));
                    $movimientoContable->setGlosa($row['GLOSAMOV']);
                    $movimientoContable->setDolares($row['MONTOMA']);
                    $movimientoContable->setPesos($row['MONTOMB']);
                    $movimientoContable->setNombreCuenta($row['nombre_cta']);
                    $movimientoContable->setProyecto($row['proyecto']);
                    $idTipoCuenta = ($row['compromiso'] > $row['ingresos']) ? $row['compromiso'] : $row['ingresos'];
                    $movimientoContable->setIdTipoCuenta($idTipoCuenta);
                    $movimientoContable->save();
                    $i++;
                }
            }
        }
        $this->logSection("migracionSoftlandTask", "Ha concluido la tarea de migracion.");
    }
}

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * recibe una archivo pdf (por defecto) y revisa si se encuentra corrupto encriptado y cantidad de paginas
 *
 *
 * @author javier.legrand@gmail.com
 * 
 * @version 1.0
 */
class RevisionArchivo {
    public static function getNroPaginas($fileAnalisis = null)
    {
        $num = 0;

        try
		{
			$parser = new fpdi_pdf_parser($fileAnalisis);
			$num = $parser->getPageCount();
			$parser->closeFile();
        }
		catch (Exception $e)
		{
		}
		
        return $num;
    }
    public static function encriptadoYCorrupto($fileAnalisis = null, $estricto = true)
    {
        $errores = '';
        $f=fopen($fileAnalisis,'r');
        $data='';
        while(!feof($f)){
            $data.=fread($f,1024);
        }

        fclose($f);

        $numArchEncript = substr_count($data, '/Encrypt');
        $numFinalArchivo = substr_count($data, 'EOF');
        
        if ($estricto && self::noParsea($fileAnalisis))
        {
        	$errores['no_concatenable'] = "Archivo no concatenable";
        }
        
/*        if($numArchEncript>0)
            $errores['encriptado'] = "Archivo encriptado o protegido";*/
        if($numFinalArchivo<1)
            $errores['final_archivo'] = "Archivo Corrupto";
        return $errores;
    }
    public static function noParsea($fileAnalisis = null)
    {
        $error = '';
        try 
        {
			$maker = new PDF_Maker();
			$maker->addPdfFile($fileAnalisis);
			$maker->cleanUp();
			$maker->Close();
        }
        catch (Exception $e)
        {
            $error = "El archivo adjunto no permite concatenar";
          
        }
        return $error;
    }
    
    public static function validaNombreArchivo($nombreArchivo = null)
    {
    	$error = '';
    	
    	if(preg_match('|�|', $nombreArchivo))
    	{
    		$error = "El nombre del archivo adjunto contiene caracteres no permitidos";
    	}
    	  	
    	return $error;
    }
    public static function validaNombreArchivoCaracteresEspeciales($nombreArchivo = null)
    {
	   	$error = '';
    	 
    	if(preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\+=\{\}\[\]\|;�:"\<\>,\?\�\\\]/',$nombreArchivo))
    	{
    		$error = "El nombre del archivo contiene caracteres no permitidos ['/~`!@#$%^&*()+={}[]|;�:''<>,?�\]";
    	}
    
    	return $error;
    }
}


<?php

use phpDocumentor\Reflection\Types\Null_;

/*
 * @author Vitor Prado de Lima <vvpll@outlook.com>
 * @date 14/10/2018
 */


define('DSN','mysql:host=localhost;dbname=fitcard');/*Data Source Name - Contem as informa��es para a conex�o - http://php.net/manual/pt_BR/pdo.construct.php */
define('USERNAME','root');/*Usuario da string DSN*/
define('PASSWORD','');/*Senha da string DSN*/

/*Classe para conex�o com o Banco de Dados*/
class dbFitcard
{
    
    public static $con;  //Variavel de Conex�o
    
    
    /*Metodo Construtor*/
    private function __construct(){
           //
    }
    
    /*Metodo para receber $conn*/
    public static function getCon()
    {
        
        /*Verifica se $conn ja foi construido*/
        if(!isset(self::$con))
        {
            self::$con = new PDO(DSN,USERNAME,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));/*Constru��o da Conex�o, ultimo parametro passa o charset utilizado pelo MYSQL, que ser� UTF8*/   
            self::$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);/*Altera o atributo ATTR_ERRMODE para ERRMODE_EXCEPTION, que lan�a a PDOException do catch - http://php.net/manual/pt_BR/pdo.setattribute.php*/
        }
        
        return self::$con;/*Retorna $conn*/ 
        
    }
    
    public static function setCon(){
        
        self::$con = Null;
    }
}
    

?>
<?php
//Requerimos la clase Smarty de la libreria
require_once('libs/Smarty.class.php');

/**
 * Clase Extendida SmartyExt que hereda de la clase Smarty. En el constructor de
 * la clase definimos el árbol de directorios de trabajo para Smarty.
 */
class SmartyExt extends Smarty{
    function __construct() {
        parent::__construct();
        $this->setTemplateDir('smarty/templates');
        $this->setCompileDir('smarty/templates_c');
        $this->setCacheDir('smarty/cache');
        $this->setConfigDir('smarty/configs');
    }
}


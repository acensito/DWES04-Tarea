<?php

/* 
 * 2017 Felipe Rodríguez Gutiérrez
 *
 * CODIGO CREADO BAJO LICENCIA CREATIVE COMMONS
 *
 * Reconocimiento - NoComercial - CompartirIgual (by-nc-sa): 
 *
 * No se permite un uso comercial de la obra original ni de las posibles obras 
 * derivadas, la distribución de las cuales se debe hacer con una licencia igual
 * a la que regula la obra original.
 */

/* 
 * Módulo: Desarrollo Web Entorno Servidor
 * Tema  04: Programación Orientada a Objetos en PHP
 * Tarea 04: Diodos Bank
 * Alumno: Felipe Rodríguez Gutiérrez
 */

/**
 * Clase Movimiento
 */
class Movimiento{
    private $codigoMov;
    private $fecha;
    private $concepto;
    private $cantidad;
    
    /**
     * Constructor de la clase. recibirá como parametro una fila de una consulta,
     * del que tomará los valores correspondientes.
     * 
     * @param type $row
     */
    public function __construct($row){
        $this->codigoMov = $row['codigoMov'];
        $this->fecha = $row['fecha'];
        $this->concepto = $row['concepto'];
        $this->cantidad = $row['cantidad'];
    }
    
    //GETTERS Y SETTERS
    //*****************
    
    public function getCodigoMov() {
        return $this->codigoMov;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getConcepto() {
        return $this->concepto;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCodigoMov($codigoMov) {
        $this->codigoMov = $codigoMov;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setConcepto($concepto) {
        $this->concepto = $concepto;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
}


﻿<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function limpar($string) {
    $table = array(
        '/' => '', '(' => '', ')' => '',
    );
    // Traduz os caracteres em $string, baseado no vetor $table
    $string = strtr($string, $table);
    $string = preg_replace('/[,.;:`´^~\'"]/', null, iconv('UTF-8', 'ASCII//TRANSLIT', $string));
    $string = strtolower(trim($string));
    $string = str_replace(" ", "-", $string);
    $string = str_replace("---", "-", $string);
    return $string;
}

function debug($var) {

    $dub = debug_backtrace();

    echo '<pre><span  style="color:blue">';
    echo $dub[0]['file'] . "<br/>Na linha de nº ";
    echo $dub[0]['line'] . "<br/></span>";
    print_r($var);
    echo '</pre>';
}

/*
 * Função de href, para montar o link 
 * @property $controller
 * @property $array Pode ser NULL
 * 
 */
function href($controller, $array = array()) {

    $pathname = '';
    if (!empty($array)) {
        foreach ($array AS $i) {
            $pathname .= '/' . $i;
        }
    }
    
    if (empty($controller) && empty($array) ) {
        return base_url();
    }
    
    return base_url($controller . $pathname);
}


/*
 * Converte Data "2017-03-13 16:14:36" para "Postado em 25 de Janeiro de 2017 10:00"
 * @property $string
 */
function postadoem($string) {

    $dia_sem = date('w', strtotime($string));

    if ($dia_sem == 0) {
        $semana = "Domingo";
    } elseif ($dia_sem == 1) {
        $semana = "Segunda-feira";
    } elseif ($dia_sem == 2) {
        $semana = "Terça-feira";
    } elseif ($dia_sem == 3) {
        $semana = "Quarta-feira";
    } elseif ($dia_sem == 4) {
        $semana = "Quinta-feira";
    } elseif ($dia_sem == 5) {
        $semana = "Sexta-feira";
    } else {
        $semana = "Sábado";
    }

    $dia = date('d', strtotime($string));

    $mes_num = date('m', strtotime($string));
    if ($mes_num == 01) {
        $mes = "Janeiro";
    } elseif ($mes_num == 02) {
        $mes = "Fevereiro";
    } elseif ($mes_num == 03) {
        $mes = "Março";
    } elseif ($mes_num == 04) {
        $mes = "Abril";
    } elseif ($mes_num == 05) {
        $mes = "Maio";
    } elseif ($mes_num == 06) {
        $mes = "Junho";
    } elseif ($mes_num == 07) {
        $mes = "Julho";
    } elseif ($mes_num == 08) {
        $mes = "Agosto";
    } elseif ($mes_num == 09) {
        $mes = "Setembro";
    } elseif ($mes_num == 10) {
        $mes = "Outubro";
    } elseif ($mes_num == 11) {
        $mes = "Novembro";
    } else {
        $mes = "Dezembro";
    }

    $ano = date('Y', strtotime($string));
    $hora = date('H:i', strtotime($string));

    return $semana . ', ' . $dia . ' de ' . $mes . ' de ' . $ano . ' às ' . $hora;
}

<?php


class calcular{
    public function calcularDatos($cantidad){
        if($cantidad>='1' & $cantidad<'2'){
           return 0.25;
        }elseif($cantidad>='2' & $cantidad<'3'){
            return 0.30;
        }elseif($cantidad>='3'){
            return 0.35;
        }else{
            return 0;
        }
    }
    
    
    public function calcularDatos2($opcion1){
        if($opcion1=='Personal'){
           return 5;
            
        }elseif($opcion1=='Grande'){
            return 12;
        }elseif($opcion1=='Gigante'){
            return 16;
        }else{
            return 0;
        }
    }
    
    
    public function calcularDatos3($opcion2){
        if($opcion2=='Pan'){
           return 2;
        }elseif($opcion2=='Masa'){
            return 3;
        }else{
            return 0;
        }
    }
    
    
    
    
    public function calcularDatos4($s1){
        if($s1=='Sucursal'){
           return 0.12;
            
        }elseif($s1=='Telefono'){
           return 0.15;
        }elseif($s1=='Internet'){
            return 0.17;
        }
    }
    
    
    
    public function calcularDatos5($s2){
        if($s2=='Normal'){
           return 0;
        }elseif($s2=='Frecuente'){
           return 0.05;
        }elseif($s2=='Grande'){
           return 0.07;
        }elseif($s2=='Empresarial'){
            return 0.09;
        }
    }
    
    
}

?>
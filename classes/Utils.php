<?php
class Utils
{

    public function formatImage($arregloImagenes)
    {
        $arrayImagenes = array();

        //foreach recorre automaticamente cada registro de un arreglo
        foreach ($arregloImagenes as $rowImagen) {
            $singleImagen = array(
                "idImagen" => $rowImagen['id'],
                "contenido" => $rowImagen['content'],
                "nombreImagen" => $rowImagen['nombre_de_la_imagen'],
                "is_active" => $rowImagen['is_active'],
            );
            //agregar valores a el arreglo
            array_push($arrayImagenes, $singleImagen);

        }
        return $arrayImagenes;
    }


}


<?php

namespace App\Ahex\Printing\Application;

use App\Consolidado;
use App\Cliente;
use App\Entrada;
use App\Salida;

class ConsolidadoTemplate extends TemplateBase
{
    public function setContent($sheet)
    {
        switch ($sheet) {
            case 'entradas':
                return $this->entradas();
                break;

            case 'etapas':
                return $this->etapas();
                break;

            case 'etiquetas':
                return $this->etiquetas();
                break;
            
            default:
                return $this->informacion();
                break;
        }
    }

    private function entradas()
    {
        $collection = $this->collectionEntradas('informacion', $this->model->entradas);
        return [
            'consolidado' => $this->model,
            'collection' => $collection,
        ];
    }

    private function etapas()
    {
        $collection = $this->collectionEntradas('etapas', $this->model->entradas);
        return [
            'consolidado' => $this->model,
            'collection' => $collection,
        ];
    }

    private function etiquetas()
    {
        $collection = $this->collectionEntradas('etiqueta', $this->model->entradas);
        return [
            'consolidado' => $this->model,
            'collection' => $collection,
        ];
    }

    private function informacion()
    {
        return [
            'consolidado' => $this->model,
            'cliente'     => $this->model->cliente ?? new Cliente,
            'entradas'    => $this->model->entradas,
            'sheet'       => SheetsTray::get('consolidado'),
        ];
    }

    private function collectionEntradas($sheet, $entradas)
    {
        $collection = array();

        foreach($entradas as $entrada)
        {
            $content = new EntradaTemplate($sheet, $entrada);
            array_push($collection, $content);
        }

        return $collection;
    }
}

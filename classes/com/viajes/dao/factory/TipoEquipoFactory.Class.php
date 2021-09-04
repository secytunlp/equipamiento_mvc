<?php

/**
 * Factory para TipoEquipo
 *  
 * @author Marcos
 * @since 28-06-2016
 */
class TipoEquipoFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('TipoEquipo');
        $motivo = parent::build($next);
        

        return $motivo;
    }

}
?>

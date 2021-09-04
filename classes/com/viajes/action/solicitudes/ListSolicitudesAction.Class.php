<?php

/**
 * Acción para listar solicitudes.
 *
 * @author Marcos
 * @since 13-11-2013
 *
 */
class ListSolicitudesAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPSolicitudGrid();
	}



}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Usuarios extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Valida si el usuario existe en la base de datos.
     * @param type $DNI Numero con el cual se loguea para tener acceso a la web
     * @param type $PASS es la clave que utiliza el usuario para loguearse.
     * @return Devuelve 0 o 1 en caso de que existiera algun campo que coincida con la consulta.
     */
    public function Comprueba_User($DNI, $PASS) {

        $sql = "SELECT * FROM usuarios WHERE DNI ='" . $DNI . "' and Contrasena ='" . $PASS . "' and  baja='0';";
        $Usuario = $this->db->query($sql);
        return $Usuario->num_rows();
    }

    /**
     * Devuelve el valor del campo Primer Inicio para saber si esta a 0 o 1.
     * @param type $DNI es el valor identificativo del usario.
     * @return type Devuelve el valor buscado en la consulta.
     */
    public function Primer_Inicio($DNI) {
        $sql = "SELECT Primer_inicio FROM usuarios WHERE DNI ='" . $DNI . "';";
        $Usuario = $this->db->query($sql);
        return $Usuario->row();
    }

    /**
     * Devuelve todos los datos del usuario.
     * @param type $DNI valor el cual identifica al usuario
     * @return type Devuelve todo los datos del usuario buscado.
     */
    public function Devuelve_DatosUsuarios($DNI) {
        $sql = "SELECT * FROM usuarios WHERE DNI ='" . $DNI . "';";
        $usuario = $this->db->query($sql);
        return $usuario->result();
    }

    /**
     * Devuelve el tipo de usuario que es.
     * @param type $DNI Es el numero por el cual se identifica el usuario.
     * @return type Devuelve el valor del campo buscado.
     */
    public function Tipo_Usuario($DNI) {
        $sql = "SELECT Tipo_Usuario FROM usuarios WHERE DNI='" . $DNI . "';";
        $tipo = $this->db->query($sql);
        return $tipo->row();
    }

    /**
     * Inserta los datos del nuevo usuario.
     * @param type $datos Es la variable que contiene todos los datos del usuario a insertar.
     */
    public function Nuevo_Usuario($datos) {
        $this->db->insert('usuarios', $datos);
    }

    /**
     * Realiza una peticion para obtener una lista de todos los usuarios.
     * @return type Devuelve una lista de todos los usuarios de la base de datos.
     */
    public function Lista_Usuarios() {
        $sql = "SELECT * FROM usuarios where baja ='0'";
        $usuarios = $this->db->query($sql);
        return $usuarios->result();
    }

    /**
     * Realiza una petciona al base de datos para obtener todos los usuario de tipo pasado por parametro.
     * @param type $tipo es el tipo de usuario.
     * @return type Devuelvce una lista con todo los usuario del mismo tipo.
     */
    public function Lista_FUsuario($tipo) {
        $sql = "SELECT * FROM usuarios where baja ='0' and tipo_usuario ='" . $tipo . "';";
        $usuarios = $this->db->query($sql);
        return $usuarios->result();
    }

    /**
     * Devuelve los datos de un unico usario.
     * @param type $id es el id que tiene el usuario en la base de datos.
     * @return type devuelve los datos del usaurio con id pasado por parametro.
     */
    public function DatosUnUsuario($id) {
        $sql = "SELECT * FROM usuarios WHERE ID ='" . $id . "';";
        $datos = $this->db->query($sql);
        return $datos->result();
    }

    /**
     * Actuliza los campos modificado en la base de datos.
     * @param type $id es el nuemero identificador del usuario que se va modificar.
     * @param type $Datos son los datos nuevo que se van a insertar en la base de datos.
     */
    public function ActualizaUsuario($id, $Datos) {
        $this->db->where('ID', $id);
        $this->db->update('usuarios', $Datos);
    }

    /**
     * Actualiza el campo baja para deshabilitar el usuario de la pagina web.
     * @param type $id es el numero que identifica el usuario en la base de datos.
     */
    public function BajaUsuario($id) {
        $this->db->set('baja', '1');
        $this->db->where('ID', $id);
        $this->db->update('usuarios');
    }

    /**
     * Realiza la inserccion de los datos del nuevo juicio en la BD.
     * @param type $datos Son los datos del nuevo Juicio.
     * @return type Devuelve el id de la inserccion para ser utilizado.
     */
    public function NuevoJuicio($datos) {
        $this->db->insert('juicio', $datos);
        return $this->db->insert_id();
    }

    /**
     * Inserta los datos de los procedimientos adjunto al juicio creado anteriormente.
     * @param type $datos son los datos del procedimiento.
     */
    public function NuevoProcedimiento($datos) {
        $this->db->insert('procedimiento', $datos);
    }
/**
 * Inserta el numero de idenbtificacion del abaogado  y el juicio que lleva.
 * @param type $datos son los datos a insertar.
 */
    public function NuevoAbogadoJuicio($datos) {
        $this->db->insert('abogado_juicio', $datos);
    }
/**
 * Inserta el numero de identificacion del usuario y el juicio al que pertenece
 * @param type $datos son los datos a insertar.
 */
    public function NuevoAcusadoJuicio($datos) {
        $this->db->insert('usuario_juico', $datos);
    }
/**
 * Obtiene le numero de identificacion del usuario en la base de datos.
 * @param type $dni es el numero identificativo del usuario.
 * @return type Devuelve el valor del campo buscado.
 */
    public function idusuario($dni) {
        $sql = "SELECT id FROM usuarios where dni ='" . $dni . "'";
        $usuarios = $this->db->query($sql);
        return $usuarios->row();
    }
/**
 * Devuelve la lista del usaurio segun el tipo del usuario.
 * @param type $tipo Es el tipo del usuario.
 * @return type devuelve la lista de todos los usuarios segun el tipo.
 */
    public function Lista_Acusado($tipo) {
        $sql = "SELECT * FROM usuarios WHERE TIPO_USUARIO ='" . $tipo . "'; ";
        $usuario = $this->db->query($sql);
        return $usuario->result();
    }
/**
 * Devuelve una lista con todos los juicios.
 * @param type $comienzo 
 * @param type $por_pagina
 * @return type Devuelve la lista de todos los juicios paginado.
 */
    public function Lista_Juicios($comienzo, $por_pagina) {
        $sql = "SELECT * FROM juicio  LIMIT $comienzo,$por_pagina";
        $lista = $this->db->query($sql);
        return $lista->result();
    }
/**
 * Devuelve el numero de juicios que exiten.
 * @return type
 */
    public function CLista_Juicios() {
        $sql = "SELECT ID FROM Juicio";
        $lista = $this->db->query($sql);
        return $lista->num_rows();
    }
/**
 * Realiza una busqueda de los procedimiento segun el id del juicio.
 * @param type $idjuicio es el numero que identifica al juicio.
 * @return type Devuelve los datos de los procedimiento.
 */
    public function Lista_procedimiento($idjuicio) {
        $sql = "SELECT * FROM PROCEDIMIENTO WHERE JUICIOS_ID=$idjuicio";
        $lista = $this->db->query($sql);
        return $lista->result();
    }
/**
 * Muestra una lista de todos los tiket segun el estado en el que se encuentre.
 * @param type $estado
 * @return type
 */
    public function Ver_Tiket($estado) {
        $sql = "SELECT * FROM TICKET WHERE ESTADO ='" . $estado . "' ORDER BY FECHA_CREACION DESC;";
        $lista = $this->db->query($sql);
        return $lista->result();
    }
/**
 * Obtiene todos los mensajes entre un usuario y un abogado. 
 * @param type $idtiket es el numero que identifica al tiket
 * @return type
 */
    public function Ver_Mensaje($idtiket) {
        $sql = "SELECT * FROM MENSAJE WHERE TICKET_ID = " . $idtiket;
        $mensaje = $this->db->query($sql);
        return $mensaje->result();
    }
/**
 * Obtiene el numero del procedimiento segun el id.
 * @param type $id
 * @return type
 */
    public function Devuelve_Nprocedimiento($id) {
        $sql = "SELECT NUM_PROCEDIMIENTO FROM PROCEDIMIENTO WHERE ID=" . $id;
        $numero = $this->db->query($sql);
        return $numero->row();
    }
/**
 * Inserta un nuevo tiket en la BD
 * @param type $datos son los datos que se vam a insertar en la bd.
 * @return type devuelve el id  generado del tiket.
 */
    public function NuevoTiket($datos) {
        $this->db->insert('ticket', $datos);
        return $this->db->insert_id();
    }
/**
 * Inserta el mensaje escrito en el tiket.
 * @param type $datos contiene el mensaje del tiket.
 */
    public function NuevoMensaje($datos) {
        $this->db->insert('mensaje', $datos);
    }
/**
 * Devuele el nombre completo del usuario segun el identificador pasado por parametros.
 * @param type $id idenrtificador del usuario.
 * @return type devuelve el valor de los campos consultado.
 */
    public function NombreUsuarios($id) {
        $sql = "SELECT NOMBRE, APELLIDO1,APELLIDO2 FROM usuarios WHERE ID =" . $id;
        $nombre = $this->db->query($sql);
        return $nombre->row();
    }
/**
 * Actuliza el campo de contraseña.
 * @param type $DNI es el numero que identifica al usuario.
 * @param type $datos contiene los datos del usuarios necesarios para modificar la contraseña.
 */
    public function NuevaContraseña($DNI, $datos) {

        $this->db->where('DNI', $DNI);
        $this->db->update('usuarios', $datos);
    }
/**
 * actualiza la lista de mensajes.
 * @param type $iduser 
 * @return type devuelve la lista de mensaje actualizada.
 */
    public function VerNuevoMensaje($iduser) {
        $sql = "SELECT * FROM MENSAJE WHERE RECEPTOR_ID = " . $iduser . " AND ESTADO = 'N';";
        $mensaje = $this->db->query($sql);
        return $mensaje->result();
    }
/**
 * Cuenta el numero de procedimiento que existen.
 */
    public function CantidadProcedimiento() {
        $sql = "SELECT count(*)as numero FROM PROCEDIMIENTO";
        $cantidad = $this->db->query($sql);
        return $cantidad->result();
    }
/**
 * Devuelve la cantidad de juicios que existe en la base de datos.
 */
    public function CantidadJuicio() {
        $sql = "SELECT count(*)as numero FROM JUICIO";
        $cantidad = $this->db->query($sql);
        return $cantidad->result();
    }

}

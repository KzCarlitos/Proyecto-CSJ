<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Usuarios extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function Comprueba_User($DNI,$PASS){
        
        $sql="SELECT * FROM usuarios WHERE DNI ='". $DNI."' and Contrasena ='". $PASS."';";
        $Usuario= $this->db->query($sql);
        return $Usuario->num_rows();
        
    }
    
    public function Devuelve_DatosUsuarios($DNI){
        $sql="SELECT * FROM USUARIOS WHERE DNI ='".$DNI."';";
        $usuario= $this->db->query($sql);
        return $usuario->result();
        
    }
    
    public function Tipo_Usuario($DNI){
        $sql="SELECT Tipo_Usuario FROM USUARIOS WHERE DNI='".$DNI."';";
        $tipo=$this->db->query($sql);
        return $tipo->row();
    }
    
    public function Nuevo_Usuario($datos){
        $this->db->insert('usuarios',$datos);
    }
    
}

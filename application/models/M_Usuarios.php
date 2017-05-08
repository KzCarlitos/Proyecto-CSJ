<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Usuarios extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function Comprueba_User($DNI,$PASS){
        
        $sql="SELECT * FROM usuarios WHERE DNI ='". $DNI."' and Contrasena ='". $PASS."' and  baja='0';";
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

    public function Lista_Usuarios(){
        $sql="SELECT * FROM USUARIOS where baja ='0'";
        $usuarios=$this->db->query($sql);
        return $usuarios->result();
    }
    
    public function DatosUnUsuario($id){
        $sql="SELECT * FROM USUARIOS WHERE ID ='".$id."';";
        $datos=$this->db->query($sql);
        return $datos->result();
    }

    public function ActualizaUsuario($id,$Datos){
        $this->db->where('ID',$id);
        $this->db->update('usuarios',$Datos);
    }

    public function BajaUsuario($id){
        $this->db->set('baja','1');
        $this->db->where('ID',$id);
        $this->db->update('usuarios');

    }

    public function NuevoJuicio($datos){
        $this->db->insert('juicio',$datos);
        return $this->db->insert_id();

    }

     public function NuevoProcedimiento($datos){
        $this->db->insert('procedimiento',$datos);
         

    }
     public function NuevoAbogadoJuicio($datos){
        $this->db->insert('abogado_juicio',$datos);
        

    }

      public function NuevoAcusadoJuicio($datos){
        $this->db->insert('usuario_juico',$datos);
       

    }

     public function idusuario($dni){
        $sql="SELECT id FROM USUARIOS where dni ='".$dni."'";
        $usuarios=$this->db->query($sql);
        return $usuarios->row();
    }

    public function Lista_Acusado(){
        $sql="SELECT * FROM USUARIOS WHERE TIPO_USUARIO ='U'; ";
        $usuario= $this->db->query($sql);
        return $usuario->result();
    }





}

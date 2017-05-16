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
    
    public function Primer_Inicio($DNI){
        $sql="SELECT Primer_inicio FROM usuarios WHERE DNI ='". $DNI."';";
        $Usuario= $this->db->query($sql);
        return $Usuario->row();
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

    public function Lista_Acusado($tipo){
        $sql="SELECT * FROM USUARIOS WHERE TIPO_USUARIO ='".$tipo."'; ";
        $usuario= $this->db->query($sql);
        return $usuario->result();
    }

   
    public function Lista_Juicios($por_pagina,$comienzo){
       $sql= "SELECT * FROM juicio  LIMIT $por_pagina,$comienzo";
       $lista= $this->db->query($sql);
       return $lista->result();
   }
   
    public function CLista_Juicios(){
       $sql= "SELECT ID FROM Juicio";
       $lista= $this->db->query($sql);
       return $lista->num_rows();
   }
   
   public function Lista_procedimiento($idjuicio){
       $sql="SELECT * FROM PROCEDIMIENTO WHERE JUICIOS_ID=$idjuicio";
       $lista= $this->db->query($sql);
       return $lista->result();
       
   }

   public function Ver_Tiket($estado){
    $sql="SELECT * FROM TICKET WHERE ESTADO ='".$estado."' ORDER BY FECHA_CREACION DESC;";
    $lista=$this->db->query($sql);
    return $lista->result();
   }

   public function Ver_Mensaje($idtiket) {
    $sql="SELECT * FROM MENSAJE WHERE TICKET_ID = ".$idtiket;
     $mensaje=$this->db->query($sql);
    return $mensaje->result();

   }
   
   public function Devuelve_Nprocedimiento($id){
       $sql="SELECT NUM_PROCEDIMIENTO FROM PROCEDIMIENTO WHERE ID=".$id;
       $numero= $this->db->query($sql);
       return $numero->row();
   }

   public function NuevoTiket($datos){
    $this->db->insert('ticket',$datos);
    return $this->db->insert_id();
   }

   public function NuevoMensaje($datos){
    $this->db->insert('mensaje',$datos);
   }

   public function NombreUsuarios($id){
       $sql ="SELECT NOMBRE, APELLIDO1,APELLIDO2 FROM USUARIOS WHERE ID =".$id;
       $nombre=$this->db->query($sql);
       return $nombre->row();
   }
   
    public function NuevaContraseña($DNI,$datos){
        
        $this->db->where('DNI',$DNI);
        $this->db->update('usuarios',$datos);

    }
    
    public function VerNuevoMensaje($iduser){
        $sql="SELECT * FROM MENSAJE WHERE RECEPTOR_ID = ".$iduser." AND ESTADO = 'N';";
         $mensaje=$this->db->query($sql);
       return $mensaje->result();
    }
   
}

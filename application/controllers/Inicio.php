<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	
	public function index()
	{
            If(isset($_SESSION['SessionIniciada'])){
                $pagina=$this->load->view('Inicio','',TRUE);
                $this->CargaVista(Array('pagina'=>$pagina));
            }else{
               $this->load->view('login');  
            }
             
	}
        
         public function CargaVista($pagina){
             $this->load->view('head');
             $this->load->view('body',$pagina);
             $this->load->view('footer');
                        
             
         }
        
        
        
        /**
         * esta funcion se encarga de validar al usuario
         */
        public function login(){
            
            $this->load->model("M_Usuarios");
            
                      
            $user=$this->input->post('user');
            $pass=$this->input->post('pass');
            
           
            
            
                $ExisteUsuario= $this->M_Usuarios->Comprueba_User($user,$pass);
                
                if($ExisteUsuario == 1)
                    {
                    
                        $DatosUsuario= $this->M_Usuarios->Devuelve_DatosUsuarios($user);
                        $TipoUsuario= $this->M_Usuarios->Tipo_Usuario($user);
                        
                        $this->session->set_userdata('DatosUsuario',$DatosUsuario );
                        $this->session->set_userdata('TipoUsuario',$TipoUsuario);
                        $this->session->set_userdata('SessionIniciada',TRUE);
                        //print_r($DatosUsuario);
                        
                        $pagina=$this->load->view('Inicio',Array('Datos'=> $DatosUsuario),TRUE);
                        $this->CargaVista(Array('pagina'=>$pagina));
                    }
                    else
                    {
                       
                        $this->load->view('login',array('error' => true));
                    }
            
            
                
        }
        
        
        /**
         * carga una pagiga en la que informa al usuario del cambio de contraseña.
         */
        public function reset(){}
        /**
         * Crea un nuevo usuario en la base de datos.
         */
         public function nuevo_usuario(){
             $this->form_validation->set_error_delimiters('<span style="color: red">', '</span>');
             $this->form_validation->set_rules('dni','DNI','required|max_length[9]|is_unique[usuarios.DNI]|valid_dni');
             $this->form_validation->set_rules('nombre','Nombre','required');
             $this->form_validation->set_rules('1apellido','1º Apellido','required');
             $this->form_validation->set_rules('2apellido','2º Apellido','required');
             $this->form_validation->set_rules('telefono','Telefono','required|max_length[9]');
             $this->form_validation->set_rules('direccion','Direccion','required');
             $this->form_validation->set_rules('provincia','Provincia','required');
             $this->form_validation->set_rules('cpostal','Codigo Postal','required|max_length[5]');
             $this->form_validation->set_rules('pass','Contraseña','required');
             $this->form_validation->set_rules('Tuser','Tipo de usuario','required');
                
             $this->form_validation->set_message('required', 'Debes rellenar el campo %s');
		$this->form_validation->set_message('max_length', 'El campo %s debe ser como maximo de %s carácteres');
		$this->form_validation->set_message('valid_dni', 'El %s no tiene el formato valido');
		$this->form_validation->set_message('is_unique', 'El %s ya esta registrado');
                
             if($this->form_validation->run()== FALSE)
                 {
                  $pagina=$this->load->view('nuevo_usuario','',TRUE);
                  $this->CargaVista(Array('pagina'=>$pagina));
                 
                 }
                 else
                 {
                    $dni=$this->input->post('dni');
                   $nombre=$this->input->post('nombre');
                   $apellido1=$this->input->post('1apellido');
                   $apellido2=$this->input->post('2apellido');
                   $telefono=$this->input->post('telefono');
                   $direccion=$this->input->post('direccion');
                   $provincia=$this->input->post('provincia');
                   $cpostal=$this->input->post('cpostal');
                   $tipoUsuario=$this->input->post('Tuser');
                   $contrasena=$this->input->post('pass');
                   $pinicion=$this->input->post('inicio');
                     
                   $NuevoUsuario= array(
                       'DNI'=>$dni,
                       'Nombre'=>$nombre,
                       'Apellido1'=>$apellido1,
                       'Apellido2'=>$apellido2,
                       'Telefono'=>$telefono,
                       'Direccion'=>$direccion,
                       'Provincia'=>$provincia,
                       'Codigo_Postal'=>$cpostal,
                       'Tipo_Usuario'=>$tipoUsuario,
                       'Contrasena'=>$contrasena,
                       'Primer_Inicio'=>$pinicion
                   );
                   
                   $this->load->model('M_Usuarios');
                   $this->M_Usuarios->Nuevo_Usuario($NuevoUsuario);
                   
                   $pagina=$this->load->view('nuevo_usuario',Array('completado'=>TRUE),TRUE);
                  $this->CargaVista(Array('pagina'=>$pagina));
                   
                 }
             
             
               
                         
              
             
             
            $pagina=$this->load->view('nuevo_usuario','',TRUE);
             $this->CargaVista(Array('pagina'=>$pagina));

        }
       
        
         
}

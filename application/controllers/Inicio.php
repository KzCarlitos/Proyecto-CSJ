<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

    public function index() {
        if (isset($_SESSION['SessionIniciada'])) {
            $pagina = $this->load->view('Inicio', '', TRUE);
            $this->CargaVista(Array('pagina' => $pagina));
        } else {
            $this->load->view('login');
        }
    }

    public function CargaVista($pagina) {
        $this->load->view('head');
        $this->load->view('body', $pagina);
        $this->load->view('footer');
    }

    /**
     * esta funcion se encarga de validar al usuario
     */
    public function login() {

        $this->load->model("M_Usuarios");


        $user = $this->input->post('user');
        $pass = $this->input->post('pass');



        $ExisteUsuario = $this->M_Usuarios->Comprueba_User($user, $pass);
        $PrimerInicio = $this->M_Usuarios->Primer_Inicio($user);

        if ($ExisteUsuario == 1 && $PrimerInicio->Primer_inicio == 1) {
            $this->session->set_userdata('Usuario', $user);

            $this->load->view('primer_inicio');
        } else {



            if ($ExisteUsuario == 1 && $PrimerInicio->Primer_inicio == 0) {

                $DatosUsuario = $this->M_Usuarios->Devuelve_DatosUsuarios($user);
                $TipoUsuario = $this->M_Usuarios->Tipo_Usuario($user);

                $this->session->set_userdata('DatosUsuario', $DatosUsuario);
                $this->session->set_userdata('TipoUsuario', $TipoUsuario);
                $this->session->set_userdata('SessionIniciada', TRUE);
                //print_r($DatosUsuario);

                $pagina = $this->load->view('Inicio', Array('Datos' => $DatosUsuario), TRUE);
                $this->CargaVista(Array('pagina' => $pagina));
            } else {

                $this->load->view('login', array('error' => true));
            }
        }
    }

    /**
     * carga una pagiga en la que informa al usuario del cambio de contraseña.
     */
    public function reset() {
        
    }

    /**
     * Crea un nuevo usuario en la base de datos.
     */
    public function nuevo_usuario() {
        $this->form_validation->set_error_delimiters('<span style="color: red">', '</span>');
        $this->form_validation->set_rules('dni', 'DNI', 'required|max_length[9]|is_unique[usuarios.DNI]|valid_dni');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('1apellido', '1º Apellido', 'required');
        $this->form_validation->set_rules('2apellido', '2º Apellido', 'required');
        $this->form_validation->set_rules('telefono', 'Telefono', 'required|max_length[9]');
        $this->form_validation->set_rules('direccion', 'Direccion', 'required');
        $this->form_validation->set_rules('provincia', 'Provincia', 'required');
        $this->form_validation->set_rules('cpostal', 'Codigo Postal', 'required|max_length[5]');
        $this->form_validation->set_rules('pass', 'Contraseña', 'required');
        $this->form_validation->set_rules('Tuser', 'Tipo de usuario', 'required');

        $this->form_validation->set_message('required', 'Debes rellenar el campo %s');
        $this->form_validation->set_message('max_length', 'El campo %s debe ser como maximo de %s carácteres');
        $this->form_validation->set_message('valid_dni', 'El %s no tiene el formato valido');
        $this->form_validation->set_message('is_unique', 'El %s ya esta registrado');

        if ($this->form_validation->run() == FALSE) {
            $pagina = $this->load->view('nuevo_usuario', '', TRUE);
            $this->CargaVista(Array('pagina' => $pagina));
        } else {
            $dni = $this->input->post('dni');
            $nombre = $this->input->post('nombre');
            $apellido1 = $this->input->post('1apellido');
            $apellido2 = $this->input->post('2apellido');
            $telefono = $this->input->post('telefono');
            $direccion = $this->input->post('direccion');
            $provincia = $this->input->post('provincia');
            $cpostal = $this->input->post('cpostal');
            $tipoUsuario = $this->input->post('Tuser');
            $contrasena = $this->input->post('pass');
            $pinicion = $this->input->post('inicio');

            $NuevoUsuario = array(
                'DNI' => $dni,
                'Nombre' => $nombre,
                'Apellido1' => $apellido1,
                'Apellido2' => $apellido2,
                'Telefono' => $telefono,
                'Direccion' => $direccion,
                'Provincia' => $provincia,
                'Codigo_Postal' => $cpostal,
                'Tipo_Usuario' => $tipoUsuario,
                'Contrasena' => $contrasena,
                'Primer_Inicio' => $pinicion
            );

            $this->load->model('M_Usuarios');
            $this->M_Usuarios->Nuevo_Usuario($NuevoUsuario);

            $pagina = $this->load->view('nuevo_usuario', Array('completado' => TRUE), TRUE);
            $this->CargaVista(Array('pagina' => $pagina));
        }
    }

    public function lista_usuarios() {
        $this->load->model('M_Usuarios');
        $usuarios = $this->M_Usuarios->Lista_Usuarios();

        $pagina = $this->load->view('lista_usuario', Array('usuarios' => $usuarios), TRUE);
        $this->CargaVista(Array('pagina' => $pagina));
    }

    public function editar_usuario() {
        $id = $this->uri->segment(3);
        $this->load->model('M_Usuarios');
        $datos = $this->M_Usuarios->DatosUnUsuario($id);

        $pagina = $this->load->view('editar_usuario', Array('datos' => $datos), TRUE);
        $this->CargaVista(Array('pagina' => $pagina));
    }

    public function modificar_usuario() {
        $this->form_validation->set_error_delimiters('<span style="color: red">', '</span>');

        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('1apellido', '1º Apellido', 'required');
        $this->form_validation->set_rules('2apellido', '2º Apellido', 'required');
        $this->form_validation->set_rules('telefono', 'Telefono', 'required|max_length[9]');
        $this->form_validation->set_rules('direccion', 'Direccion', 'required');
        $this->form_validation->set_rules('provincia', 'Provincia', 'required');
        $this->form_validation->set_rules('cpostal', 'Codigo Postal', 'required|max_length[5]');
        $this->form_validation->set_rules('pass', 'Contraseña', 'required');


        $this->form_validation->set_message('required', 'Debes rellenar el campo %s');
        $this->form_validation->set_message('max_length', 'El campo %s debe ser como maximo de %s carácteres');
        $this->form_validation->set_message('valid_dni', 'El %s no tiene el formato valido');
        $this->form_validation->set_message('is_unique', 'El %s ya esta registrado');
        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post('id');
            echo $id;
            $this->load->model('M_Usuarios');
            $datos = $this->M_Usuarios->DatosUnUsuario($id);

            $pagina = $this->load->view('editar_usuario', Array('datos' => $datos), TRUE);
            $this->CargaVista(Array('pagina' => $pagina));
        } else {
            $dni = $this->input->post('dni');
            $nombre = $this->input->post('nombre');
            $apellido1 = $this->input->post('1apellido');
            $apellido2 = $this->input->post('2apellido');
            $telefono = $this->input->post('telefono');
            $direccion = $this->input->post('direccion');
            $provincia = $this->input->post('provincia');
            $cpostal = $this->input->post('cpostal');


            $pinicion = $this->input->post('inicio');

            $Modificado = array(
                'Nombre' => $nombre,
                'Apellido1' => $apellido1,
                'Apellido2' => $apellido2,
                'Telefono' => $telefono,
                'Direccion' => $direccion,
                'Provincia' => $provincia,
                'Codigo_Postal' => $cpostal,
                'Primer_Inicio' => $pinicion
            );
            $id = $this->input->post('id');
            $this->load->model('M_Usuarios');
            $this->M_Usuarios->ActualizaUsuario($id, $Modificado);
            if ($_SESSION['DatosUsuario'][0]->DNI == $dni) {
                $DatosUsuario = $this->M_Usuarios->Devuelve_DatosUsuarios($dni);
                $this->session->set_userdata('DatosUsuario', $DatosUsuario);
            }
            $usuarios = $this->M_Usuarios->Lista_Usuarios();
            $pagina = $this->load->view('lista_usuario', Array('usuarios' => $usuarios, 'completado' => TRUE), TRUE);
            $this->CargaVista(Array('pagina' => $pagina));
        }
    }

    public function Baja_Usuario($id) {
        $id = $this->uri->segment(3);
        $this->load->model('M_Usuarios');
        $this->M_Usuarios->BajaUsuario($id);
        if ($_SESSION['DatosUsuario'][0]->ID == $id) {
            $this->session->unset_userdata('DatosUsuario');
            $this->session->unset_userdata('TipoUsuario');
            $this->session->unset_userdata('SessionIniciada');
            $this->index();
        } else {
            $this->lista_usuarios();
        }
    }

    public function Desconectarse() {
        $this->session->unset_userdata('DatosUsuario');
        $this->session->unset_userdata('TipoUsuario');
        $this->session->unset_userdata('SessionIniciada');
        $this->index();
    }

    public function crear_juicio() {
        $this->load->model('M_Usuarios');
        $this->form_validation->set_error_delimiters('<span style="color: red">', '</span>');

        $this->form_validation->set_rules('fjuicio', 'Fecha Juicio', 'required');
        $this->form_validation->set_rules('acusado', 'Nombre Acusado', 'required');
        $this->form_validation->set_rules('estado', 'Estado', 'required');
        //$this->form_validation->set_rules('fichero', 'Fichero', 'required');
        $this->form_validation->set_rules('njuicio', 'Numero de juicio', 'required');
        $this->form_validation->set_rules('nprocedimiento', 'Procedimiento', 'required');
        $this->form_validation->set_message('required', 'Debes rellenar el campo %s');



        if ($this->form_validation->run() == FALSE) {

            $usuario = $this->M_Usuarios->Lista_Acusado('U');

            $pagina = $this->load->view('nuevo_juicio', Array('usuario' => $usuario), TRUE);
            $this->CargaVista(Array('pagina' => $pagina));
        } else {
            $nombre = "0315-2017.pdf";

            $fjuicio = $this->input->post('fjuicio');
            $acusado = $this->input->post('acusado');
            $abogado = $this->input->post('abogado');
            $estado = $this->input->post('estado');
            $fichero = $nombre;

            $njuicio = $this->input->post('njuicio');
            $descrip = $this->input->post('descripcion');
            $nprocedimiento = $this->input->post('nprocedimiento');

            $DNuevojuicio = array(
                'Numero_juicio' => $njuicio,
                'Fecha_juicio' => $fjuicio,
                'Estado' => $estado,
            );

            $idjuicio = $this->M_Usuarios->NuevoJuicio($DNuevojuicio);


            $DNuevoprocedimiento = array(
                //'Fecha_Procedimiento' => $fprocedimiento,
                'Descripcion' => $descrip,
                'Juicios_ID' => $idjuicio,
                'Num_Procedimiento' => $nprocedimiento,
                'Fichero' => $fichero);

            $this->M_Usuarios->NuevoProcedimiento($DNuevoprocedimiento);



            $DNuevoAbogadoJuicio = array('Usuarios_ID' => $_SESSION['DatosUsuario'][0]->ID, 'Juicios_ID' => $idjuicio);
            $this->M_Usuarios->NuevoAbogadoJuicio($DNuevoAbogadoJuicio);

            $DNuevoAcusadoJuicio = array('Usuarios_ID' => $acusado, 'Juicios_ID' => $idjuicio);
            $this->M_Usuarios->NuevoAcusadoJuicio($DNuevoAcusadoJuicio);

            $archivo = $_FILES['fichero']['tmp_name'];

            move_uploaded_file($archivo, APPPATH . '/../uploads/' . $nombre);


            $usuario = $this->M_Usuarios->Lista_Acusado('U');

            $pagina = $this->load->view('nuevo_juicio', Array('usuario' => $usuario, 'completado' => TRUE), TRUE);
            $this->CargaVista(Array('pagina' => $pagina));
        }
    }

    public function ver_juicio() {
        $this->load->model('M_Usuarios');
        $idusuario = $_SESSION['DatosUsuario'][0]->ID;

        $pages = 6; //Número de registros mostrados por páginas

        $config['base_url'] = site_url('Inicio/ver_juicio/'); // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
        $config['total_rows'] = $this->M_Usuarios->CLista_Juicios(); //calcula el número de filas
        $config['per_page'] = $pages; //Número de registros mostrados por páginas
        $config['num_links'] = 3; //Número de links mostrados en la paginación
        $config["uri_segment"] = 3; //el segmento de la paginación
        $comienzo = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


        $this->pagination->initialize($config); //inicializamos la paginació


        $listajuicios = $this->M_Usuarios->Lista_Juicios($idusuario, $config['per_page'], $comienzo);


        $pagina = $this->load->view('ver_juicio', Array('listajuicios' => $listajuicios), TRUE);
        $this->CargaVista(Array('pagina' => $pagina));
    }

    public function ver_tiket() {
        $this->load->model('M_Usuarios');

        $listatiket = $this->M_Usuarios->Ver_Tiket('A');


        $pagina = $this->load->view('ver_tiket', Array('listatiket' => $listatiket), TRUE);
        $this->CargaVista(Array('pagina' => $pagina));
    }

    public function Crear_Tiket() {
        $this->load->model('M_Usuarios');
        $this->form_validation->set_error_delimiters('<span style="color: red">', '</span>');

        $this->form_validation->set_rules('nprocedimiento', 'Nº Procedimiento', 'required');
        $this->form_validation->set_rules('abogado', 'Nombre Abogado', 'required');
        $this->form_validation->set_rules('acusado', 'Nombre Acusado', 'required');
        $this->form_validation->set_rules('estado', 'Estado', 'required');
        $this->form_validation->set_rules('mensaje', 'Mensaje', 'required');

        $this->form_validation->set_message('required', 'Debes rellenar el campo %s');



        if ($this->form_validation->run() == FALSE) {
            $id_procedimiento = $this->uri->segment(3);
            $nprocedimiento = $this->M_Usuarios->Devuelve_Nprocedimiento($id_procedimiento);

            if ($_SESSION['TipoUsuario']->Tipo_Usuario == 'A') {
                $acusados = $this->M_Usuarios->Lista_Acusado('U');
            } else {
                $acusados = $this->M_Usuarios->Lista_Acusado('A');
            }
            $pagina = $this->load->view('crear_tiket', Array('nprocedimiento' => $nprocedimiento, 'acusados' => $acusados), TRUE);
            $this->CargaVista(Array('pagina' => $pagina));
        } else {
            $id_procedimiento = $this->uri->segment(3);
            $abogado = $this->input->post('abogado');
            $acusado = $this->input->post('acusado');
            $estado = $this->input->post('estado');
            $procedimiento = array('Estado' => $estado,
                'Procedimiento_ID' => $id_procedimiento,
                'Abogado_ID' => $abogado,
                'Usuario_ID' => $acusado);
            $idTiket = $this->M_Usuarios->NuevoTiket($procedimiento);
            $mensaje = $this->input->post('mensaje');
            $consulta = array('contenido' => $mensaje,
                'Ticket_ID' => $idTiket,
                'Emisor_ID' => $abogado,
                'Receptor_ID' => $acusado,
                'Estado' => "N");
            $this->M_Usuarios->NuevoMensaje($consulta);
            
            $pagina = $this->load->view('Inicio', Array('completado' => TRUE), TRUE);
            $this->CargaVista(Array('pagina' => $pagina));
        }
    }

    public function Primer_Inicio() {

        $this->load->model("M_Usuarios");


        $pass = $this->input->post('pass');
        $passr = $this->input->post('passr');

        if ($pass == $passr) {

            $Datos = array('Primer_inicio' => '0',
                'Contrasena' => $pass);
            $this->M_Usuarios->NuevaContraseña($_SESSION['Usuario'], $Datos);

            $DatosUsuario = $this->M_Usuarios->Devuelve_DatosUsuarios($_SESSION['Usuario']);
            $TipoUsuario = $this->M_Usuarios->Tipo_Usuario($_SESSION['Usuario']);

            $this->session->set_userdata('DatosUsuario', $DatosUsuario);
            $this->session->set_userdata('TipoUsuario', $TipoUsuario);
            $this->session->set_userdata('SessionIniciada', TRUE);


            $pagina = $this->load->view('Inicio', Array('Datos' => $DatosUsuario), TRUE);
            $this->CargaVista(Array('pagina' => $pagina));
        } else {
            $this->load->view('primer_inicio', array('error' => true));
        }
    }

      public function ver_tiketC() {
        $this->load->model('M_Usuarios');

        $listatiket = $this->M_Usuarios->Ver_Tiket('C');


        $pagina = $this->load->view('ver_tiketC', Array('listatiket' => $listatiket), TRUE);
        $this->CargaVista(Array('pagina' => $pagina));
    }
    
    public function GeneraNumeroProcedimiento(){
         $this->load->model('M_Usuarios');
         $numero = $this->M_Usuarios->CantidadProcedimiento();
         echo json_encode($numero);
    }
    
    public function GeneraNumeroJuicio(){
         $this->load->model('M_Usuarios');
         $numero = $this->M_Usuarios->CantidadJuicio();
         echo json_encode($numero);
    }
    
    public function ContestaMensaje(){
        
        $data= $this->input->post();
        $this->load->model('M_Usuarios');
        $mensaje= array('contenido' => $data['contenido'],
                'Ticket_ID' => data['tiket'],
                'Emisor_ID' => $data['emisor'],
                'Receptor_ID' => $data['receptor'],
                'Estado' => "N");
        
        
        
        $this->M_Usuarios->NuevoMensaje($mensaje);
        
               
    }
    
}

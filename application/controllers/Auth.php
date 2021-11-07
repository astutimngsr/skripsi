<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Model('Model_admin');
        $this->load->Model('Model_tim_penilai');
        $this->load->Model('Model_ketua_tim');
        $this->load->Model('Model_dosen');
    }

    function index()
    {
        
        $this->load->view('auth/login');
    }

    public function chek_login() {
           // if (isset($_POST['submit'])) {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
               
                // $login_ketua_tim        = $this->Model_ketua_tim->chek_login($username, $password);
                // $login_tim_penilai      = $this->Model_tim_penilai->chek_login($username, $password);
                // $login_dosen            = $this->Model_dosen->chek_login($username, $password);
                // $loginAdmin   = $this->Model_admin->chek_login($username, md5($password));
                
                
                /** Login  */

                $this->load->helper('nusoap/nusoap');
                $client = new nusoap_client("http://apps.unhas.ac.id/nusoap/serviceApps.php");
                $client->setCredentials("informatikaUNHAS", "createdbyMe", "basic");
                $result = $client->call("login2", array("username" => $username,"password" =>md5($password)));
                $loginAdmin = json_decode($result, true);
                // echo '<pre>';
                // print_r($loginAdmin['userAccount']);
                // echo '</pre>';
                // die();

                /** turnitin utk dpt paper / karya ilmiah */

                // $this->load->helper('nusoap/nusoap');
                // $client = new nusoap_client("https://apps.unhas.ac.id/nusoap/serviceTurnitin.php");
                // $client->setCredentials("informatikaUNHAS", "createdbyMe", "basic");
                // $result = $client->call("get_publikasi", array("totalData" => "200"));
                // $resultJson = json_decode($result, true);
                // echo '<pre>';
                // print_r($resultJson);
                // echo '</pre>';
                // die();
             

                /** list fakultas */
                // $this->load->helper('nusoap/nusoap');
                // $client = new nusoap_client("http://apps.unhas.ac.id/nusoap/serviceApps.php");
                // $client->setCredentials("informatikaUNHAS", "createdbyMe", "basic");
                // $result = $client->call("list_fakultas", array("totalData" => "200"));

                // $dummydata = [
                //     {
                //         nama: 'astuti similikiti',
                //         jabatan: 'dosen yang tak diketahui',
                //         umur: 90,
                //         alamat: 'digowa samping pom bensin'
                //     }
                // ];
                // echo '<pre>';
                // print_r($dummydata);
                // echo '</pre>';
                // die();
            

                if (!empty($loginAdmin)) {
                    //success login for user
                    // $this->session->set_userdata($loginAdmin);
                    $levelUser   = $this->Model_admin->getDataLogin($loginAdmin['userAccount']);
                    $countTimPenilai = $this->Model_admin->checkTimPenilai($loginAdmin['userAccount']);
                    // $levelUser   = $this->Model_admin->chek_level($loginAdmin['level']);


                    $isTimPenilai = array();
                    if ($countTimPenilai > 0) {
                        $isTimPenilai = array(
                            'isTimPenilai' => true,
                        );
                    }
                    $this->session->set_userdata(array_merge($loginAdmin, $levelUser, $isTimPenilai));
                    echo '<pre>';
                    // print_r($countTimPenilai);
                    // print_r($countTimPenilai);
                    // echo '</pre>';
                    // die();


                    redirect('Dashboard');
                    die();

                    
                } 
                /*elseif (!empty($this->Model_ketua_tim->chek_login($username, $password))) {
                    //success login for ketua tim
                    $loginSession = $this->Model_ketua_tim->get_dosen_by_username($username);
                    $loginSession['level'] = 2;
                    $this->session->set_userdata($loginSession);
                    redirect('Dashboard');
                    die();


                } 
              elseif (!empty($this->Model_tim_penilai->chek_login($username, $password))) {
                    //success login for tim penilai
                    $loginSession = $this->Model_tim_penilai->get_dosen_by_username($username);
                    $loginSession['level'] = 3;
                    $this->session->set_userdata($loginSession);
                    redirect('Dashboard');
                    die();

                } 
               */ elseif (!empty($this->Model_admin->chek_login($username, md5($password)))) {
                    //success login for dosen
                    // $loginSession = $this->Model_dosen->get_dosen_by_username($username);
                    $getLoginData = $this->Model_admin->chek_login($username, md5($password));
                    // $loginSession['level'] = 4;
                    // $levelUser   = $this->Model_admin->getDataLogin($loginAdmin['userAccount']);

                    $countTimPenilai = $this->Model_admin->checkTimPenilai($getLoginData['nip']);
                    $isTimPenilai = array();
                    if ($countTimPenilai > 0) {
                        $isTimPenilai = array(
                            'isTimPenilai' => true,
                        );
                    }
                    $this->session->set_userdata(array_merge($getLoginData, $isTimPenilai));
                    // echo '<pre>';
                    // print_r($countTimPenilai);
                    // echo '</pre>';
                    // die();
                    redirect('Dashboard');
                    die();  

                } else {
                    $this->session->set_flashdata('error', 'Username/Password salah atau hak akses sedang bermasalah!');
		            redirect('Auth');
                    // redirect('Auth');
               // }

               /* $loginAdmin = $this->Model_admin->chek_login($username, md5($password));
                if (!empty($loginAdmin)) {
                    //success login for user
                    $this->session->set_userdata($loginAdmin);
                    redirect('Admin/Dashboard');
                    die();

                } elseif (!empty($this->Model_admin->chek_login_ketua($username)) {
                    //success login for ketua tim
                    $loginSession = $this->Model_ketua_tim->chek_login($username);
                    $this->session->set_userdata($loginSession);
                    redirect('Admin/Dashboard');
                    die();
 
                } elseif (!empty($this->Model_admin->chek_login_tim($username)) {
                    //success login for tim penilai
                    $loginSession = $this->Model_tim_penilai->chek_login($username);
                    $this->session->set_($loginSession);
                    redirect('Admin/Dashboard');
                    die();

                } elseif (!empty($this->Model_admin->chek_login_dosen($username)) {
                    //success login for dosen
                    $loginSession = $this->Model_dosen->chek_login($username);
                    $this->session->set_userdata($loginSession);
                    redirect('Admin/Dashboard');
                    die();

                } else {
                    redirect('Auth');
                }*/
            }
        }

    public function testDosen()
	    {
            $this->load->helper('nusoap/nusoap');
            $client = new nusoap_client("http://apps.unhas.ac.id/nusoap/serviceApps.php");
            $client->setCredentials("informatikaUNHAS", "createdbyMe", "basic");
            $result = $client->call("login2", array("username" => "199011282019043001","password" =>md5("wkwkwkwkwkwk")));
            var_dump($client);
            die();
            $data = json_decode($result);
	    }

	public function testDosen2()
	    {
            if ($this->input->get('query')) {
                $this->load->helper('nusoap/nusoap');
                $client = new nusoap_client("http://apps.unhas.ac.id/nusoap/serviceApps.php");
                $client->setCredentials("informatikaUNHAS", "createdbyMe", "basic");
                $result = $client->call("getUser", array("search" => $this->input->get('query')));
                echo $result;
            }
            // die($result);
        }
    
    function Logout() {
        // $this->session->sess_destroy();
        session_destroy();
        redirect('Auth');
    }
	
}



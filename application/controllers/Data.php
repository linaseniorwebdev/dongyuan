<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Base.php';

class Data extends  Base {

    public function __construct() {
        parent::__construct();
        $this->load->model('Global_model');
        $this->load->model('Users_model');

        $this->load->helper('directory');
        $this->load->library('session');
        $this->load->helper('url');
    }

    private function checkLogin() {

        $userInfo = $this->user->getUsername();
        $sess_flag = false;
        if (!isset($userInfo)) {
            $sess_flag = false;
        }else{
            $sess_flag = true;
        }
        if($sess_flag == false){
            $baseurl = $this->Global_model->get_baseurl();
            redirect($baseurl."/page/signin", 'refresh');
        }else{
            return true;
        }
    }

    public function login() {

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->Users_model->get_by_name($username);
        if ($user) {
            $password = md5(SALT . $password);
            if ($password === $user['password']) {
                $this->session->set_userdata('user', $user['id']);
                unset($user['password']);
                redirect('/');
            } else {
                $data['message'] = '密码不正确';
                $this->load->view('front/login', $data);
            }
        } else {
            $data['message'] = '未注册的账户';
            $this->load->view('front/login', $data);
        }

    }

    public function register() {
        $file_element_name = 'image';
        $image_url ="";
        $status = "";
        if ($file_element_name)
        {
            if ($status != "error")
            {
                $config['upload_path'] = './public/uploads/users';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 500 * 500;
                $config['encrypt_name'] = FALSE;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($file_element_name))
                {
                    $status = 'error';
                    $msg = $this->upload->display_errors('', '');
                }
                else
                {
                    $data = $this->upload->data();
                    $image_url = $data['file_name'];
                }
            }
            $params['photo'] = $image_url;
        }

        $role = $this->input->post('role');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $params['username'] = $username;
        $params['password'] = md5(SALT.$password);
        $params['permission'] = $role;

        $data = array(
            'state' => 'fail',
            'msg' => ''
        );

        $sqls = "select * from dy_users where username ='".$username."'";
        $row = $this->Global_model->excute_query_row($sqls);
        if($row){
            $data['state'] = 'fail';
            $data['msg'] = 'exist';

        }else{
            $result = $this->Users_model->add_user($params);
            if ($result)
            $data = array(
                'state' => 'success',
                'msg' => 'success',
            );
        }
        echo json_encode($data);

    }
    public function logOut() {
        if ($this->login) {
            $this->session->unset_userdata('user');
        }
        $baseurl = $this->Global_model->get_baseurl();
        redirect($baseurl."/home/signin", 'refresh');


    }

}
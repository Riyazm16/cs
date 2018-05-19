<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
//        echo "in";
//        die;
        $this->load->model('UserDetailsModel');
        $this->load->library('Notification');
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->load->view('index');
    }

    public function submitDetails() {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $contact = $this->input->post('contact');
        $hairline = $this->input->post('hairline');
        $redirectUrl = $this->input->post('redirect_url');
        $Img = null;
        $validateData = array($name, $email, $contact, $hairline);
        $emailData = array(
            'name' => $name,
            'email' => $email,
            'contact' => $contact,
            'hairline' => $hairline,
        );
        if (array_filter($validateData)) {
            try {
                $this->notification->sendNotification('Thank you', $emailData);
                $this->notification->sendNotificationAdmin('Patient Details', $Img, $emailData);
                $this->session->set_flashdata('redirecturl', $redirectUrl);
                
                redirect(base_url()  . "thank-you");
            } catch (Exception $ex) {
                redirect(base_url() . $redirectUrl);
            }
        } else {
            redirect(base_url() . $redirectUrl);
        }
    }

    public function original() {

        $emailData = array(
            'name' => $name,
            'email' => $email,
            'contact' => $contact,
            'hairline' => $hairline,
        );
        $config = array();
        $this->load->library('upload');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $contact = $this->input->post('contact');
        $hairline = $this->input->post('hairline');
        $checkArray = array($name, $email, $contact, $hairline);
        $error = false;
        $errorMsg = null;
        if (array_filter($checkArray)) {

            $dataArray = array(
                'name' => $name,
                'email' => $email,
                'contact' => $contact,
                'hairline' => $hairline,
            );
            $addData = $this->UserDetailsModel->insert('userdetails', $dataArray);
            if (!empty($addData)) {
                $userfiles = $_FILES['img']['name'];

                if (!empty($userfiles)) {
                    try {
                        $files = $_FILES;
                        $file_name = str_replace(' ', '_', time() . "_" . $files['img']['name']);
                        $filteredName = preg_replace('/[^\p{L}\p{N}\s|.]/u', '_', $file_name);
                        $config['upload_path'] = VISITOR_IMAGE_FOLDER;
                        $config['allowed_types'] = '*';
                        $config['max_size'] = '0';
                        $config['overwrite'] = FALSE;
                        $config['file_name'] = $filteredName;
                        $this->upload->initialize($config);
                        $this->upload->do_upload('img');
                        if (!$this->upload->do_upload('img')) {
                            echo "jo";
                            $error = array('error' => $this->upload->display_errors());
                            print_r($error);
                        } else {
                            echo "success";
                        }
                        $whereArray = array(
                            'id' => $addData,
                        );
                        $updateArray = array(
                            'img_name' => $filteredName,
                            'img_path' => VISITOR_IMAGE_FOLDER,
                        );
                        $this->UserDetailsModel->update('userdetails', $updateArray, $whereArray);
                    } catch (Exception $exception) {
                        $error = true;
                        $errorMsg = "error while image uploading";
                    }
                }
                $this->notification->sendNotification('Thank you', $emailData);
                $this->notification->sendNotificationAdmin('Patient Details', 'prashant.more9763@gmail.com', FROMEMAIL, $emailData);
                $emailData = array(
                    'name' => $name,
                    'email' => $email,
                    'contact' => $contact,
                    'hairline' => $hairline,
                );
                $this->notification->sendNotification('Thank you', $emailData);
                $this->notification->sendNotificationAdmin('Patient Details', 'prashant.more9763@gmail.com', FROMEMAIL, $emailData);
            }
        } else {
            $error = true;
            $errorMsg = "All values required";
        }

        if (!$error) {
            redirect(base_url() . "thank_you/ht_cost_lp");
        } else {

            redirect(base_url());
        }
    }

}

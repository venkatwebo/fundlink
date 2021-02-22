<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['page'] = "dashboard";
        $data['page_title'] = "Dashboard";
        $data['page_heading'] = "Dashboard";
        $data['js'] = "cms";
        $this->load->view(backendViewFolder() . 'starter', $data, FALSE);
    }

    public function settings()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = $this->security->xss_clean($this->input->post());

            $updateData['name'] = $input['sitename'];
            $updateData['meta_description'] = $input['meta_description'];
            $updateData['meta_keywords'] = $input['meta_keyword'];
            $updateData['meta_author'] = $input['author'];

            $old_logo = SITE_LOGO_PATH . $input['old-logo'];
            if (isset($_FILES['logo']) && !empty($_FILES['logo']) && $_FILES['logo']['size'] > "0") {
                $config['upload_path'] = SITE_LOGO_PATH;
                $config['allowed_types'] = 'jpeg|jpg|png';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('logo')) {
                    $updateData['logo'] = $this->upload->data('file_name');
                    // removeOldImage($old_logo);
                } else {
                    // echo $this->upload->display_errors();
                }
            }

            $old_favicon = SITE_LOGO_PATH . $input['old-favicon'];
            if (isset($_FILES['favicon']) && !empty($_FILES['favicon'])  && $_FILES['favicon']['size'] > "0") {
                $config['upload_path'] = SITE_LOGO_PATH;
                $config['allowed_types'] = 'ico';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('favicon')) {
                    $updateData['favicon'] = $this->upload->data('file_name');
                    removeOldImage($old_favicon);
                } else {
                    // $this->upload->display_errors()
                    $updateData['favicon'] = "";
                }
            }
            $update = $this->common->updateTableData($table = "site_settings", $where = array('id' => '1'), $data = $updateData);
            if ($update == TRUE) {
                $this->session->set_flashdata('success', "Site settings updated successfully.");
            } else {
                $this->session->set_flashdata('error', "Problem occured while updating site settings. Please try again later.");
            }

            // redirect(base_url('settings', 'refresh'));
            // $response = ['status' => "success", 'message' => $_FILES, 'url' => base_url() . "dashboard"];
            // die(json_encode($response, true));
        }

        $data['settings'] = siteSettings($column = "");
        $data['page'] = "settings";
        $data['page_title'] = "Dashboard";
        $data['page_heading'] = "Dashboard";
        $data['js'] = "settings";
        $this->load->view(backendViewFolder() . 'starter', $data, FALSE);
    }

    public function cmsPages($page = NULL)
    {
        switch ($page) {
            case 'add':

                break;
            case 'update':
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    $input = $this->input->get();
                    if (isset($input['page']) && $input['page'] != "") {
                        $cms = [];
                        $where = array('where' => ['name' => strtolower($input['page'])]);
                        $cms_pages = $this->common->getTableData($select = NULL, $table = "cms_pages", $join = array(),  $where, $where_in = array(), $like = array(), $group = array(), $order = array(), $limit = array());
                        if ($cms_pages->num_rows() == "1") {
                            $cms = $cms_pages->row();
                            $data['cms'] = $cms;
                        } else {
                            redirect(base_url('cms/list'), 'refresh');
                        }
                    } else {
                        redirect(base_url('cms/list'), 'refresh');
                    }
                } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $input = $this->input->post();
                    if ($_FILES['cms_banner']['tmp_name'] != "" && $_FILES['cms_banner']['size'] > 0) {
                        $config['upload_path']          = 'assets/' . frontendViewFolder() . '/images/banners/';
                        $config['allowed_types']        = 'gif|jpg|png';
                        $this->load->library('upload', $config);
                        if ($this->upload->do_upload('cms_banner')) {
                            $banner = $this->upload->data('file_name');
                        }
                    }

                    if (isset($banner) && $banner != "") {
                        $cmsData['banner'] = $banner;
                    }
                    $cmsData =
                        array(
                            'name' => url_title($input['cms_title'], '-', TRUE),
                            'title' => $input['cms_title'],
                            'content' => $input['cms_content'],
                            'status' => $input['cms_status'],
                        );
                    $update = $this->common->updateTableData($table = "cms_pages", $where = array('id' => $input['cms_id']), $data = $cmsData);

                    if ($update == TRUE) {
                        $this->session->set_flashdata("success", "Page updated successfully.");
                    } else {
                        $this->session->set_flashdata("error", "Failed to update page data, Please try again later.");
                    }
                    redirect(base_url('cms/list'), 'refresh');
                } else {
                    redirect(base_url('cms/list'), 'refresh');
                }

                break;
            case 'delete':
                break;
            case 'list':
                $data['cms'] = [];
                $cms_pages = $this->common->getTableData($select = NULL, $table = "cms_pages", $join = array(),  $where = array(), $where_in = array(), $like = array(), $group = array(), $order = array(), $limit = array());
                if ($cms_pages->num_rows() > 0) {
                    $cms = $cms_pages->result();
                }
                $data['cms'] = $cms;
                break;
            default:
                show_404();
                // redirect(base_url('cms/list'), 'refresh');
                break;
        }


        $data['module'] = $page;
        $data['page'] = "cms";
        $data['page_heading'] = "CMS Pages Management";
        $data['page_title'] = "CMS Management";
        $data['js'] = "cms";
        $this->load->view(backendViewFolder() . 'starter', $data, FALSE);
    }

    public function dataTableData($data_url = NULL)
    {
        $recordsTotal = $recordsFiltered = [];
        if ($data_url != NULL) {
            /* common */
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $this->security->xss_clean($this->input->post());
                $limit = html_escape($input['length']);
                $start = html_escape($input['start']);
                $orderType = $input['order'][0]['dir'];
                $startDate = (isset($input['start_date']) && $input['start_date'] != "" ? date('Y-m-d', strtotime($_POST['start_date'])) : date('Y-m-01')); //Start Date
                $endDate = (isset($input['end_date']) && $input['end_date'] != "" ? date('Y-m-d', strtotime($_POST['end_date'])) : date('Y-m-d')); //End Date
                $general_search = $input['search']['value'];
            }
            /* common */
            $this->load->library(array('DatatableLibrary' => 'dtl'));
            switch ($data_url) {
                case 'cms-list':
                    $search = [];
                    if ($general_search != "") {
                        $search = [
                            'name' => $general_search,
                            'title' => $general_search,
                        ];
                    }
                    $recordsFiltered = $this->dtl->cms_list(NULL, NULL, $orderType, $search, $startDate, $endDate);
                    $recordsTotal = $this->dtl->cms_list($limit, $start, $orderType, $search, $startDate, $endDate);
                    break;

                default:
                    $recordsTotal = [];
                    break;
            }
        }
        $json_data = array(
            "draw"            => intval($this->input->post('draw')),
            "recordsTotal"    => intval(count($recordsTotal)),
            "recordsFiltered" => intval(count($recordsFiltered)),
            "data"            => $recordsTotal,
        );

        die(json_encode($json_data, TRUE));
    }
}
/* End of file admin.php */
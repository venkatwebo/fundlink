<?php defined('BASEPATH') or exit('No direct script access allowed');

class DatatableLibrary
{

    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model(array("Common_model" => "common"));
    }

    public function searchOptimization($array = array())
    {
        $search['like'] = $search['or_like'] = [];
        $firstElement = true;
        foreach ($array as $key => $val) {
            if ($firstElement == true) {
                $search['like'][$key] = $val;
                $firstElement = false;
            } else {
                $search['or_like'][$key] = $val;
            }
        }

        return $search;
    }

    public function cms_list($limitOff = NULL, $start = NULL, $orderType = "asc", $search = array(), $startDate = NULL, $endDate = NULL)
    {
        $filter = $this->searchOptimization($search);
        $limit = array();
        if ($limitOff != NULL && $start != NULL) {
            $limit = array($limitOff => $start);
        }

        $tableData = [];

        $cms_pages = $this->ci->common->getTableData($select = NULL, $table = "cms_pages", $join = array(),  $where = array(), $where_in = array(), $like = array(), $group = array(), $order = array(), $limit = array());
        if ($cms_pages->num_rows() > 0) {
            $cms = $cms_pages->result();
            foreach ($cms as $key => $pages) {
                $decode["id"] = $pages->id;
                $decode["title"] = $pages->title;
                $decode["banner"] = $pages->banner;
                $decode["last_update"] = date('d M Y h:i', strtotime($pages->updated_at));

                $view_url = "-";
                $buttons = [
                    ['text' => 'Edit', 'url' => base_url('cms/update?page=' . $pages->name)],
                ];
                $btn_icon =  ($pages->status == "1") ? 'icon-eye' : 'icon-eye-off';
                $btn_color =  ($pages->status == "1") ? 'primary' : 'warning';
                $decode["action"] = actionDropdown($buttons, $btn_icon, $btn_color);

                $tableData[] = $decode;
            }
        }

        return $tableData;
    }
}
                                                
/* End of file DatatableLibrary.php */

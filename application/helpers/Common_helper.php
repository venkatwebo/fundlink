<?php

function scriptjs($path = "", $type = "be")
{
    $js = ($path != "") ? base_url('/assets/' . $type . '/js/' . $path) : base_url('/assets/' . $type . '/js/');

    return $js;
}

function scriptcss($path = "", $type = "be")
{
    $css = ($path != "") ? base_url('/assets/' . $type . '/css/' . $path) : base_url('/assets/' . $type . '/css/');

    return $css;
}

function scriptplugins($path = "", $type = "be")
{
    $plugins = ($path != "") ? base_url('/assets/' . $type . '/plugins/' . $path) : base_url('/assets/' . $type . '/plugins/');

    return $plugins;
}

function scriptimages($path = "", $type = "be")
{
    $images = ($path != "") ? base_url('/assets/' . $type . '/images/' . $path) : base_url('/assets/' . $type . '/images/');

    return $images;
}

function scriptfonts($path = "", $type = "be")
{
    $fonts = ($path != "") ? base_url('/assets/' . $type . '/fonts/' . $path) : base_url('/assets/' . $type . '/fonts/');

    return $fonts;
}

function frontendViewFolder()
{
    return "fe/";
}

function backendViewFolder()
{
    return "be/";
}

function siteInfo($type)
{
    $settings = siteSettings($column = "");
    switch ($type) {
        case 'description':
            $content = (isset($settings->meta_description)) ? $settings->meta_description : "";
            break;
        case 'keywords':
            $content = (isset($settings->meta_keywords)) ? $settings->meta_keywords : "";
            break;
        case 'author':
            $content = (isset($settings->meta_author)) ? $settings->meta_author : "";
            break;
        case 'name':
            $content = (isset($settings->name)) ? $settings->name : "";
            break;
        case 'logo':
            $content = (isset($settings->logo)) ? scriptimages('site/' . $settings->logo) : scriptimages('site/logo.png');
            break;
        case 'favicon':
            $content = (isset($settings->favicon)) ? scriptimages('site/' . $settings->favicon) : scriptimages('site/favicon.ico');
            break;
        default:
            $content = "";
            break;
    }

    return $content;
}

function siteSettings($column = "")
{
    $ci = &get_instance();

    $site = $ci->common->getTableData($select = NULL, $table = "site_settings", $join = array(),  $where = array('id' => "1"), $where_in = array(), $like = array(), $group = array(), $order = array(), $limit = array(), $offset = NULL);

    $settings = ($column != "") ? [] : "";
    if ($site->num_rows() == "1") {
        $settings = ($column != "") ? $site->row($column) : $site->row();
    }

    return $settings;
}

function getMenus()
{
    $ci = &get_instance();

    $menu_list = [];
    $nav_menu = $ci->db->query("SELECT * FROM `menu` WHERE `menu_status` = '1';");
    if ($nav_menu->num_rows() > 0) {
        $menulist = $nav_menu->result();
        foreach ($menulist as $key => $ml) {
            $menu_list[$ml->id] = $ml;
        }
        $menu = [];
        foreach ($menu_list as $key => $m) {
            $parent = isset($menu_list[$m->menu_root_id]->menu_name) ? $menu_list[$m->menu_root_id]->menu_name : "";
            $parent_url = isset($menu_list[$m->menu_root_id]->menu_url) ? $menu_list[$m->menu_root_id]->menu_url : "";
            if ($parent != "" && $parent_url != "" && $m->menu_root_id != "0") {
                $menu[$m->menu_root_id]['child'][$m->menu_order_no] = ['name' => $m->menu_name, 'url' => $m->menu_url];
            } else {
                $menu[$m->id] = ['parent' => $m->menu_name, 'parent_url' => $m->menu_url, 'order_id' => $m->menu_order_no];
            }
        }
    }

    return $menu;
}

function getActiveSessions($session_value = "")
{
    $ci = &get_instance();

    return $ci->session->userdata($session_value);
}

if (function_exists('getActiveSessions')) { //authourizeOnlyAdmin
    function authourizeOnlyAdmin()
    {
        $admin_id = getActiveSessions($sessivon_value = "admin_id");
        ($admin_id == "") ? redirect(base_url(), 'refresh') : "";
    }
}

function removeOldImage($file_path)
{
    if (file_exists($file_path)) {
        unlink($file_path);
    }
}

function imageOnTable($img, $alt = "")
{
    if (file_exists($img) == true)
        $image = '<img class="rounded-circle" style="width:50px;" src="' . $img . '" alt="' . $alt . '">';
    else
        $image = emptyImage();

    return $image;
}

function emptyImage()
{
    return '<img class="rounded" style="width:50px;" src="' . scriptimages('null.png') . '" alt="image not found">';
}

function addButtton($text = "", $url = "", $event = "")
{
    $url = ($url != "") ? $url : "javascript:void(0)";
    $event = ($event != "") ? 'onclick="' . $event . '"' : "";
    $add = '<a href="' . $url . '" class="btn btn-primary" ' . $event . '><i class="feather icon-plus"></i>' . $text . '</a>';

    return $add;
}

function statusButtons($type = NULL, $label = NULL, $url = NULL, $event = "")
{
    $url = ($url != "") ? $url : "javascript:void(0)";
    $event = ($event != "") ? 'onclick="' . $event . '"' : "";
    if ($type == "active") {
        $button = '<a href="' . $url . '" class="label theme-bg f-12 f-w-400 text-white" ' . $event . '>' . $label . '</a>';
    } elseif ($type == "inactive") {
        $button = '<a href="' . $url . '" class="label theme-bg2 f-12 f-w-400 text-white" ' . $event . 's>' . $label . '</a>';
    } else {
        $button = "";
    }

    return $button;
}

function actionDropdown($buttons = array())
{
    $button = '<div class="btn-group mb-2 mr-2">
                <button class="btn drp-icon btn-rounded btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                    <div class="dropdown-menu" x-placement="top-start" style="position: absolute; transform: translate3d(0px, -151px, 0px); top: 0px; left: 0px; will-change: transform;">';
    foreach ($buttons as $b) {
        $href = (isset($b['url']) && $b['url'] != "") ? $b['url'] : "javascript:void(0)";
        $text = (isset($b['text']) && $b['text'] != "") ? $b['text'] : "";
        $event = (isset($b['event']) && $b['event'] != "") ? 'onclick="' . $b['event'] . '"' : "";
        $extra = (isset($b['v']) && $b['extra'] != "") ? $b['extra'] : "";
        $button .= '<a class="dropdown-item" href="' . $href . '" ' . $event . ' ' . $extra . '>' . $text  . '</a>';
    }
    $button .= '    </div>
                </div>';

    return $button;
}

function generateHTMLTable()
{
    $ci = &get_instance();

    $ci->load->library('table');
    $template = array(
        'table_open'            => '<table border="0" cellpadding="4" cellspacing="0" class="table table-responsive">',

        'thead_open'            => '<thead>',
        'thead_close'           => '</thead>',

        'heading_row_start'     => '<tr>',
        'heading_row_end'       => '</tr>',
        'heading_cell_start'    => '<th>',
        'heading_cell_end'      => '</th>',

        'tbody_open'            => '<tbody>',
        'tbody_close'           => '</tbody>',

        'row_start'             => '<tr>',
        'row_end'               => '</tr>',
        'cell_start'            => '<td>',
        'cell_end'              => '</td>',

        'row_alt_start'         => '<tr>',
        'row_alt_end'           => '</tr>',
        'cell_alt_start'        => '<td style=" white-space: break-spaces;">',
        'cell_alt_end'          => '</td>',

        'table_close'           => '</table>'
    );

    $ci->table->set_template($template);
}
/* End of file common.php */

<?php defined('BASEPATH') or exit('No direct script access allowed');

class Calendar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->table         = 'calendar';
        $this->load->model('Globalmodel', 'modeldb');
    }

    public function index()
    {
        $data_calendar = $this->modeldb->get_list($this->table);
        $calendar = array();
        foreach ($data_calendar as $key => $val) {
            $calendar[] = array(
                'id'     => intval($val->id),
                'title' => $val->title,

                'start' => date_format(date_create($val->start_date), "Y-m-d H:i:s"),
                'end'     => date_format(date_create($val->end_date), "Y-m-d H:i:s"),
                'color' => $val->color,
            );
        }

        $data = array();
        $data['get_data']            = json_encode($calendar);
        $d['judul'] = "Data";
        $this->load->view('guru/top_guru', $d);
        $this->load->view('guru/menu_guru');
        $this->load->view('guru/calendar', $data);
        $this->load->view('guru/bottom_guru');
    }
}

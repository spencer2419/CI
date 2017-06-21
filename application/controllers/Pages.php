<?php
/**
 * Created by PhpStorm.
 * User: Spencer
 * Date: 2017/5/24
 * Time: 下午 02:43
 */
class Pages extends CI_Controller {

    public function view($page = 'home')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
		
		//日曆
$prefs['template'] = array(
        'table_open'           => '<table class="calendar">',
        'cal_cell_start'       => '<td class="day">',
        'cal_cell_start_today' => '<td class="today">'
);

$this->load->library('calendar', $prefs);

echo $this->calendar->generate();
		
		
    }
}
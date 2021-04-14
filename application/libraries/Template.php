<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template
{
    private $data;
    private $js_file;
    private $css_file;
    private $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        //$this->CI->load->helper('url');

        // default CSS and JS that they must be load in any pages

        //$this->addJS( base_url('assets/js/jquery-1.7.1.min.js') );
        //$this->addCSS( base_url('assets/css/semantic.min.css') );


    }

    public function layout( $folder=false, $page=false, $res=null )
    {
        /*print '<pre>';
        print_r($data);
        print '</pre>';*/
        if ( $folder )
        {
            $folder=$folder.'/';
            $basepathstr= 'application/views/'.$folder;
        }
        else
        {
            $basepathstr= 'application/views/';   
        }

        if ( ! file_exists($basepathstr.$page.'.php' ) )
        {
            show_404();
        }
        else
        {
            //$this->data['content'] = '';
            
            //$this->init_menu();
            $menu='';
            if(!$folder){
                $condcont=array(
                        'menu_status' => '1',
                        'menu_deleted' => '0',
                        'menu_pid' => '0'
                    );
                $menu=$this->CI->generic_model->get_record('menu',$condcont);
            }

            $data['menu']=$this->getMenu($menu);
            $data['contact_data'] = $this->CI->generic_model->get_record('contact');
            /*echo html_entity_decode($data['menu']);

            exit();*/
            /*print '---mmmmmmmmmmmm<pre>';

            print_r($menu);
            print '</pre>----';
            exit();*/

            $fmenu='';
            if(!$folder){
                $condcont=array(
                        'fmenu_status' => '1',
                        'fmenu_deleted' => '0',
                        'fmenu_pid' => '0'
                    );
                $fmenu=$this->CI->generic_model->get_record('fmenu',$condcont);
            }

            $data['fmenu']=$this->getFMenu($fmenu);
            $data['contact_data'] = $this->CI->generic_model->get_record('contact');

            $condtenth=array(
                    'home_content_details_cid' => '10',
                    'home_content_details_section' => '10'
                );
            $data['home_tenth_section_data'] = $this->CI->generic_model->get_record('home_content_details',$condtenth);
            //echo $this->CI->db->last_query();

            $condnotifyapp=array(
                    'notification.notification_read' => '0',
                    'appointment.appointment_type' => 'A'
                );
            $data['notify_data_appointment'] = $this->CI->generic_model->get_notify_record($condnotifyapp);

            $condnotifycon=array(
                    'notification.notification_read' => '0',
                    'appointment.appointment_type' => 'C'
                );
            $data['notify_data_contact'] = $this->CI->generic_model->get_notify_record($condnotifycon);



            $this->CI->load->view($folder.'utility/header.php', $data);
            if($folder){
                $this->CI->load->view($folder.'utility/sidebar.php', $res);
            }
            $this->CI->load->view($folder.$page.'.php', $res);
            $this->CI->load->view($folder.'utility/footer.php', $data);
        }
    }

    public function getMenu($menu=false){
        if($menu){
            //echo 'abc1';
            $menutemplete='';
            $menutemplete.='<div class="collapse navbar-collapse" id="navbarsExample05">';
            $menutemplete.='<ul class="navbar-nav ml-auto">';
            
            foreach ($menu as $key => $value) {
                /*print '<br>kkkParent menu: <pre>';
                print_r($value['menu_title']);
                echo html_entity_decode($menutemplete);*/
                //echo 'abc2';
                //Checking if the parent menu has any child

                $condgetchild=array(
                        'menu_status' => '1',
                        'menu_deleted' => '0',
                        'menu_pid' => $value['menu_id']
                    );
                $getchild=$this->CI->generic_model->get_record('menu',$condgetchild);

                /*print '---Child menu: <pre>';
            print_r($getchild);
            print '</pre>----';*/
            //exit();

                if($getchild != ''){
                    //echo 'abc3';
                    $menutemplete.='<li class="nav-item dropdown">';
                    $menutemplete.='<a class="nav-link dropdown-toggle" ';
                    $menutemplete.='href="'.BASE_URL.$value['menu_link'].'"';
                    $menutemplete.='data-toggle="dropdown" aria-haspopup="true"';
                    $menutemplete.='aria-expanded="false">'.$value['menu_title'].'</a>';
                    //echo html_entity_decode($menutemplete);
                    //print 'gdfgdgd';
                    //echo html_entity_decode($menutemplete);
                    /*if(empty($menutemplete)){
                        echo "empty";
                    }else{
                        echo "not empty";
                    }*/
                    $childmenu=$this->getChildMenu($getchild,$value['menu_id'],$value['menu_title'],$value['menu_link'],'',0);
                    $menutemplete.=$childmenu;
                    $menutemplete.='</li>';
                }else{
                    //echo 'abc4';
                    $menutemplete.='<li class="nav-item">';
                    $menutemplete.='<a class="nav-link" href="'.BASE_URL.$value['menu_link'].'">'.$value['menu_title'].'</a>';
                    $menutemplete.='</li>';
                    

                }
                
            }
            $menutemplete.='</ul>';
            $menutemplete.='</div>';
            /*echo html_entity_decode($menutemplete);*/

            //echo html_entity_decode($temp);
            return $menutemplete;

        }
    }

    public function getChildMenu($childmenu=false,$pid=false,$menutitle=false,$menulink=false,$menutempletec='',$margin=0){
        if($childmenu){
            //echo 'abc5';
            
            if(empty($menutempletec)){
                $menutempletec='<ul class="dropdown-menu" style="margin-left:'.$margin.'%">';
            }
            
            foreach ($childmenu as $key => $value) {
                /*print '<br>---Each child menu: <pre>+';
            print_r($value['menu_title']);
            print '</pre>+----';*/
                //echo 'abc6';
                
                //Checking if the parent menu has any child
                $condgetchildc=array(
                        'menu_status' => '1',
                        'menu_pid' => $value['menu_id']
                    );
                $getchildc=$this->CI->generic_model->get_record('menu',$condgetchildc);
                /*print '<br>---Each child sub: <pre>';
            print_r($getchildc);
            print '</pre>----';*/

                if($getchildc != ''){
                    /*echo 'khjh----'.count($getchildc);
                    print '<br>---mmmmllllEach child menu: <pre>++';
            print_r($getchildc);
            print '</pre>mmmm++----';
            echo html_entity_decode($menutempletec);*/

                    /*$menutempletec.='<li class="nav-item dropdown">';
                    $menutempletec.='<a class="nav-link dropdown-toggle" href="khjhkjhkh">'.$value['menu_title'].'</a>';*/


                    $menutempletec.='<li class="nav-item dropdown">';
                    $menutempletec.='<a class="nav-link dropdown-toggle" ';
                    $menutempletec.='href="'.BASE_URL.$value['menu_link'].'"';
                    $menutempletec.='data-toggle="dropdown" aria-haspopup="true"';
                    $menutempletec.='aria-expanded="false">'.$value['menu_title'].'</a>';


                    $margin+=20;
                    $childmenuc=$this->getChildMenu($getchildc,$value['menu_id'],$value['menu_title'],$value['menu_link'],'',$margin);
                    $menutempletec.=$childmenuc;
                    $menutempletec.='</li>';
                }else{
                    /*print '<br>--nnn-Each child menu: <pre>++';
            print_r($value['menu_title']);
            print '</pre>++----';*/
                    $menutempletec.='<li class="nav-item">';
                    $menutempletec.='<a class="nav-link" href="'.BASE_URL.$value['menu_link'].'">'.$value['menu_title'].'</a>';
                    $menutempletec.='</li>';

                    
                }
                
             
            

            }
            $menutempletec.='</ul>';
            //echo html_entity_decode($temp);
            /*print '<br>---Each child menu: <pre>++';
            print_r($menutempletec);
            print '</pre>++----';*/

            return $menutempletec;
        }

    }


    //footer end
    public function getFMenu($menu=false){
        if($menu){
            //echo 'abc1';
            $menutemplete='';
            
            
            foreach ($menu as $key => $value) {
                /*print '<br>kkkParent menu: <pre>';
                print_r($value['menu_title']);
                echo html_entity_decode($menutemplete);*/
                //echo 'abc2';
                //Checking if the parent menu has any child

                $condgetchild=array(
                        'fmenu_status' => '1',
                        'fmenu_deleted' => '0',
                        'fmenu_pid' => $value['fmenu_id']
                    );
                $getchild=$this->CI->generic_model->get_record('fmenu',$condgetchild);

                /*print '---Child menu: <pre>';
            print_r($getchild);
            print '</pre>----';*/
            //exit();

                if($getchild != ''){
                    //echo 'abc3';
                    $menutemplete.='<div class="col-md-3 mb-5">';
                    $menutemplete.='<h3>'.$value['fmenu_title'].'</h3>';
                    
                    //echo html_entity_decode($menutemplete);
                    //print 'gdfgdgd';
                    //echo html_entity_decode($menutemplete);
                    /*if(empty($menutemplete)){
                        echo "empty";
                    }else{
                        echo "not empty";
                    }*/
                    $childmenu=$this->getChildFMenu($getchild,$value['fmenu_id'],$value['fmenu_title'],$value['fmenu_link'],'',0);
                    $menutemplete.=$childmenu;
                    $menutemplete.='</div>';
                }else{
                    //echo 'abc4';
                    $menutemplete.='<div class="col-md-3 mb-5">';
                    $menutemplete.='<h3><a href="'.base_url().$value['fmenu_link'].'">'.$value['fmenu_title'].'</a></h3>';
                    $menutemplete.='</div>';
                }
                
            }
            
            /*echo html_entity_decode($menutemplete);*/

            //echo html_entity_decode($temp);
            return $menutemplete;

        }
    }

    public function getChildFMenu($childmenu=false,$pid=false,$menutitle=false,$menulink=false,$menutempletec='',$margin=0){
        if($childmenu){
            //echo 'abc5';
            
            if(empty($menutempletec)){
                $menutempletec='<ul class="footer-link list-unstyled" style="margin-left:'.$margin.'%">';
            }
            
            foreach ($childmenu as $key => $value) {
                /*print '<br>---Each child menu: <pre>+';
            print_r($value['menu_title']);
            print '</pre>+----';*/
                //echo 'abc6';
                
                //Checking if the parent menu has any child
                $condgetchildc=array(
                        'fmenu_status' => '1',
                        'fmenu_pid' => $value['fmenu_id']
                    );
                $getchildc=$this->CI->generic_model->get_record('fmenu',$condgetchildc);
                /*print '<br>---Each child sub: <pre>';
            print_r($getchildc);
            print '</pre>----';*/

                if($getchildc != ''){
                    /*echo 'khjh----'.count($getchildc);
                    print '<br>---mmmmllllEach child menu: <pre>++';
            print_r($getchildc);
            print '</pre>mmmm++----';
            echo html_entity_decode($menutempletec);*/

                    /*$menutempletec.='<li class="nav-item dropdown">';
                    $menutempletec.='<a class="nav-link dropdown-toggle" href="khjhkjhkh">'.$value['menu_title'].'</a>';*/


                    $menutempletec.='<li><a href="'.$value['fmenu_link'].'">'.$value['fmenu_title'].'</a></li>';
                    
                    $margin+=20;
                    $childmenuc=$this->getChildFMenu($getchildc,$value['fmenu_id'],$value['fmenu_title'],$value['fmenu_link'],'',$margin);
                    $menutempletec.=$childmenuc;
                    //$menutempletec.='</li>';
                }else{
                    /*print '<br>--nnn-Each child menu: <pre>++';
            print_r($value['menu_title']);
            print '</pre>++----';*/
                    $menutempletec.='<li><a href="'.$value['fmenu_link'].'">'.$value['fmenu_title'].'</a></li>';
                    
                }

            }
            $menutempletec.='</ul>';
            //echo html_entity_decode($temp);
            /*print '<br>---Each child menu: <pre>++';
            print_r($menutempletec);
            print '</pre>++----';*/

            return $menutempletec;
        }

    }

    public function show( $folder, $page, $data=null, $menu=true )
    {
        if ( ! file_exists('application/views/'.$folder.'/'.$page.'.php' ) )
        {
            show_404();
        }
        else
        {
            $this->data['page_var'] = $data;
            $this->load_JS_and_css();
            $this->init_menu();

            if ($menu)
                $this->data['content'] = $this->CI->load->view('template/menu.php', $this->data, true);
            else
                $this->data['content'] = '';

            $this->data['content'] .= $this->CI->load->view($folder.'/'.$page.'.php', $this->data, true);
            $this->CI->load->view('template.php', $this->data);
        }
    }

    public function addJS( $name )
    {
        $js = new stdClass();
        $js->file = $name;
        $this->js_file[] = $js;
    }

    public function addCSS( $name )
    {
        $css = new stdClass();
        $css->file = $name;
        $this->css_file[] = $css;
    }

    private function load_JS_and_css()
    {
        $this->data['html_head'] = '';

        if ( $this->css_file )
        {
            foreach( $this->css_file as $css )
            {
                $this->data['html_head'] .= "<link rel='stylesheet' type='text/css' href=".$css->file.">". "\n";
            }
        }

        if ( $this->js_file )
        {
            foreach( $this->js_file as $js )
            {
                $this->data['html_head'] .= "<script type='text/javascript' src=".$js->file."></script>". "\n";
            }
        }
    }

    private function init_menu()
    {        
      // your code to init menus
      // it's a sample code you can init some other part of your page
    }
}

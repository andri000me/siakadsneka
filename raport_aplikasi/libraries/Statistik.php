<?php (! defined('BASEPATH')) and exit('No direct script access allowed');

/**
 * CodeIgniter Statistik Libraly
 *
 * @package Codeigniter
 * @author  Ofani Dariyan <ofanidariyan@hotmail.com>
 * @date 09 Nobember 2016
 */
class Statistik
{
   
   
    function __construct() {
        $this->ci = &get_instance();
    }


    public function tambah_statistik() {

        if ($this->ambildata() == FALSE) {

            $data = array(
            'statistik_ipaddress' => $this->ambilIP(),
            'statistik_date' => date("Y-m-d"),
            'statistik_login' => 1,
            );

            $this->ci->db->insert('raport_statistik', $data);

        } else {
            $this->ci->db->set('statistik_login', 'statistik_login+1', FALSE);
            $this->ci->db->where('statistik_date=CURDATE()');
            $this->ci->db->where('statistik_ipaddress', $this->ambilIP());
            $this->ci->db->update('raport_statistik');

        }
    }

    public function tampil_statistik() {
        /*$query = $this->ci->db->query("SELECT data_tahun as TAHUN, IFNULL(JUMLAH,0) as JUMLAH

                FROM (SELECT data_tahun FROM (SELECT CONCAT('01-', YEAR(NOW())) as data_tahun UNION SELECT CONCAT('02-', YEAR(NOW())) UNION SELECT CONCAT('03-', YEAR(NOW())) UNION SELECT CONCAT('04-', YEAR(NOW())) UNION SELECT CONCAT('05-', YEAR(NOW())) UNION SELECT CONCAT('06-', YEAR(NOW())) UNION SELECT CONCAT('07-', YEAR(NOW())) UNION SELECT CONCAT('08-', YEAR(NOW())) UNION SELECT CONCAT('09-', YEAR(NOW())) UNION SELECT CONCAT('10-', YEAR(NOW())) UNION SELECT CONCAT('11-', YEAR(NOW())) UNION SELECT CONCAT('12-', YEAR(NOW())) ) data_tahun) as TABEL_TAHUNDATA 


                LEFT JOIN (SELECT sum(`statistik_login`) as JUMLAH, CONCAT(MONTH(`statistik_date`),'-', YEAR(`statistik_date`)) as TAHUN_SEKARANG FROM raport_statistik WHERE YEAR(`statistik_date`)=DATE_FORMAT(NOW(),'%Y') GROUP BY MONTH(`statistik_date`),YEAR(`statistik_date`) ORDER BY MONTH(`statistik_date`) ASC ) TABEL_TAHUNDATA2 

                ON TABEL_TAHUNDATA.data_tahun = TABEL_TAHUNDATA2.TAHUN_SEKARANG ORDER BY data_tahun ASC");
                */
            // TAMPILAN PERTAHUN 
            /*
            $query = $this->ci->db->query("SELECT data_tahun as TAHUN, IFNULL(JUMLAH,0) as JUMLAH 

                    FROM (SELECT data_tahun FROM (SELECT CONCAT('01-', DATE_FORMAT(NOW(), '%y')) as data_tahun UNION SELECT CONCAT('02-', DATE_FORMAT(NOW(), '%y')) UNION SELECT CONCAT('03-', DATE_FORMAT(NOW(), '%y')) UNION SELECT CONCAT('04-', DATE_FORMAT(NOW(), '%y')) UNION SELECT CONCAT('05-', DATE_FORMAT(NOW(), '%y')) UNION SELECT CONCAT('06-', DATE_FORMAT(NOW(), '%y')) UNION SELECT CONCAT('07-', DATE_FORMAT(NOW(), '%y')) UNION SELECT CONCAT('08-', DATE_FORMAT(NOW(), '%y')) UNION SELECT CONCAT('09-', DATE_FORMAT(NOW(), '%y')) UNION SELECT CONCAT('10-', DATE_FORMAT(NOW(), '%y')) UNION SELECT CONCAT('11-', DATE_FORMAT(NOW(), '%y')) UNION SELECT CONCAT('12-', DATE_FORMAT(NOW(), '%y')) ) data_tahun) as TABEL_TAHUNDATA 


                    LEFT JOIN (SELECT sum(`statistik_login`) as JUMLAH,DATE_FORMAT(`statistik_date`,'%m-%y')as TAHUN_SEKARANG FROM raport_statistik WHERE YEAR(`statistik_date`)=DATE_FORMAT(NOW(),'%Y') GROUP BY MONTH(`statistik_date`),YEAR(`statistik_date`) ORDER BY MONTH(`statistik_date`) ASC ) TABEL_TAHUNDATA2 

                    ON TABEL_TAHUNDATA.data_tahun = TABEL_TAHUNDATA2.TAHUN_SEKARANG ORDER BY data_tahun ASC");
                */

        //TAMPILAN PERBULAN SEMUA STATISTIK TERPENUHI
         $query = $this->ci->db->query("SELECT data_tahun as TAHUN, IFNULL(JUMLAH,0) as JUMLAH 

                    FROM (SELECT  DATE_FORMAT(data_tahun, '%m-%y') as data_tahun FROM (SELECT DATE(data_tahun) as data_tahun FROM (SELECT DATE_FORMAT(CONCAT(DATE_FORMAT(NOW(), '%Y'),'-01-', '10'), '%y-%m-%d') as data_tahun 

                    UNION SELECT DATE_FORMAT(CONCAT(DATE_FORMAT(NOW(), '%Y'),'-02-', '10'), '%y-%m-%d') 
                    UNION SELECT DATE_FORMAT(CONCAT(DATE_FORMAT(NOW(), '%Y'),'-03-', '10'), '%y-%m-%d') 
                    UNION SELECT DATE_FORMAT(CONCAT(DATE_FORMAT(NOW(), '%Y'),'-04-', '10'), '%y-%m-%d') 
                    UNION SELECT DATE_FORMAT(CONCAT(DATE_FORMAT(NOW(), '%Y'),'-05-', '10'), '%y-%m-%d') 
                    UNION SELECT DATE_FORMAT(CONCAT(DATE_FORMAT(NOW(), '%Y'),'-06-', '10'), '%y-%m-%d')
                    UNION SELECT DATE_FORMAT(CONCAT(DATE_FORMAT(NOW(), '%Y'),'-07-', '10'), '%y-%m-%d') 
                    UNION SELECT DATE_FORMAT(CONCAT(DATE_FORMAT(NOW(), '%Y'),'-08-', '10'), '%y-%m-%d')
                    UNION SELECT DATE_FORMAT(CONCAT(DATE_FORMAT(NOW(), '%Y'),'-09-', '10'), '%y-%m-%d')
                    UNION SELECT DATE_FORMAT(CONCAT(DATE_FORMAT(NOW(), '%Y'),'-10-', '10'), '%y-%m-%d')
                    UNION SELECT DATE_FORMAT(CONCAT(DATE_FORMAT(NOW(), '%Y'),'-11-', '10'), '%y-%m-%d')
                    UNION SELECT DATE_FORMAT(CONCAT(DATE_FORMAT(NOW(), '%Y'),'-12-', '10'), '%y-%m-%d')


                    UNION SELECT DATE_FORMAT(CONCAT( (DATE_FORMAT(NOW(), '%Y')-1) ,'-01-', '10'), '%y-%m-%d')
                    UNION SELECT DATE_FORMAT(CONCAT( (DATE_FORMAT(NOW(), '%Y')-1) ,'-02-', '10'), '%y-%m-%d')
                    UNION SELECT DATE_FORMAT(CONCAT( (DATE_FORMAT(NOW(), '%Y')-1) ,'-03-', '10'), '%y-%m-%d')
                    UNION SELECT DATE_FORMAT(CONCAT( (DATE_FORMAT(NOW(), '%Y')-1) ,'-04-', '10'), '%y-%m-%d')
                    UNION SELECT DATE_FORMAT(CONCAT( (DATE_FORMAT(NOW(), '%Y')-1) ,'-05-', '10'), '%y-%m-%d')
                    UNION SELECT DATE_FORMAT(CONCAT( (DATE_FORMAT(NOW(), '%Y')-1) ,'-06-', '10'), '%y-%m-%d')
                    UNION SELECT DATE_FORMAT(CONCAT( (DATE_FORMAT(NOW(), '%Y')-1) ,'-07-', '10'), '%y-%m-%d')
                    UNION SELECT DATE_FORMAT(CONCAT( (DATE_FORMAT(NOW(), '%Y')-1) ,'-08-', '10'), '%y-%m-%d')
                    UNION SELECT DATE_FORMAT(CONCAT( (DATE_FORMAT(NOW(), '%Y')-1) ,'-09-', '10'), '%y-%m-%d')
                    UNION SELECT DATE_FORMAT(CONCAT( (DATE_FORMAT(NOW(), '%Y')-1) ,'-10-', '10'), '%y-%m-%d')
                    UNION SELECT DATE_FORMAT(CONCAT( (DATE_FORMAT(NOW(), '%Y')-1) ,'-11-', '10'), '%y-%m-%d')
                    UNION SELECT DATE_FORMAT(CONCAT( (DATE_FORMAT(NOW(), '%Y')-1) ,'-12-', '10'), '%y-%m-%d')


                    ) data_tahun WHERE data_tahun BETWEEN DATE_FORMAT(CONCAT( (DATE_FORMAT(NOW(), '%Y')-1) ,'-0', (EXTRACT(MONTH FROM NOW()) +1),'-', '10'), '%y-%m-%d') AND DATE_FORMAT(CONCAT(DATE_FORMAT(NOW(), '%Y') ,'-0', EXTRACT(MONTH FROM NOW()),'-', '10'), '%y-%m-%d') ORDER BY data_tahun ASC ) as data_tahun) as TABEL_TAHUNDATA 


                    LEFT JOIN (SELECT sum(`statistik_login`) as JUMLAH,DATE_FORMAT(`statistik_date`,'%m-%y')as TAHUN_SEKARANG FROM raport_statistik WHERE YEAR(`statistik_date`) BETWEEN (DATE_FORMAT(NOW(),'%Y')-1) AND  DATE_FORMAT(NOW(),'%Y') GROUP BY MONTH(`statistik_date`),YEAR(`statistik_date`) ORDER BY MONTH(`statistik_date`) ASC) TABEL_TAHUNDATA2 

                    ON TABEL_TAHUNDATA.data_tahun = TABEL_TAHUNDATA2.TAHUN_SEKARANG ");


        $data_statistik = '';

        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                  $data_statistik  .=  '["'. $row->TAHUN. '", ' .$row->JUMLAH. '],';
            }

            
             return $data_statistik;
           
        } else {

         return '[0, 0]';

        }

    }
   
    private function ambildata() {


        $query = $this->ci->db->query('SELECT DISTINCT(statistik_ipaddress) FROM raport_statistik WHERE statistik_date=CURDATE() AND statistik_ipaddress="'.$this->ambilIP().'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         return TRUE;
           
        } else {

         return FALSE;
        }

    
    }

    private function ambilIP() {
        if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        elseif(isset($_SERVER['REMOTE_ADDR'])) $ip = $_SERVER['REMOTE_ADDR'];
        else $ip = "0";
        return $ip;
    }

    /*
    private function cek_statistiklogin() {
        $query = $this->db->query('SELECT statistik_login FROM raport_statistik WHERE statistik_date=CURDATE() AND statistik_ipaddress="'.$this->ambilIP().'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         return $row->statistik_login;
           
        } else {

         return 0;
        }
    }
    */
    
    

   
}

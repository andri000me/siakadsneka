<?php

function add_meta_title ($string)
{	
	$CI =& get_instance();
	$CI->data['meta_title'] = e($string) . ' - ' . $CI->data['meta_title'];
	
}

function btn_edit ($uri)
{
	return anchor($uri, '<button class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></button>');
}
function btn_kirim ($uri)
{
	return anchor($uri, '<button class="btn btn-mini btn-info"><i class="icon-envelope  bigger-120"></i></button>');
}

function btn_delete ($uri)
{
	return anchor($uri, '<button class="btn btn-mini btn-danger"><i class="icon-trash bigger-120"></i></button>', array(
		'onclick' => "return confirm('You are about to delete a record. This cannot be undone. Are you sure?');"
	));
}


function btn_download ($uri)
{
	return anchor($uri, '<button class="btn btn-info btn-small"><i class="icon-download"></i> Download</button>',array(
		'target' => "_blank"
	));
}

function btn_yes ($uri)
{
	return anchor($uri, '<button class="btn btn-mini btn-warning"><i class="icon-ok"></i> Yes</button>', array(
			'onclick' => "return confirm('Artikel ini akan terconfig  No Publish (hidden), Apakah anda yakin ?');"
	));
}

function btn_no ($uri)
{
	return anchor($uri, '<button class="btn btn-mini btn-danger"><i class="icon-remove"></i> No</button>', array(
			'onclick' => "return confirm('Artikel ini akan terconfig untuk Publish (tampil), Apakah anda yakin ?');"
	));
}

function btn_belumdaftar($uri)
{
	return anchor($uri, '<button class="btn btn-mini btn-default"><i class="icon-circle"></i> Menunggu <i class="icon-lock"></i></button>', array(
			'onclick' => "alert('Anda tidak dapat mengubah data menjadi TERPROSES, Karena user belum mendaftar Pekerjaan !!!');"
	));
}

function btn_activeconfirm($uri)
{
	return anchor($uri, '	<button class="btn btn-mini btn-success"><i class="icon-ok"></i>Active</button>		', array(
			'onclick' => "return confirm('Status konfirmasi akun akan menjadi TIDAK AKTIF, Apakah anda yakin ?');"
	));
}

function btn_notactiveconfirm($uri)
{
	return anchor($uri, '<button class="btn btn-mini btn-danger"><i class="icon-remove"></i>Not Active</button>', array(
			'onclick' => "return confirm('Status konfirmasi akun akan menjadi AKTIF, Apakah anda yakin ?');"
	));
}

function btn_akuntidakaktif($uri)
{
	return anchor($uri, '<button class="btn btn-mini btn-danger"><i class="icon-lock"></i>Full Locked</button>', array(
			'onclick' => "alert('Anda tidak dapat mengubah data menjadi AKTIF, Karena user belum memverifikasi akun !!!');"
	));
}

function btn_studikasusaktif($uri)
{
	return anchor($uri, '<button class="btn btn-mini btn-warning"><i class="icon-ok"></i>Active</button>', array(
			'onclick' => "return confirm('Informasi Studi Kasus akan TERKUNCI, Apakah anda yakin ?');"
	));
}

function btn_studikasustidakaktif($uri)
{
	return anchor($uri, '<button class="btn btn-mini btn-default"> <i class="icon-lock"></i>Locked</button>', array(
			'onclick' => "return confirm('Informasi Studi Kasus akan AKTIF, Apakah anda yakin ?');"
	));
}

function btn_not_confirm($uri)
{
	return anchor($uri, '<button class="btn btn-mini btn-default"><i class="icon-circle"></i> Menunggu <i class="icon-lock"></i></button>', array(
			'onclick' => "return confirm('Informasi data pencari kerja akan menjadi TERPROSES, Apakah anda yakin ?');"
	));
}

function btn_proses($uri)
{
	return anchor($uri, '<button class="btn btn-mini btn-primary"><i class="icon-refresh"></i> Proses Seleksi </button>', array(
			'onclick' => "return confirm('Informasi data pencari kerja akan menjadi DITERIMA/LOLOS SELEKSI, Apakah anda yakin ?');"
	));
}
function btn_diterima($uri)
{
	return anchor($uri, '<button class="btn btn-mini btn-success"><i class="icon-ok"></i> Diterima <i class="icon-unlock"></i></button>', array(
			'onclick' => "return confirm('Informasi data pencari kerja akan menjadi BELUM DITERIMA/TIDAK LOLOS SELEKSI, Apakah anda yakin ?');"
	));
}

function btn_belumditerima($uri)
{
	return anchor($uri, '<button class="btn btn-mini btn-danger"><i class="icon-remove"></i> Belum Lolos <i class="icon-unlock"></i></button>', array(
			'onclick' => "return confirm('Informasi data pencari kerja akan menjadi belum terserap (menunggu), Apakah anda yakin ?');"
	));
}

function btn_draft()
{
	return anchor('<button class="btn btn-mini btn-danger disabled"><i class="icon-remove"></i> Draft <i class="icon-lock"></i></button>');
}
function btn_terkirim()
{
	return anchor('<button class="btn btn-mini btn-warning disabled"><i class="icon-ok"></i> Terkirim <i class="icon-unlock"></i></button>');
}

function btn_accept($uri)
{
	return anchor($uri, '<button class="btn btn-mini btn-warning"><i class="icon-ok"></i> Accept <i class="icon-unlock"></i></button>', array(
			'onclick' => "return confirm('Informasi data peserta akan menjadi pending (belum terverifikasi), Apakah anda yakin ?');"
	));
}

function btn_pending ($uri)
{
	return anchor($uri, '<button class="btn btn-mini btn-danger"><i class="icon-remove"></i> Pending <i class="icon-lock"></i></button>', array(
			'onclick' => "return confirm('Informasi data peserta akan menjad Accept (Diterima), Apakah anda yakin ?');"
	));
}

function btn_view ($uri)
{
	return anchor($uri, '<button class="btn btn-mini btn-warning"><i class="icon-zoom-in bigger-120"></i></button>', 'target="_blank"');
}

function btn_lihatdata ($uri)
{
	return anchor($uri, '<button class="btn btn-mini btn-w"><i class="icon-zoom-in bigger-120"></i></button>');

}



function article_link($article){
	return 'article/' . intval($article->id) . '/' . e($article->slug);
}

function lowongan_link($lowongan){
	return 'lowongan/' . intval($lowongan->id);
}

function article_links($articles){
	$string = '<ul>';
	foreach ($articles as $article) {
		$url = article_link($article);
		$string .= '<li>';
		$string .= '<h3>' . anchor($url, e($article->title)) .  ' ›</h3>';
		$string .= '<p class="pubdate">' . e($article->pubdate) . '</p>';
		$string .= '</li>';
	}
	$string .= '</ul>';
	return $string;
}

function article_pengumuman($pengumuman){
	
	$string = '<ul class="block-list">';
	foreach ($pengumuman as $ofanidata) {
		$url = article_link($ofanidata);
		$string .= '<li><a href="#"'  . anchor($url, e($ofanidata->title)) .  '</a></li>';
		$string .= '<span style="margin-left: 15px;color:white;display:block;font-size:10px; padding-bottom:4px;border-bottom:1px solid #eee;margin-bottom:7px;">' . e($ofanidata->created) . '</span>';
		
	}
	$string .= '</ul>';
	return $string;
}


function get_excerpt($article, $numwords = 50){
	$string = '';
	$url = article_link($article);
	$string .= '<h3>' . anchor($url, e($article->title)) .  '</h3>';
	$string .= '<div class="date">'. e($article->created) .'<span style="color: #bdc3c7;margin-left: 10px;"><i class="icon icon-beaker" style="margin-left:2px;margin-right: 5px;opacity:0.4;"></i>'.e($article->category).'</span></div>';
	$string .= '<div class="post"><p>'. e(limit_to_numwords(strip_tags($article->body), $numwords)) .'</p></div>';
	
	return $string;
	
	
}

function get_dataarticle($article, $numwords = 25){
	$string = '';
	$url = article_link($article);
	$string .= '<h3>' . anchor($url, e($article->title)) .  '</h3>';
	$string .= '<div class="date">'. e($article->created) .'<span style="color: #bdc3c7;margin-left: 10px;"><i class="icon icon-user" style="margin-left:2px;margin-right: 5px;opacity:0.4;"></i>'.e($article->author).'</span></div>';
	$string .= '<div class="post"><p>'. e(limit_to_numwords(strip_tags($article->body), $numwords)) .'</p></div>';

	return $string;
}


function get_dataartikel($article, $numwords = 15){
	$string = '';
	$url = article_link($article);
	$string .= '<div class="blog-post animate-onscroll">';
										
	$string .='<div class="post-image"><img src="'.site_url('').'cosmide/admin/artikel/thumbnails/'.e($article->image).'" alt=""></div>';
	$string .= '<h4 class="post-title">'. anchor($url, e($article->title)) .'</h4>';
	$string .= '<div class="post-meta">';
	$string .= '<span>by <a href="#">'.e($article->author).'</a></span><br>';
	$string .= '<span>'. e($article->created) .'</span>';
	$string .= '</div>';
	$string .= '<p>'. e(limit_to_numwords(strip_tags($article->body), $numwords)) .'</p>';
	$string .= '<a href="'.$url. '"class="button read-more-button big button-arrow">Read More</a>';									
	return $string;
}


function get_beritabaru($beritabaru, $numwords = 25){
	$string = '';
	$url = article_link($beritabaru);

	$string .= '
    
    	<img src="'.site_url('').'cosmide/admin/artikel/full/'.e($beritabaru->image).'" alt="" class="rimg" />
    	
        <span class="bdate"><a href="#">Sept <strong>'.e(substr($beritabaru->pubdate, 8, 10)).'</strong>'.e(substr($beritabaru->pubdate, 0, 4)).'</a></span>
        
        <h4>'. anchor($url, e($beritabaru->title)) .'</h4>
        <p>'. e(limit_to_numwords(strip_tags($beritabaru->body), $numwords)) .'</p>
        
        <a href="'.$url.'" class="button ofani">Read More</a>
        
    ';
return $string;
}


function get_beritabaru2($beritabaru2, $numwords = 25){
	$string = '';
	$url = article_link($beritabaru2);

	$string .= '<div class="one_third last">
    
    	<img src="'.site_url('').'cosmide/admin/artikel/full/'.e($beritabaru2->image).'" alt="" class="rimg" />
    	
        <span class="bdate"><a href="#"><strong>'.e(substr($beritabaru2->pubdate, 8, 10)).'</strong>'.e(substr($beritabaru2->pubdate, 0, 4)).'</a></span>
        
        <h4>'. anchor($url, e($beritabaru2->title)) .'</h4>
        <p>'. e(limit_to_numwords(strip_tags($beritabaru2->body), $numwords)) .'</p>
        
        <a href="'.$url.'" class="button ofani">Read More</a>
        
    </div><!-- end section -->';
return $string;
}

function get_idberita($beritabaru2, $numwords = 25){
	$string = '';
	$url = article_link($beritabaru2);
	$string .= e($beritabaru2->id);
return $string;
}


function get_datapekerjaan($lowongan, $numwords = 25){
	$string = '';
	$url = lowongan_link($lowongan);
	$string .= '<div class="col-lg-4 col-md-4 col-sm-6 mix category-'.e($lowongan->category).'" data-nameorder="6" data-dateorder="6"><!-- Media Item --><div class="media-item animate-onscroll "><div class="media-image">';
	$string .= '<img src="'.  site_url() . '/webdata/img/lowongan/thumbnails/' .e($lowongan->image). '" alt=""><div class="media-hover"><div class="media-icons">
				<a href="'. site_url(). '/webdata/img/lowongan/full/'. e($lowongan->image). '" data-group="media-jackbox" data-thumbnail="'. site_url(). '/webdata/img/lowongan/full/' .e($lowongan->image) . '" class="jackbox media-icon"><i class="icons icon-zoom-in"></i></a>
				<a href="'. site_url().'member/dashboard/lowongan/'.e($lowongan->id).'" class="media-icon"><i class="icons icon-link"></i></a>
				</div></div></div><div class="media-info"><div class="media-header"><div class="media-format"><div><i class="icons icon-briefcase"></i></div></div>';
	$string .= '<div class="media-caption"><h2><a href="'. site_url().'member/dashboard/lowongan/'.e($lowongan->id).'">'.e($lowongan->nama_job) . '</a></h2><span class="tags"><a href="#">' .e($lowongan->category) . '</a></span></div>
				</div>';
	$string .= '<div class="media-description"><p>'. e(limit_to_numwords(strip_tags($lowongan->deskripsi_lengkap), $numwords)) . '</p>
				</div><div class="media-button"><a href="'. site_url().'member/dashboard/lowongan/'.e($lowongan->id).'" class="button big button-arrow">More info</a>
				</div></div></div><!-- /Media Item --></div>';
									
	return $string;
}


function get_categorylowongan($lowongan){
	$string = '';
	$string .= '<li  class="filter" data-filter=".category-'.e($lowongan->slug). '">'.e($lowongan->category).'</li>';
									
	return $string;
}

function get_categoryberita($categoryberita){
	$string = '';
	$string .= '<li  class="filter" data-filter=".category-'.e($categoryberita->slug). '">'.e($categoryberita->category).'</li>';
									
	return $string;
}

function get_datapengumuman($beritapenting, $numwords = 25){
	$string = '';
	$url = article_link($beritapenting);
	$string .= '<h3>' . anchor($url, e($article->title)) .  '</h3>';
	$string .= '<div class="date">'. e($article->created) .'<span style="color: #bdc3c7;margin-left: 10px;"><i class="icon icon-user" style="margin-left:2px;margin-right: 5px;opacity:0.4;"></i>'.e($article->author).'</span></div>';
	$string .= '<div class="post"><p>'. e(limit_to_numwords(strip_tags($article->body), $numwords)) .'</p></div>';

	return $string;
}
function get_category($categorys, $numwords = 50){
	$string = '';
	$url = article_link($categorys);
	$string .= '<h3>' . anchor($url, e($categorys->title)) .  '</h3>';
	$string .= '<div class="date">'. e($categorys->created) .'<span style="color: #bdc3c7;margin-left: 10px;"><i class="icon icon-user" style="margin-left:2px;margin-right: 5px;opacity:0.4;"></i>'.e($categorys->author).'</span></div>';
	$string .= '<div class="post"><p>'. e(limit_to_numwords(strip_tags($categorys->body), $numwords)) .'</p></div>';

	return $string;
}


function get_dataevent($event){
	$string = '';
	
	
	//$time2 = if (substr($event->end_time, 0, 1) == 1||2||3||4||5||6||7||8||9||10||11||12 ) {
	//	'am';
	//} else {
	//	'pm';
	//}

	$string .= '<li><div class="date"><span><span class="day">15</span><span class="month">AUG</span></span></div>
				<div class="event-content"><h6><a href="#">'.e($event->nama_event).'</a></h6>
				<ul class="event-meta"><li><i class="icons icon-clock"></i> '.substr($event->start_time, 0, 5) .' - '.substr($event->end_time, 0, 5).'</li>
				<li><i class="icons icon-location"></i> '.$event->lokasi.'</li></ul>
				</div></li>';

	return $string;
}


function get_datacategory($categorys, $numwords = 30){
	$string = '';
	$url = article_link($categorys);
	$string .= '<div class="col-lg-6 col-md-6 col-sm-6 mix category-photos" data-nameorder="1" data-dateorder="3"><!-- Media Item --><div class="media-item animate-onscroll ">
				<div class="media-image"><img src="' . site_url() .'webdata/img/media/media1.jpg" alt=""><div class="media-hover">
				<div class="media-icons"><a href="'.site_url() .'webdata/img/media/media1.jpg" data-group="media-jackbox" data-thumbnail="'.site_url() .'webdata/img/media/media1.jpg" class="jackbox media-icon"><i class="icons icon-zoom-in"></i></a>
				<a href="'. site_url().'article/'.e($categorys->id).'/'.e($categorys->slug).'" class="media-icon"><i class="icons icon-link"></i></a></div></div>
				</div><div class="media-info"><div class="media-header"><div class="media-format"><div><i class="icons icon-bookmark"></i></div></div>';
	$string .= '<div class="media-caption">
				<h2>'. anchor($url, e($categorys->title)) .'</h2>
				<div class="post-meta"><span>By: <a href="#">'.e($categorys->author).'</a></span><br><span>'.e($categorys->created).'</span></div>
				</div></div><div class="media-description"><p>'. e(limit_to_numwords(strip_tags($categorys->body), $numwords)) .'</p>
				</div><div class="media-button"><a href="'. site_url().'article/'.e($categorys->id).'/'.e($categorys->slug).'" class="button big button-arrow">Baca Artikel</a>
				</div></div></div><!-- /Media Item --></div>';
	return $string;
}


function get_databeritacosmide($categorys, $numwords = 30){
	$string = '';
	$url = article_link($categorys);
	$string .= '<div class="blog_postcontent">
        <div class="image_frame"><a href="#"><img src="'.site_url() .'cosmide/admin/artikel/full/'. e($categorys->image) .'" alt="" /></a></div>
        <h3><a href="'. site_url().'article/'.e($categorys->id).'/'.e($categorys->slug).'">'. e($categorys->title) .'</a></h3>
            <ul class="post_meta_links">
                <li><a href="#" class="date">'.e($categorys->created).'</a></li>
                
                <li class="post_categoty"><i>Category :</i> <a href="#">'.e($categorys->category) .'</a></li>
                <li class="post_comments"><i>By:</i> '.e($categorys->author).'</li>
            </ul>
         <div class="clearfix"></div>
         <div class="margin_top1"></div>
        <p>'. e(limit_to_numwords(strip_tags($categorys->body), $numwords)) .' <a href="'. site_url().'article/'.e($categorys->id).'/'.e($categorys->slug).'">read more...</a></p>
        </div>';
	
	return $string;
}

function get_datajobnews($categorys, $numwords = 30){
	$string = '';
	$url = article_link($categorys);
	$string .= '<div class="col-lg-6 col-md-6 col-sm-6 mix category-'.e($categorys->category). '" data-nameorder="1" data-dateorder="3"><!-- Media Item --><div class="media-item animate-onscroll ">
				<div class="media-image"><img src="' . site_url() .'cosmide/admin/artikel/thumbnails/'. e($categorys->image) .'" alt=""><div class="media-hover">
				<div class="media-icons"><a href="'.site_url() .'cosmide/admin/artikel/full/'. e($categorys->image) .'" data-group="media-jackbox" data-thumbnail="'.site_url() .'cosmide/admin/artikel/thumbnails/'. e($categorys->image) .'" class="jackbox media-icon"><i class="icons icon-zoom-in"></i></a>
				<a href="'. site_url().'article/'.e($categorys->id).'/'.e($categorys->slug).'" class="media-icon"><i class="icons icon-link"></i></a></div></div>
				</div><div class="media-info"><div class="media-header"><div class="media-format"><div><i class="icons icon-bookmark"></i></div></div>';
	$string .= '<div class="media-caption">
				<h2>'. anchor($url, e($categorys->title)) .'</h2>
				<div class="post-meta"><span>By: <a href="#">'.e($categorys->author).' </a> | Category: </span><span class="tags"><a href="#">'.e($categorys->category) .'</a></span>
				<br><span>'.e($categorys->created).'</span></div>

				</div></div><div class="media-description"><p>'. e(limit_to_numwords(strip_tags($categorys->body), $numwords)) .'</p>
				</div><div class="media-button"><a href="'. site_url().'article/'.e($categorys->id).'/'.e($categorys->slug).'" class="button big button-arrow">Baca Artikel</a>
				</div></div></div><!-- /Media Item --></div>';
	return $string;
}


function limit_to_numwords($string, $numwords){
	$excerpt = explode(' ', $string, $numwords + 1);
	if (count($excerpt) >= $numwords) {
		array_pop($excerpt);
	}
	$excerpt = implode(' ', $excerpt);
	return $excerpt;
}

function e($string){
	return htmlentities($string);
}



function get_menu ($array, $child = FALSE)
{
	$CI =& get_instance();
	$str = '';

	if (count($array)) {
		$str .= $child == FALSE ? '<ul id="navigation">' . PHP_EOL : '<ul>' . PHP_EOL;
	
		foreach ($array as $item) {
				
			
			if (isset($item['children']) && count($item['children'])) {
				if($item['slug'] == '') {
					$str .= '<li class="home-button current-menu-item">';
					$str .= '<a href="' . site_url(e($item['slug'])) . '">';
					$str .= '<i class="icons icon-home"></i></a>' .PHP_EOL;
					$str .= get_menu($item['children'], TRUE);
				} else {
					$str .= '<li>';
					$str .= '<a href="' . site_url(e($item['slug'])) . '">' . e($item['title']);
					$str .= '</a>' .PHP_EOL;
					$str .= get_menu($item['children'], TRUE);
				}
				
			}
			else {
				if($item['slug'] == '') {
				$str .= '<li class="home-button current-menu-item">';
				$str .= '<a href="' . site_url($item['slug']) . '"><i class="icons icon-home"></i></a>';
				} else {
					$str .= '<li>';
					$str .= '<a href="' . site_url($item['slug']) . '">' . e($item['title']) . '</a>';
				}
			}
			$str .= '</li>' . PHP_EOL;
		}
		

		$str .= $child == FALSE ? '<li class="donate-button"><a href="'. site_url() . 'member/dashboard">Member Area</a></li></ul>' . PHP_EOL : '</ul>' . PHP_EOL;
	}
	
	return $str;
}


function get_menulink($menulink){
	$string = '';
	$CI =& get_instance();

	
	if (count($menulink)) {
	foreach ($menulink as $menudata) {
		$active = site_url($CI->uri->segment(1)) == $menudata->link_url ? TRUE : FALSE;
		$string .= $active ? '<li class="LKSJATENG">' : '<li class="LKSJATENG2014">';
		$string .= '<a href="' .$menudata->link_url. '">'.$menudata->link_judul.'</a>';
		$string .= '</li>' . PHP_EOL;
	}

	}
	return $string;
}




function get_web ($array, $child = FALSE)
{
	$CI =& get_instance();
	$str = '';

	if (count($array)) {
		$str .= $child == FALSE ? '<ul class="nav">' . PHP_EOL : '<ul class="dropdown-menu">' . PHP_EOL;

		foreach ($array as $item) {
				
			$active = $CI->uri->segment(1) == $item['slug'] ? TRUE : FALSE;
			if (isset($item['children']) && count($item['children'])) {
				$str .= $active ? '<li class="dropdown active">' : '<li class="dropdown">';
				$str .= '<a  class="dropdown-toggle" data-toggle="dropdown" href="' . site_url(e($item['slug'])) . '">' . e($item['title']);
				$str .= '<b class="caret"></b></a>' . PHP_EOL;
				$str .= get_menu($item['children'], TRUE);
			}
			else {
				$str .= $active ? '<li class="active">' : '<li>';
				$str .= '<a href="' . site_url($item['slug']) . '">' . e($item['title']) . '</a>';
			}
			$str .= '</li>' . PHP_EOL;
		}

		$str .= '</ul>' . PHP_EOL;
	}

	return $str;
}
/**
 * Dump helper. Functions to dump variables to the screen, in a nicley formatted manner.
 * @author Joost van Veen
 * @version 1.0
 */
if (!function_exists('dump')) {
    function dump ($var, $label = 'Dump', $echo = TRUE)
    {
        // Store dump in variable 
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        
        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';
        
        // Output
        if ($echo == TRUE) {
            echo $output;
        }
        else {
            return $output;
        }
    }
}


if (!function_exists('dump_exit')) {
    function dump_exit($var, $label = 'Dump', $echo = TRUE) {
        dump ($var, $label, $echo);
        exit;
    }
}
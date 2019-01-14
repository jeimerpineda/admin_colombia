<?php 
namespace App\Helpers;
use Illuminate\Support\Facades\DB;

class Basics {

	public static function Breadcrumb($arreglo) {
		$html = '<div aria-label="breadcrumb"><ol class="breadcrumb">';
		$tot = count($arreglo);
		foreach($arreglo as $ind=>$li) {
			$num = $ind+1;
			$active = ($num==$tot) ? 'active' : '';
			$html .= '<li class="breadcrumb-item '.$active.'">'.$li.'</li>';
		}
		$html .= '</ol></div>';
		return $html;
	}

	public static function selected($string_a,$string_b) {
		return (!strcmp($string_b,$string_a)) ? 'selected' : '';
	}

	public static function checked($string_a,$string_b) {
		return (!strcmp($string_b,$string_a)) ? 'checked' : '';
	}

	public static function printErrors($cond,$cont) {
		$html = NULL;
		if($cond==true) {
			$html = 
				'<div class="alert alert-danger alert-dismissible fade show">
					<ul>';
						foreach($cont as $error):
			$html .=			'<li>'.$error.'</li>';
						endforeach;
			$html .=	'</ul>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					 </button>
				</div>';
		}	
		return $html;
	}

	public static function printMessage($variable) {
		$html = NULL;
		if(session($variable)) {
			$html = 
				'<div class="alert alert-success alert-dismissible fade show my-2">'
					.session($variable).
					'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
				</div>';
		}
		return $html;
	}

	public static function currentLink($var) {
		return \Request::segment(1) == $var ? 'active' : '';
	}
}
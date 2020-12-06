<?php

/* ----------------------------------------------------------------------------------
DEFAULT FUNCTIONS
---------------------------------------------------------------------------------- */

function getMonth($data)
{
	$dateTime = explode('-', $data);
	$month = '';

	switch($dateTime[1])
	{
		case '01': $month = 'JAN'; break;
		case '02': $month = 'FEV'; break;
		case '03': $month = 'MAR'; break;
		case '04': $month = 'ABR'; break;
		case '05': $month = 'MAI'; break;
		case '06': $month = 'JUN'; break;
		case '07': $month = 'JUL'; break;
		case '08': $month = 'AGO'; break;
		case '09': $month = 'SET'; break;
		case '10': $month = 'OUT'; break;
		case '11': $month = 'NOV'; break;
		case '12': $month = 'DEZ'; break;
	}
	
	return $dateTime[2].' '.$month.' '.$dateTime[0];
}

function createSlug($text, $delimiter = '-')
{
	// replace non letter or digits by -
	$text = preg_replace('~[^\pL\d]+~u', '-', $text);

	// transliterate
	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

	// remove unwanted characters
	$text = preg_replace('~[^-\w]+~', '', $text);

	// trim
	$text = trim($text, '-');

	// remove duplicate -
	$text = preg_replace('~-+~', '-', $text);

	// lowercase
	$text = strtolower($text);

	if (empty($text)) {
	return 'n-a';
	}

	return $text;
} 

function paginacao($params)
{
	if(intval($params['PAGINA_TOTAL']) > 1)
	{
		$html = '';

		$html .= '<div id="'.$params['ID'].'" class="'.$params['CLASS'].'">';
			$html .= '<ul>';
				for($i = 1; $i <= intval($params['PAGINA_TOTAL']); $i++)
				{
					if($i == intval($params['PAGINA_ATUAL']))
					{
						$html .= '<li class="current-page-item">';
							$html .= '<span>'.$i.'</span>';
						$html .= '</li>'; 
					}
					else
					{
						$html .= '<li>';
							$html .= '<a href="'.$params['PATH'].'/pagina-'.$i.'">'.$i.'</a>';
						$html .= '</li>'; 
					}
				}
			$html .= '</ul>';
		$html .= '</div>';
		
		echo $html;
	}
}

function limitarTexto($texto, $limite)
{
	$contador = strlen($texto);

	if ( $contador >= $limite )
	{
		$texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . '...';
		return $texto;
	}
	else
	{
		return $texto;
	}
} 

?>
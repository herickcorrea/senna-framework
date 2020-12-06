
<?php
// require_once './_morpho/Endpoint.php';

if( @include( './_morpho/Endpoint.php' ) )
{
	$APIURL = APInoVersion();
}
if( @include( '../../../_morpho/Endpoint.php' ) )
{
	$APIURL = APInoVersion();
}

class App
{
	function get_url_origin()
	{
		$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		return $protocol;
	}

	function Routes($routesOBJ,$path,$dir)
    {
		$protocol = $this->get_url_origin();

		$root = $dir.'/';
		$pathRoute = '';
		$urlParams = '';

		if($path == $dir.'/')
		{
			foreach ($routesOBJ as $route)
			{
				$pathRoute = $route[$root];
			}
		}
		else
		{
			foreach ($routesOBJ[0] as $key => $route)
			{
				if( $key != $root )
				{
					if(strpos($path, $route['path']) !== false)
					{
						$pathRoute = $route;

						//echo $root.'<br>';
						//print_r($pathRoute);

						if(strpos($path, '?') !== false)
						{
							$urlParams = explode('/',ltrim(substr(str_replace($key,'',$path), 0, strpos(str_replace($key,'',$path), "?")), '/'));
						}
						else
						{
							if($root == "/")
							{
								$replacePath = $route['path'];
							}
							else
							{
								$replacePath = '/'.str_replace('/','',$root).$route['path'];
							}
							//echo $replacePath.'<br>';
							//echo $path.'<br>';
							$urlParams = explode('/',ltrim(str_replace($replacePath,'',$path), '/'));
							//print_r($urlParams);
						}
					}
				}
			}
		}

		$pageContext = array(
			'domain'		=> $protocol.$_SERVER['SERVER_NAME'],
			'root' 			=> $dir,
			'page'			=> $pathRoute,
			'page_params'	=> $urlParams,
		);

		$pathFile = './'.$pageContext['page']['page-dir'].'/'.$pageContext['page']['page-file'];
		$path404 = $protocol.$_SERVER['SERVER_NAME'].$dir.'/404';

		//echo $path404;

		if( !@include( $pathFile ) )
		{
			header("Location: ".$path404);
		}
    }

	function Import($component,$props)
	{
		if($props)
		{
			$componentProps = $props;
		}

		if( !@include( $component ) )
		{
			echo 'Component do not exist';
		}
	}

	function Views($view,$props)
	{
		$viewProps = $props;
		
		if( !@include( $view ) )
		{
			echo 'Component do not exist';
		}
	}

	function GetAPI($vesion,$endpoints)
	{
		$v = ($vesion) ? '/'.$vesion : '';

		global $APIURL;

		return json_decode(file_get_contents($APIURL.$v.$endpoints),true);
	}

	function GetAPIheaders($vesion,$endpoints,$header)
	{
		$v = ($vesion) ? '/'.$vesion : '';

		global $APIURL;

		return json_decode( file_get_contents($APIURL.$v.$endpoints, false, $header),true );
	}

	function GetUrlProps($array,$key)
	{
		$result = false;

		foreach ($array as $props)
		{
			if(strpos($props, $key) !== false)
			{
				if(explode('~',$props)[1])
				{
					$result = explode('~',$props)[1];
				}
				else if(explode('-',$props)[1])
				{
					$result = explode('-',$props)[1];
				}
			}
		}

		//print_r($result);

		return $result;
	}
}
<?php

require_once './_morpho/app.php';
require_once './functions.php';

//$GLOBAL['PROTOCOL'] = 'https://';

$APP = new App();
$CONTENT = new App();

if($_SERVER['HTTP_HOST'] == 'beinyou.com.br' || $_SERVER['HTTP_HOST'] == 'www.beinyou.com.br' || $_SERVER['HTTP_HOST'] == 'beinyou.herickcorrea.com.br')
{
	$dirPATH = '';
}
else if($_SERVER['HTTP_HOST'] == 'dynamostecnologia.com.br')
{
	$dirPATH = '/novobe';
}
else if($_SERVER['HTTP_HOST'] == 'front.beinyou.com.br')
{
	$dirPATH = '/html';
}
else
{
	$dirPATH = '/html';
}

$Routes = array(
	array(
		$dirPATH.'/404'	=> array(
			'path'		=> '/404',
			'slug' 		=> 'page-404',
			'page-dir'	=> 'pages',
			'page-file'	=> 'page-404.php',
		),
		$dirPATH.'/' 	=> array(
			'path'		=> '/',
			'slug' 		=> 'home',
			'page-dir'	=> 'pages',
			'page-file'	=> 'page-home.php',
		),
		$dirPATH.'/busca' => array(
			'path'		=> '/busca',
			'slug' 		=> 'busca',
			'page-dir'	=> 'pages',
			'page-file'	=> 'page-busca.php',
		),
		$dirPATH.'/nova-busca' => array(
			'path'		=> '/nova-busca',
			'slug' 		=> 'nova-busca',
			'page-dir'	=> 'pages',
			'page-file'	=> 'page-nova-busca.php',
		),
		$dirPATH.'/terapia' => array(
			'path'		=> '/terapia/',
			'slug' 		=> 'terapia',
			'page-dir'	=> 'pages',
			'page-file'	=> 'page-busca.php',
		),
		$dirPATH.'/beneficio' => array(
			'path'		=> '/beneficio/',
			'slug' 		=> 'beneficio',
			'page-dir'	=> 'pages',
			'page-file'	=> 'page-busca.php',
		),
		$dirPATH.'/profissional' => array(
			'path'		=> '/profissional',
			'slug' 		=> 'profissional',
			'page-dir'	=> 'pages',
			'page-file'	=> 'page-detalhe-profissional.php',
		),
		$dirPATH.'/instituto' => array(
			'path'		=> '/instituto',
			'slug' 		=> 'profissional',
			'page-dir'	=> 'pages',
			'page-file'	=> 'page-detalhe-instituto.php',
		),
		$dirPATH.'/proximos-eventos' => array(
			'path'		=> '/proximos-eventos',
			'slug' 		=> 'proximos-eventos',
			'page-dir'	=> 'pages',
			'page-file'	=> 'page-proximos-eventos.php',
		),
		$dirPATH.'/evento' => array(
			'path'		=> '/evento/',
			'slug' 		=> 'evento',
			'page-dir'	=> 'pages',
			'page-file'	=> 'page-detalhe-evento.php',
		),
		$dirPATH.'/galeria-de-fotos' => array(
			'path'		=> '/galeria-de-fotos',
			'slug' 		=> 'galeria-de-fotos',
			'page-dir'	=> 'pages',
			'page-file'	=> 'page-galeria-de-fotos.php',
		),
		$dirPATH.'/evento-finalizado' => array(
			'path'		=> '/evento-finalizado/',
			'slug' 		=> 'evento-finalizado',
			'page-dir'	=> 'pages',
			'page-file'	=> 'page-detalhe-galeria.php',
		),
		$dirPATH.'/seja-um-profissional' => array(
			'path'		=> '/seja-um-profissional',
			'slug' 		=> 'seja-um-profissional',
			'page-dir'	=> 'pages',
			'page-file'	=> 'page-seja-um-profissional.php',
		),
		$dirPATH.'/nossos-parceiros' => array(
			'path'		=> '/nossos-parceiros',
			'slug' 		=> 'nossos-parceiros',
			'page-dir'	=> 'pages',
			'page-file'	=> 'page-nossos-parceiros.php',
		),
		$dirPATH.'/contato' => array(
			'path'		=> '/contato',
			'slug' 		=> 'contato',
			'page-dir'	=> 'pages',
			'page-file'	=> 'page-contato.php',
		),
		$dirPATH.'/sobre-beinyou' => array(
			'path'		=> '/sobre-beinyou',
			'slug' 		=> 'sobre-beinyou',
			'page-dir'	=> 'pages',
			'page-file'	=> 'page-sobre-beinyou.php',
		),
		$dirPATH.'/politica-privacidade' => array(
			'path'		=> '/politica-privacidade',
			'slug' 		=> 'politica-privacidade',
			'page-dir'	=> 'pages',
			'page-file'	=> 'page-politica-privacidade.php',
		),
		$dirPATH.'/login' => array(
			'path'		=> '/login',
			'slug' 		=> 'login',
			'page-dir'	=> 'pages',
			'page-file'	=> 'page-login.php',
		),
		$dirPATH.'/cadastrar' => array(
			'path'		=> '/cadastrar',
			'slug' 		=> 'cadastrar',
			'page-dir'	=> 'pages',
			'page-file'	=> 'page-cadastro.php',
		),
		$dirPATH.'/esqueci-minha-senha' => array(
			'path'		=> '/esqueci-minha-senha',
			'slug' 		=> 'esqueci-minha-senha',
			'page-dir'	=> 'pages',
			'page-file'	=> 'page-esqueci-minha-senha.php',
		),
		$dirPATH.'/rede/user' => array(
			'path'		=> '/rede/user',
			'slug' 		=> 'user',
			'page-dir'	=> 'pages/rede',
			'page-file'	=> 'page-template-user.php',
		),
		$dirPATH.'/rede/perfil' => array(
			'path'		=> '/rede/perfil',
			'slug' 		=> 'perfil',
			'page-dir'	=> 'pages/rede',
			'page-file'	=> 'page-template.php',
		),
		$dirPATH.'/rede/minha-conta/profissional' => array(
			'path'		=> '/rede/minha-conta/profissional',
			'slug' 		=> 'minha-conta-profissional',
			'page-dir'	=> 'pages/rede',
			'page-file'	=> 'page-minha-conta-profissional.php',
		),
		$dirPATH.'/rede/minha-conta/instituto' => array(
			'path'		=> '/rede/minha-conta/instituto',
			'slug' 		=> 'minha-conta-instituto',
			'page-dir'	=> 'pages/rede',
			'page-file'	=> 'page-minha-conta-instituto.php',
		),
		$dirPATH.'/rede/minha-conta/cliente' => array(
			'path'		=> '/rede/minha-conta/cliente',
			'slug' 		=> 'minha-conta-cliente',
			'page-dir'	=> 'pages/rede',
			'page-file'	=> 'page-minha-conta-cliente.php',
		),
		$dirPATH.'/rede/cadastro-profissional-etapa-1' => array(
			'path'		=> '/rede/cadastro-profissional-etapa-1',
			'slug' 		=> 'cadastro-profissional',
			'page-dir'	=> 'pages/rede',
			'page-file'	=> 'page-cadastro-profissional-parte-1.php',
		),
		$dirPATH.'/rede/cadastro-instituto-etapa-1' => array(
			'path'		=> '/rede/cadastro-instituto-etapa-1',
			'slug' 		=> 'cadastro-profissional',
			'page-dir'	=> 'pages/rede',
			'page-file'	=> 'page-cadastro-instituto-parte-1.php',
		),
		$dirPATH.'/rede/cadastro-profissional-etapa-2' => array(
			'path'		=> '/rede/cadastro-profissional-etapa-2',
			'slug' 		=> 'cadastro-profissional',
			'page-dir'	=> 'pages/rede',
			'page-file'	=> 'page-cadastro-profissional-parte-2.php',
		),
		$dirPATH.'/rede/cadastro-instituto-etapa-2' => array(
			'path'		=> '/rede/cadastro-instituto-etapa-2',
			'slug' 		=> 'cadastro-profissional',
			'page-dir'	=> 'pages/rede',
			'page-file'	=> 'page-cadastro-instituto-parte-2.php',
		),
		$dirPATH.'/rede/logout' => array(
			'path'		=> '/rede/logout',
			'slug' 		=> 'logout',
			'page-dir'	=> 'pages/rede',
			'page-file'	=> 'page-logout.php',
		),
		$dirPATH.'/rede/interesses' => array(
			'path'		=> '/rede/interesses',
			'slug' 		=> 'perfil',
			'page-dir'	=> 'pages/rede',
			'page-file'	=> 'page-terapia-interesse.php',
		),
		$dirPATH.'/rede/adicionar-anuncios' => array(
			'path'		=> '/rede/adicionar-anuncios',
			'slug' 		=> 'rede-anuncios',
			'page-dir'	=> 'pages/rede',
			'page-file'	=> 'page-adicionar-anuncios.php',
		),
		$dirPATH.'/rede/meus-anuncios' => array(
			'path'		=> '/rede/meus-anuncios',
			'slug' 		=> 'rede-anuncios',
			'page-dir'	=> 'pages/rede',
			'page-file'	=> 'page-meus-anuncios.php',
		),
		$dirPATH.'/rede/editar-anuncio' => array(
			'path'		=> '/rede/editar-anuncio',
			'slug' 		=> 'rede-anuncios',
			'page-dir'	=> 'pages/rede',
			'page-file'	=> 'page-editar-anuncio.php',
		),
		$dirPATH.'/rede/seguindo' => array(
			'path'		=> '/rede/seguindo',
			'slug' 		=> 'rede-seguindo-seguidores',
			'page-dir'	=> 'pages/rede',
			'page-file'	=> 'page-seguindo.php',
		),
		$dirPATH.'/rede/seguidores' => array(
			'path'		=> '/rede/seguidores',
			'slug' 		=> 'rede-seguindo-seguidores',
			'page-dir'	=> 'pages/rede',
			'page-file'	=> 'page-seguidores.php',
		),
		$dirPATH.'/rede/indicar-profissional' => array(
			'path'		=> '/rede/indicar-profissional',
			'slug' 		=> 'rede-indicacao',
			'page-dir'	=> 'pages/rede',
			'page-file'	=> 'page-indicar-profissional.php',
		),
		$dirPATH.'/api/ajax/posts' => array(
			'path'		=> '/api/ajax/posts',
			'slug' 		=> 'posts',
			'page-dir'	=> 'pages/rede/ajax',
			'page-file'	=> 'posts.php',
		),
		$dirPATH.'/api/ajax/posts-details' => array(
			'path'		=> '/api/ajax/posts',
			'slug' 		=> 'posts-details',
			'page-dir'	=> 'pages/rede/ajax',
			'page-file'	=> 'posts-details.php',
		),
		$dirPATH.'/api/ajax/create-posts' => array(
			'path'		=> '/api/ajax/create-posts',
			'slug' 		=> 'create-posts',
			'page-dir'	=> 'pages/rede/ajax',
			'page-file'	=> 'create-posts.php',
		),
	)
);

$APP->Routes($Routes,$_SERVER['REQUEST_URI'],$dirPATH );
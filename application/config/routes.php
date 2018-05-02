<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome/index_home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['sair'] = 'welcome/logout';
$route['login'] = 'welcome/index';
$route['inicio'] = 'welcome/home';
$route['alterar-conteudo/(:num)'] = 'conteudo/ver_conteudo/$1';
$route['update/categoria/(:num)'] = 'conteudo/alterar/$1';

//rotas das ordenações
$route['criar/ordenacao'] = 'odenacao/crate_ordenacao';

$route['form-categoria-data/post']['post'] = "categoria/add_categoria_ajax";

$route['search'] = 'search/buscar';

$route['visualizar-categoria/(:num)'] = 'categoria/view_categoria/$1';

$route['visualizar-categoria/(:num)'] = 'welcome/view_categoria/$1';

$route['leia-mais/(:num)'] = 'welcome/leia_mais/$1';


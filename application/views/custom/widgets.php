<?

$page_data['widgets'] = array();

/* get widget data */

$site_menu = $this->page_mapper->get_menu();
$widgets = $this->banner_mapper->get_widget(0);

$text_banner = $this->text_mapper->get_widjet(1);
$search_form = $this->search_mapper->get_form();
$catalog_menu = $this->diff_func_mapper->get_catalog_menu();
$catalog_page = $this->diff_func_mapper->get_catalog_page();
$catalog_item = $this->diff_func_mapper->get_catalog_item();
$specpredloj = $this->diff_func_mapper->get_special();

$sravnenie = $this->diff_func_mapper->sravnenie();
$page_data['widgets']['sravnenie'] = $sravnenie;

/* set template data */
$page_data['widgets']['site_menu'] = $site_menu;
$page_data['widgets']['widgets'] = $widgets;

$page_data['widgets']['text_banner'] = $text_banner;
$page_data['widgets']['search_form'] = $search_form;
$page_data['widgets']['catalog_menu'] = $catalog_menu;
$page_data['widgets']['catalog_page'] = $catalog_page;
$page_data['widgets']['catalog_item'] = $catalog_item;
$page_data['widgets']['specpredloj'] = $specpredloj;

?>
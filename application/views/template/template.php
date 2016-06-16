<?php // $data2['js_files']=$js_files;?>
<?php // $data2['css_files']=$css_files;?>

<?php $this->load->view('template/header'); ?>

<?php $this->load->view('template/menu', $menu); ?>
<?php if($this->uri->segment(1) === "home" OR $this->uri->segment(1) === "default_controller"): ?>
<?php $this->load->view('template/carrousel'); ?>
<?php endif; ?>
<?php $this->load->view('template/menu_lateral'); ?>

<?php $this->load->view($contenido,$data); ?>

<?php // $this->load->view('template/galeria_lateral'); ?>

<?php $this->load->view('template/footer'); ?>

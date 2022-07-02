<?php defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('templates/visitor/head');
$this->load->view('templates/visitor/header');
?>
<?php echo $view_content; ?>
<?php $this->load->view('templates/visitor/footer'); ?>

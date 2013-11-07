<?php /* Smarty version 2.6.26, created on 2013-01-14 19:51:59
         compiled from about/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'about/index.tpl', 16, false),array('function', 'url', 'about/index.tpl', 19, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "about.aboutTheJournal"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>

<div id="aboutPeople">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "about.people"), $this);?>
</h3>
<ul class="plain">
			<li>&#187; <a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'contact'), $this);?>
">Ethics Committee Membership</a></li>
		<li>&#187; Researcher's directory (coming soon...)</li>
	</ul>
</div>
<div id="aboutPolicies">

<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "about.policies"), $this);?>
</h3>
<ul class="plain">

<li>&#187; <a title="Standard Operating Procedures (khmer)" href="/camhrp/public/Cam_IRBs_HR_SOP_khmer.pdf" target="_blank">Standard Operating Procedures (khmer)<br /></a></li>
<li>&#187; <a title="Standard Operating Procedures (engl)" href="/camhrp/public/Cam_SOP_engl.pdf" target="_blank">Standard Operating Procedures (engl)<br /></a></li>
<li>&#187; <a title="Userguide for investigators (engl)" href="/camhrp/public/Cam_IRBs_HR_Investigator_Userguide_khmer.pdf" target="_blank">Userguide for investigators (khmer)<br /></a></li>
<li>&#187; <a title="Userguide for investigators (khmer)" href="/camhrp/public/Cam_IRBs_HR_Investigator_Userguide_engl.pdf" target="_blank">Userguide for investigators (engl)<br /></a></li>
</ul>
</div>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

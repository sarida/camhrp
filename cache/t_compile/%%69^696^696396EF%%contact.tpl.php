<?php /* Smarty version 2.6.26, created on 2012-06-11 09:06:59
         compiled from about/contact.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'about/contact.tpl', 24, false),array('function', 'translate', 'about/contact.tpl', 24, false),array('function', 'mailto', 'about/contact.tpl', 24, false),)), $this); ?>

<?php echo ''; ?><?php $this->assign('pageTitle', "about.journalContact"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<div id="contact">

<?php if (count ( $this->_tpl_vars['ercChair'] ) > 0): ?>
<h4>Chair</h4>
	<div id="ercChair">
	<ol class="contact">
		<?php $_from = $this->_tpl_vars['ercChair']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ercChair']):
?> 
			<strong><?php echo ((is_array($_tmp=$this->_tpl_vars['ercChair']->getFullName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</strong><?php if ($this->_tpl_vars['ercChair']->getLocalizedAffiliation()): ?>, <?php echo ((is_array($_tmp=$this->_tpl_vars['ercChair']->getLocalizedAffiliation())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php endif; ?><br /> &#187; <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "about.contact.email"), $this);?>
: <?php if ($this->_tpl_vars['ercChair']->getEmail()): ?><?php echo smarty_function_mailto(array('address' => ((is_array($_tmp=$this->_tpl_vars['ercChair']->getEmail())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp))), $this);?>
<br /><?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
	</ol>
	</div>
<?php endif; ?>

<?php if (count ( $this->_tpl_vars['ercViceChair'] ) > 0): ?>
<h4>Vice-Chair</h4>
	<div id="ercViceChair">
	<ol class="contact">
		<?php $_from = $this->_tpl_vars['ercViceChair']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ercViceChair']):
?> 
			<strong><?php echo ((is_array($_tmp=$this->_tpl_vars['ercViceChair']->getFullName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</strong><?php if ($this->_tpl_vars['ercViceChair']->getLocalizedAffiliation()): ?>, <?php echo ((is_array($_tmp=$this->_tpl_vars['ercViceChair']->getLocalizedAffiliation())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php endif; ?><br /> &#187; <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "about.contact.email"), $this);?>
: <?php if ($this->_tpl_vars['ercViceChair']->getEmail()): ?><?php echo smarty_function_mailto(array('address' => ((is_array($_tmp=$this->_tpl_vars['ercViceChair']->getEmail())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp))), $this);?>
<br /><?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
	</ol>
	</div>
<?php endif; ?>


<?php if (count ( $this->_tpl_vars['secretary'] ) > 0): ?>
<?php if (count ( $this->_tpl_vars['secretary'] ) == 1): ?>
<h4>Secretary</h4>
<?php else: ?>
<h4>Secretaries</h4>
<?php endif; ?>
	<div id="secretary">
	<ol class="contact">
		<?php $_from = $this->_tpl_vars['secretary']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['secretary']):
?> 
			<strong><?php echo ((is_array($_tmp=$this->_tpl_vars['secretary']->getFullName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</strong><?php if ($this->_tpl_vars['secretary']->getLocalizedAffiliation()): ?>, <?php echo ((is_array($_tmp=$this->_tpl_vars['secretary']->getLocalizedAffiliation())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php endif; ?><br /> &#187; <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "about.contact.email"), $this);?>
: <?php if ($this->_tpl_vars['secretary']->getEmail()): ?><?php echo smarty_function_mailto(array('address' => ((is_array($_tmp=$this->_tpl_vars['secretary']->getEmail())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp))), $this);?>
<br /><?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
	</ol>
	</div>
<?php endif; ?>

<?php if (count ( $this->_tpl_vars['ercMembers'] ) > 0): ?>
<h4>Members</h4>
	<div id="ercMembers">
	<ol class="contact">
		<?php $_from = $this->_tpl_vars['ercMembers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ercMembers']):
?> 
			<strong><?php echo ((is_array($_tmp=$this->_tpl_vars['ercMembers']->getFullName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</strong><?php if ($this->_tpl_vars['ercMembers']->getLocalizedAffiliation()): ?>, <?php echo ((is_array($_tmp=$this->_tpl_vars['ercMembers']->getLocalizedAffiliation())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php endif; ?><br /> &#187; <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "about.contact.email"), $this);?>
: <?php if ($this->_tpl_vars['ercMembers']->getEmail()): ?><?php echo smarty_function_mailto(array('address' => ((is_array($_tmp=$this->_tpl_vars['ercMembers']->getEmail())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp))), $this);?>
<br /><?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
	</ol>
	</div>
<?php endif; ?>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php /* Smarty version 2.6.26, created on 2012-03-27 16:33:54
         compiled from form/select.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'form/select.tpl', 11, false),array('function', 'html_options_translate', 'form/select.tpl', 12, false),array('function', 'html_options', 'form/select.tpl', 12, false),)), $this); ?>

<select <?php echo $this->_tpl_vars['FBV_selectParams']; ?>
 class="field select"<?php if ($this->_tpl_vars['FBV_disabled']): ?> disabled="disabled"<?php endif; ?>>
	<?php if ($this->_tpl_vars['FBV_defaultValue'] !== null): ?><option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['FBV_defaultValue'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['FBV_defaultLabel'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</option><?php endif; ?>
	<?php if ($this->_tpl_vars['FBV_translate']): ?><?php echo $this->_plugins['function']['html_options_translate'][0][0]->smartyHtmlOptionsTranslate(array('options' => $this->_tpl_vars['FBV_from'],'selected' => $this->_tpl_vars['FBV_selected']), $this);?>
<?php else: ?><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['FBV_from'],'selected' => $this->_tpl_vars['FBV_selected']), $this);?>
<?php endif; ?>
</select>

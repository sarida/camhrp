<?php /* Smarty version 2.6.26, created on 2013-01-22 16:50:09
         compiled from sectionEditor/setDueDateForAll.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'sectionEditor/setDueDateForAll.tpl', 34, false),array('function', 'url', 'sectionEditor/setDueDateForAll.tpl', 36, false),array('modifier', 'escape', 'sectionEditor/setDueDateForAll.tpl', 40, false),array('modifier', 'date_format', 'sectionEditor/setDueDateForAll.tpl', 45, false),)), $this); ?>

<script type="text/javascript" src="http://localhost/camhrp-release1/camhrp/lib/pkp/js/lib/jquery/jquery.min.js"></script>
<script type="text/javascript" src="http://localhost/camhrp-release1/camhrp/lib/pkp/js/lib/jquery/plugins/jqueryUi.min.js"></script>

<?php echo ''; ?><?php $this->assign('pageTitle', "submission.dueDate"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<?php echo '
<script type="text/javascript" src="http://localhost/camhrp/lib/pkp/js/lib/jquery/jquery-ui-timepicker-addon.js"></script>
<style type="text/css" src="http://localhost/whorr/lib/pkp/styles/jquery-ui-timepicker-addon.css"></style>

<script type="text/javascript">
	$(document).ready(function() {
	$( "#dueDate" ).datepicker({changeMonth: true, dateFormat: \'yy-mm-dd\', changeYear: true, minDate: \'+0 d\'});
	});
</script>
'; ?>


<div id="setDueDate">
<h3>Due Date for reviewers to review Proposal <?php echo $this->_tpl_vars['submission']->getLocalizedWhoId(); ?>
</h3>

<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.designateDueDateDescription"), $this);?>
</p>

<form method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'setDueDateForAll','path' => $this->_tpl_vars['articleId']), $this);?>
">
	<table class="data" width="100%">
		<tr valign="top">
			<td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.todaysDate"), $this);?>
</td>
			<td class="value" width="80%"><?php echo ((is_array($_tmp=$this->_tpl_vars['todaysDate'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td>
		</tr>
		<tr valign="top">
			<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.requestedByDate"), $this);?>
</td>
			<td class="value">
				<input type="text" size="11" maxlength="10" name="dueDate" id="dueDate" value="<?php if ($this->_tpl_vars['dueDate']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['dueDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
<?php endif; ?>" class="textField" onfocus="this.form.numWeeks.value=''" />
				<span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.dueDateFormat"), $this);?>
</span>
			</td>
		</tr>
				 		
	</table>
<p><input type="submit" value="Set Due Date" class="button defaultButton" /> <input type="button" class="button" onclick="history.go(-1)" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.cancel"), $this);?>
" /></p>
</form>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

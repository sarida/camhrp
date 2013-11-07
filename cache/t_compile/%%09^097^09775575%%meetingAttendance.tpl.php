<?php /* Smarty version 2.6.26, created on 2012-04-03 15:40:59
         compiled from sectionEditor/reports/meetingAttendance.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'sectionEditor/reports/meetingAttendance.tpl', 15, false),array('function', 'translate', 'sectionEditor/reports/meetingAttendance.tpl', 15, false),array('function', 'fieldLabel', 'sectionEditor/reports/meetingAttendance.tpl', 25, false),array('function', 'html_checkboxes', 'sectionEditor/reports/meetingAttendance.tpl', 36, false),array('function', 'html_select_date', 'sectionEditor/reports/meetingAttendance.tpl', 59, false),)), $this); ?>

<?php echo ''; ?><?php $this->assign('pageTitle', "editor.reports.reportGenerator"); ?><?php echo ''; ?><?php $this->assign('pageCrumbTitle', "editor.reports.meetingAttendance"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<ul class="menu">
	<li><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'submissionsReport'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.submissions"), $this);?>
</a></li>
	<li class="current"><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'meetingAttendanceReport'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.meetingAttendance"), $this);?>
</a></li>
</ul>
<div class="separator"></div>

<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.meetingAttendance"), $this);?>
</h3>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/formErrors.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="meetingAttendance">
<form method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'meetingAttendanceReport'), $this);?>
">
	<p><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'ercMembers','required' => 'true','key' => "editor.reports.selectAtLeastOneErcMember"), $this);?>
</p>
	<table class="listing" width="100%">
		<tr><td colspan="2" class="headseparator">&nbsp;</td></tr>
		<tr class="heading" valign="bottom">
			<td width="5%">Select</input></td>
			<td width="95%">ERC Member</td>
		</tr>
		<tr><td colspan="2" class="headseparator">&nbsp;</td></tr>
		<p></p>
	<?php $_from = $this->_tpl_vars['members']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['member']):
?>
		<tr valign="top">
				<td><?php echo smarty_function_html_checkboxes(array('id' => 'ercMembers','name' => 'ercMembers','values' => $this->_tpl_vars['member']->getId(),'checked' => $this->_tpl_vars['ercMembers']), $this);?>
 </td>
				<td><?php echo $this->_tpl_vars['member']->getFullName(); ?>
</td>
		</tr>
		<tr>
			<td colspan="2" class="separator">&nbsp;</td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
	<tr>
		<td colspan="2" class="endseparator">&nbsp;</td>
	</tr>
	</table>


	<?php if (! $this->_tpl_vars['dateFrom']): ?>
	<?php $this->assign('dateFrom', "--"); ?>
	<?php endif; ?>
	
	<?php if (! $this->_tpl_vars['dateTo']): ?>
	<?php $this->assign('dateTo', "--"); ?>
	<?php endif; ?>

	<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.dateRange"), $this);?>
</p>
	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.between"), $this);?>

	<?php echo smarty_function_html_select_date(array('prefix' => 'dateFrom','time' => $this->_tpl_vars['dateFrom'],'all_extra' => "class=\"selectMenu\"",'year_empty' => "",'month_empty' => "",'day_empty' => "",'start_year' => "-5",'end_year' => "+1"), $this);?>

	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.and"), $this);?>

	<?php echo smarty_function_html_select_date(array('prefix' => 'dateTo','time' => $this->_tpl_vars['dateTo'],'all_extra' => "class=\"selectMenu\"",'year_empty' => "",'month_empty' => "",'day_empty' => "",'start_year' => "-5",'end_year' => "+1"), $this);?>

	<input type="hidden" name="dateToHour" value="23" />
	<input type="hidden" name="dateToMinute" value="59" />
	<input type="hidden" name="dateToSecond" value="59" />
	<input type="hidden" id="isValid" name="isValid" value="<?php echo $this->_tpl_vars['isValid']; ?>
" />
	<br/><br/>
	<input type="submit" name="generateMeetingAttendance" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.generateReport"), $this);?>
" class="button defaultButton" />
	<input type="button" class="button" onclick="history.go(-1)" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.cancel"), $this);?>
" />
</form>
</div>
<p><span class="formRequired"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.requiredField"), $this);?>
</span></p>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
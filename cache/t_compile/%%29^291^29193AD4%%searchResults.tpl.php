<?php /* Smarty version 2.6.26, created on 2013-01-25 12:57:23
         compiled from search/searchResults.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'search/searchResults.tpl', 21, false),array('function', 'url', 'search/searchResults.tpl', 59, false),array('function', 'html_select_date', 'search/searchResults.tpl', 62, false),array('modifier', 'escape', 'search/searchResults.tpl', 21, false),array('modifier', 'date_format', 'search/searchResults.tpl', 151, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "search.searchResults"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<script type="text/javascript">
<?php echo '
<!--
function ensureKeyword() {
	if (document.search.query.value == \'\') {
		alert('; ?>
'<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "search.noKeywordError"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'jsparam') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'jsparam'));?>
'<?php echo ');
		return false;
	}
	document.search.submit();
	return true;
}

function showExportOptions(){
	$(\'#exportOptions\').show();
	$(\'#showExportOptions\').hide();
	$(\'#hideExportOptions\').show();
}

function hideExportOptions(){
	$(\'#exportOptions\').hide();
	$(\'#hideExportOptions\').hide();
	$(\'#showExportOptions\').show();
}

$(document).ready(
	function (){
		$(\'#exportOptions\').hide();
		$(\'#hideExportOptions\').hide();
	}
);
// -->
'; ?>

</script>

<?php if (! $this->_tpl_vars['dateFrom']): ?>
<?php $this->assign('dateFrom', "--"); ?>
<?php endif; ?>

<?php if (! $this->_tpl_vars['dateTo']): ?>
<?php $this->assign('dateTo', "--"); ?>
<?php endif; ?>

<br/>
<form name="revise" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'advanced'), $this);?>
" method="post">
	<input type="hidden" name="query" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['query'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"/>
	<div style="display:none">
		<?php echo smarty_function_html_select_date(array('prefix' => 'dateFrom','time' => $this->_tpl_vars['dateFrom'],'all_extra' => "class=\"selectMenu\"",'year_empty' => "",'month_empty' => "",'day_empty' => "",'start_year' => "-5",'end_year' => "+1"), $this);?>

		<?php echo smarty_function_html_select_date(array('prefix' => 'dateTo','time' => $this->_tpl_vars['dateTo'],'all_extra' => "class=\"selectMenu\"",'year_empty' => "",'month_empty' => "",'day_empty' => "",'start_year' => "-5",'end_year' => "+1"), $this);?>

	</div>
</form>

<a href="javascript:document.revise.submit()" class="action"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "search.reviseSearch"), $this);?>
</a>&nbsp;&nbsp;
<a href="#top" onclick="showExportOptions()" class="action" id="showExportOptions">|  &nbsp;Export Search Results&nbsp;&nbsp;</a>
<a href="#top" onclick="hideExportOptions()" class="action" id="hideExportOptions">|  &nbsp;Hide Export Options</a><br />
<!--
<a href="javascript:document.generate.submit()" class="action">| Export Search Results</a><br />
-->
<form name="generate" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'generateCustomizedCSV'), $this);?>
" method="post"  id="exportOptions">
	<input type="hidden" name="query" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['query'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"/>
	<input type="hidden" name="province" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['province'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"/>
	<input type="hidden" name="statusFilter" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['statusFilter'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"/>
	<input type="hidden" name="dateFrom" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dateFrom'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"/>
	<input type="hidden" name="dateTo" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dateTo'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"/>
	
	<table class="data" width="100%">
	<tr><i><br />Please check fields you would like to export.<br /></i></tr>
	<tr>
	<td colspan="4" class="headseparator"></td>
	</tr>
	<tr>
	<td><br /><strong>Investigators :</strong></td>
	</tr>
	<tr valign="top">
		<td width="20%" class="value">
			<input type="checkbox" name="investigatorName" checked="checked"/>&nbsp;Investigator Name
		</td>
		<td width="20%" class="value">
			<input type="checkbox" name="investigatorAffiliation"/>&nbsp;Investigator Affiliation
		</td>
		<td width="20%" class="value">
			<!--<input type="checkbox" name="investigatorEmail"/>&nbsp;Investigator e-mail-->
		</td>
	</tr>
	<tr>
	<td colspan="4" class="separator"></td>
	</tr>
	<tr>
	<td><strong>Metadata :</strong></td>
	</tr>
	<tr valign="top">
		<td width="20%" class="value">
			<input type="checkbox" name="title" checked="checked"/>&nbsp;Title
		</td>
		<td width="20%" class="value">
			<input type="checkbox" name="researchField" checked="checked"/>&nbsp;Research Field
		</td>
		<td width="20%" class="value">
			<input type="checkbox" name="proposalType" checked="checked"/>&nbsp;Proposal Type
		</td>
	</tr>
	<tr valign="top">
		<td width="20%" class="value">
			<input type="checkbox" name="duration" checked="checked"/>&nbsp;Duration
		</td>
		<td width="20%" class="value">
			<input type="checkbox" name="area" checked="checked"/>&nbsp;Geographical Area
		</td>
		<td width="20%" class="value">
			<input type="checkbox" name="dataCollection"/>&nbsp;Data Collection
		</td>
	</tr>
	<tr valign="top">
		<td width="20%" class="value">
			<input type="checkbox" name="status" checked="checked"/>&nbsp;Status
		</td>
		<td width="20%" class="value">
			<input type="checkbox" name="primarySponsor" checked="checked"/>&nbsp;Primary Sponsor
		</td>
		<td width="20%" class="value"></td>
	</tr>
	<tr>
		<td colspan="2" class="value">
			<input type="checkbox" name="studentResearch" checked="checked"/>&nbsp;If student research, Institution & Academic Degree
		</td>
		<td></td>
		<td></td>
	</tr>
	<tr>
	<td colspan="4" class="endseparator">&nbsp;</td>
	</tr>
	</table>
	<p><input type="submit" value="Export" class="button defaultButton"/>
</form>

<br/>
<h4><?php if ($this->_tpl_vars['statusFilter'] == 1): ?>Complete Research:<br/><?php endif; ?><?php if ($this->_tpl_vars['statusFilter'] == 2): ?>Ongoing Research:<br/><?php endif; ?>Search <?php if ($this->_tpl_vars['query']): ?>for '<?php echo $this->_tpl_vars['query']; ?>
' <?php endif; ?><?php if ($this->_tpl_vars['dateFrom'] != '--'): ?> from <?php echo ((is_array($_tmp=$this->_tpl_vars['dateFrom'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>
<?php endif; ?> <?php if ($this->_tpl_vars['dateFrom'] != '--' && $this->_tpl_vars['dateTo'] != '--'): ?> and <?php endif; ?><?php if ($this->_tpl_vars['dateTo'] != '--'): ?> until <?php echo ((is_array($_tmp=$this->_tpl_vars['dateTo'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>
<?php endif; ?><?php if ($this->_tpl_vars['country']): ?> in <?php echo $this->_tpl_vars['country']; ?>
 <?php endif; ?> returned <?php echo $this->_tpl_vars['count']; ?>
 result(s). </h4>
<div id="results">
<table width="100%" class="listing">
<tr class="heading" valign="bottom">
		<!--<td><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => 'common.dateSubmitted'), $this);?>
</td>-->
		<td><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => 'article.title'), $this);?>
</td>
		<td><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => 'search.primarySponsor'), $this);?>
</td>
		<td><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => 'search.province'), $this);?>
</td>
		<td><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => 'search.researchField'), $this);?>
</td>
		<td>Dates of research</td>
		<td>Status</td>
</tr>
<tr>
	<td colspan="7" class="headseparator">&nbsp;</td>
</tr>
<p></p>
<?php $_from = $this->_tpl_vars['results']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['result']):
?>
<tr valign="bottom">
	<!--<td><?php echo ((is_array($_tmp=$this->_tpl_vars['result']->getDateSubmitted())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>
</td>-->
	<td><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'viewProposal','path' => $this->_tpl_vars['result']->getId()), $this);?>
" class="action"><?php echo ((is_array($_tmp=$this->_tpl_vars['result']->getLocalizedTitle())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a></td>
	<td>
	<?php if ($this->_tpl_vars['result']->getLocalizedPrimarySponsor() == 'Other'): ?>
		<?php echo $this->_tpl_vars['result']->getLocalizedOtherPrimarySponsor(); ?>

	<?php else: ?>
		<?php echo $this->_tpl_vars['result']->getLocalizedPrimarySponsorText(); ?>

	<?php endif; ?>
	</td>
	<td>
	<?php if ($this->_tpl_vars['result']->getLocalizedMultiCountryResearch() == 'Yes'): ?>
		Multi-country research
	<?php elseif ($this->_tpl_vars['result']->getLocalizedProposalCountry() == 'NW'): ?>
		Nationwide
	<?php else: ?>
		<?php echo $this->_tpl_vars['result']->getLocalizedProposalCountryText(); ?>

	<?php endif; ?>
	</td>
	<td><?php echo $this->_tpl_vars['result']->getLocalizedResearchFieldText(); ?>
</td>
	<td><?php echo $this->_tpl_vars['result']->getLocalizedStartDate(); ?>
 to <?php echo $this->_tpl_vars['result']->getLocalizedEndDate(); ?>
</td>
	<td><?php if ($this->_tpl_vars['result']->getStatus() == 11): ?>Complete<?php else: ?>Ongoing<?php endif; ?></td>
</tr>
<tr>
	<td colspan="7" class="separator">&nbsp;</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
<tr>
	<td colspan="7" class="endseparator">&nbsp;</td>
</tr>
</table>
</div>	

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

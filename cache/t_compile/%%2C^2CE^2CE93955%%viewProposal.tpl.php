<?php /* Smarty version 2.6.26, created on 2013-01-24 20:46:02
         compiled from search/viewProposal.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'search/viewProposal.tpl', 19, false),array('function', 'html_select_date', 'search/viewProposal.tpl', 22, false),array('function', 'translate', 'search/viewProposal.tpl', 26, false),array('function', 'icon', 'search/viewProposal.tpl', 49, false),array('modifier', 'escape', 'search/viewProposal.tpl', 20, false),array('modifier', 'concat', 'search/viewProposal.tpl', 47, false),array('modifier', 'to_array', 'search/viewProposal.tpl', 48, false),array('modifier', 'strip_tags', 'search/viewProposal.tpl', 48, false),array('modifier', 'assign', 'search/viewProposal.tpl', 48, false),array('modifier', 'nl2br', 'search/viewProposal.tpl', 61, false),array('modifier', 'default', 'search/viewProposal.tpl', 61, false),array('modifier', 'strip_unsafe_html', 'search/viewProposal.tpl', 92, false),)), $this); ?>

<?php echo ''; ?><?php $this->assign('pageTitle', "search.summary"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<?php if (! $this->_tpl_vars['dateFrom']): ?>
<?php $this->assign('dateFrom', "--"); ?>
<?php endif; ?>

<?php if (! $this->_tpl_vars['dateTo']): ?>
<?php $this->assign('dateTo', "--"); ?>
<?php endif; ?>

<?php $this->assign('cam', 'kh_CA'); ?>
<?php $this->assign('eng', 'en_US'); ?>

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
<!--<a href="javascript:document.generate.submit()" class="action">| Export Search Results</a><br />-->
<form name="generate" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'generateCSV'), $this);?>
" method="post">
	<input type="hidden" name="query" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['query'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"/>
	<div style="display:none">
		<?php echo smarty_function_html_select_date(array('prefix' => 'dateFrom','time' => $this->_tpl_vars['dateFrom'],'all_extra' => "class=\"selectMenu\"",'year_empty' => "",'month_empty' => "",'day_empty' => "",'start_year' => "-5",'end_year' => "+1"), $this);?>

		<?php echo smarty_function_html_select_date(array('prefix' => 'dateTo','time' => $this->_tpl_vars['dateTo'],'all_extra' => "class=\"selectMenu\"",'year_empty' => "",'month_empty' => "",'day_empty' => "",'start_year' => "-5",'end_year' => "+1"), $this);?>

	</div>
</form>

<div id="authors">
<h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.authors"), $this);?>
(s)</h4>
<table width="100%" class="data">
	<tr valign="top">
		<td width="50%">
			<table width="100%" class="data">
				<?php $_from = $this->_tpl_vars['submission']->getAuthors(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['authors'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['authors']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['author']):
        $this->_foreach['authors']['iteration']++;
?>
				<tr><td><br/></td></tr>
				<tr valign="top">
					<td width="40%" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.name"), $this);?>
</td>
					<td width="60%" class="value">
						<?php $this->assign('emailString', ((is_array($_tmp=$this->_tpl_vars['author']->getFullName())) ? $this->_run_mod_handler('concat', true, $_tmp, " <", $this->_tpl_vars['author']->getEmail(), ">") : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, " <", $this->_tpl_vars['author']->getEmail(), ">"))); ?>
						<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'user','op' => 'email','redirectUrl' => $this->_tpl_vars['currentUrl'],'to' => ((is_array($_tmp=$this->_tpl_vars['emailString'])) ? $this->_run_mod_handler('to_array', true, $_tmp) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp)),'subject' => ((is_array($_tmp=$this->_tpl_vars['submission']->getLocalizedTitle())) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)),'articleId' => $this->_tpl_vars['submission']->getId()), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'url') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'url'));?>

						<?php echo ((is_array($_tmp=$this->_tpl_vars['author']->getFullName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
 <?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'mail','url' => $this->_tpl_vars['url']), $this);?>

					</td>
				</tr>
				<?php if ($this->_tpl_vars['author']->getUrl()): ?>
					<tr valign="top">
						<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.url"), $this);?>
</td>
						<td class="value"><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['author']->getUrl())) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'quotes')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['author']->getUrl())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a></td>
					</tr>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['author']->getLocalizedAffiliation()): ?>
				<tr valign="top">
					<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.affiliation"), $this);?>
</td>
					<td class="value"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['author']->getAffiliation($this->_tpl_vars['eng']))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, "&mdash;") : smarty_modifier_default($_tmp, "&mdash;")); ?>
</td>
				</tr>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['author']->getCountryLocalized()): ?>
				<tr valign="top">
					<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.country"), $this);?>
</td>
					<td class="value"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['author']->getCountryLocalized())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, "&mdash;") : smarty_modifier_default($_tmp, "&mdash;")); ?>
</td>
				</tr>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			</table>
		</td>
		<td width="50%" align="center">
			<?php if ($this->_tpl_vars['submission']->getStatus() == 11): ?>
				<?php $_from = $this->_tpl_vars['suppFiles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['suppFiles'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['suppFiles']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['suppFile']):
        $this->_foreach['suppFiles']['iteration']++;
?>
					<?php if ($this->_tpl_vars['suppFile']->getType() == 'COMPLETION_REPORT'): ?>
						<br/><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'downloadFile','path' => ((is_array($_tmp=$this->_tpl_vars['submission']->getArticleId())) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['suppFile']->getFileId()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['suppFile']->getFileId()))), $this);?>
" class="file"><b><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "search.completionReport"), $this);?>
</b></a>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			<?php endif; ?>
		</td>
	</tr>
</table>
</div>

<div id="titleAndAbstract">
<h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "search.title"), $this);?>
</h4>

<table width="100%" class="data" id="title">
	<tr>
		<td width="20%" class="label"><br/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.scientificTitle"), $this);?>
</td>
		<td width="80%"><br/><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getLocalizedTitle())) ? $this->_run_mod_handler('strip_unsafe_html', true, $_tmp) : String::stripUnsafeHtml($_tmp)); ?>
</td>
	</tr>
</table>
<h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "search.abstract"), $this);?>
</h4>
<table width="100%" class="data" id="abstract">
	<tr valign="top">
		<td width="20%" class="label"><br/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "search.background"), $this);?>
</td>
		<td width="80%" class="value"><br/><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['submission']->getLocalizedBackground())) ? $this->_run_mod_handler('strip_unsafe_html', true, $_tmp) : String::stripUnsafeHtml($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, "&mdash;") : smarty_modifier_default($_tmp, "&mdash;")); ?>
</td>
	</tr>
	<tr valign="top">
		<td width="20%" class="label"><br/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "search.objectives"), $this);?>
</td>
		<td width="80%" class="value"><br/><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['submission']->getLocalizedObjectives())) ? $this->_run_mod_handler('strip_unsafe_html', true, $_tmp) : String::stripUnsafeHtml($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, "&mdash;") : smarty_modifier_default($_tmp, "&mdash;")); ?>
</td>
	</tr>
	<tr valign="top">
		<td width="20%" class="label"><br/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "search.studyMatters"), $this);?>
</td>
		<td width="80%" class="value"><br/><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['submission']->getLocalizedStudyMatters())) ? $this->_run_mod_handler('strip_unsafe_html', true, $_tmp) : String::stripUnsafeHtml($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, "&mdash;") : smarty_modifier_default($_tmp, "&mdash;")); ?>
</td>
	</tr>
	<tr valign="top">
		<td width="20%" class="label"><br/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "search.expectedOutcomes"), $this);?>
</td>
		<td width="80%" class="value"><br/><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['submission']->getLocalizedExpectedOutcomes())) ? $this->_run_mod_handler('strip_unsafe_html', true, $_tmp) : String::stripUnsafeHtml($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, "&mdash;") : smarty_modifier_default($_tmp, "&mdash;")); ?>
</td>
	</tr>
</table>
<h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.metadata"), $this);?>
</h4>
<table width="100%" class="data" id="metadata">
	<tr>
		<td width="20%" class="label"><br/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.status"), $this);?>
</td>
		<td width="80%"><br/><?php if ($this->_tpl_vars['submission']->getStatus() == 11): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.complete"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.ongoing"), $this);?>
<?php endif; ?></td>
	</tr>
	<tr>
		<td width="20%" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.id"), $this);?>
</td>
		<td width="80%"><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getWhoId($this->_tpl_vars['eng']))) ? $this->_run_mod_handler('strip_unsafe_html', true, $_tmp) : String::stripUnsafeHtml($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "search.startDateAbr"), $this);?>
</td>
		<td class="value"><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getStartDate($this->_tpl_vars['eng']))) ? $this->_run_mod_handler('strip_unsafe_html', true, $_tmp) : String::stripUnsafeHtml($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "search.endDateAbr"), $this);?>
</td>
		<td class="value"><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getEndDate($this->_tpl_vars['eng']))) ? $this->_run_mod_handler('strip_unsafe_html', true, $_tmp) : String::stripUnsafeHtml($_tmp)); ?>
</td>
	</tr>
	
	<?php if ($this->_tpl_vars['submission']->getLocalizedMultiCountryResearch() == 'Yes'): ?>
	<tr>
		<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "search.multiCountry"), $this);?>
</td>
		<td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedMultiCountryText(); ?>
</td>
	</tr>
	<?php endif; ?>
	<tr>
		<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => 'proposal.proposalCountry'), $this);?>
</td>
		<td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedProposalCountryText(); ?>
</td>
	</tr>
    <tr valign="top">
        <td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.withHumanSubjects"), $this);?>
</td>
        <td class="value">
        	<?php if (( $this->_tpl_vars['submission']->getWithHumanSubjects($this->_tpl_vars['eng']) ) == 'Yes'): ?>
        		<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>

        	<?php else: ?>
        		<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>

        	<?php endif; ?>
        </td>
    </tr>
    <?php if (( $this->_tpl_vars['submission']->getWithHumanSubjects($this->_tpl_vars['eng']) ) == 'Yes'): ?>
    <tr valign="top">
        <td class="label">&nbsp;</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedProposalTypeText(); ?>
</td>
    </tr>
    <?php endif; ?>
    <tr valign="top">
        <td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.researchField"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedResearchFieldText(); ?>
</td>
    </tr>
    
    <tr valign="top">
        <td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.primarySponsor"), $this);?>
</td>
        <td class="value">
        	<?php if ($this->_tpl_vars['submission']->getPrimarySponsor($this->_tpl_vars['eng'])): ?>
        		<?php echo $this->_tpl_vars['submission']->getLocalizedPrimarySponsorText(); ?>

        	<?php endif; ?>
        </td>
    </tr>
    <?php if ($this->_tpl_vars['submission']->getSecondarySponsors($this->_tpl_vars['eng'])): ?>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.secondarySponsors"), $this);?>
</td>
        <td class="value">
        	<?php if ($this->_tpl_vars['submission']->getLocalizedSecondarySponsors()): ?>
        		<?php echo $this->_tpl_vars['submission']->getLocalizedSecondarySponsorText(); ?>

        	<?php endif; ?>        
        </td>
    </tr>
    <?php endif; ?>

</table>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

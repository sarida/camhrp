<?php /* Smarty version 2.6.26, created on 2013-01-23 21:54:58
         compiled from reviewer/completed.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'reviewer/completed.tpl', 18, false),array('function', 'html_options_translate', 'reviewer/completed.tpl', 22, false),array('function', 'translate', 'reviewer/completed.tpl', 25, false),array('function', 'html_select_date', 'reviewer/completed.tpl', 35, false),array('function', 'html_options', 'reviewer/completed.tpl', 49, false),array('function', 'sort_heading', 'reviewer/completed.tpl', 65, false),array('function', 'page_info', 'reviewer/completed.tpl', 132, false),array('function', 'page_links', 'reviewer/completed.tpl', 133, false),array('modifier', 'escape', 'reviewer/completed.tpl', 29, false),array('modifier', 'date_format', 'reviewer/completed.tpl', 77, false),array('block', 'iterate', 'reviewer/completed.tpl', 72, false),)), $this); ?>
 <?php if (! $this->_tpl_vars['dateFrom']): ?>
<?php $this->assign('dateFrom', "--"); ?>
<?php endif; ?>

<?php if (! $this->_tpl_vars['dateTo']): ?>
<?php $this->assign('dateTo', "--"); ?>
<?php endif; ?>
 <form method="post" name="submit" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'index','path' => 'completed'), $this);?>
">
	<input type="hidden" name="sort" value="id"/>
	<input type="hidden" name="sortDirection" value="ASC"/>
	<select name="searchField" size="1" class="selectMenu">
		<?php echo $this->_plugins['function']['html_options_translate'][0][0]->smartyHtmlOptionsTranslate(array('options' => $this->_tpl_vars['fieldOptions'],'selected' => $this->_tpl_vars['searchField']), $this);?>

	</select>
	<select name="searchMatch" size="1" class="selectMenu">
		<option value="contains"<?php if ($this->_tpl_vars['searchMatch'] == 'contains'): ?> selected="selected"<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "form.contains"), $this);?>
</option>
		<option value="is"<?php if ($this->_tpl_vars['searchMatch'] == 'is'): ?> selected="selected"<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "form.is"), $this);?>
</option>
		<option value="startsWith"<?php if ($this->_tpl_vars['searchMatch'] == 'startsWith'): ?> selected="selected"<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "form.startsWith"), $this);?>
</option>
	</select>
	<input type="text" size="15" name="search" class="textField" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['search'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
	<br/>
	<select name="dateSearchField" size="1" class="selectMenu">
		<?php echo $this->_plugins['function']['html_options_translate'][0][0]->smartyHtmlOptionsTranslate(array('options' => $this->_tpl_vars['dateFieldOptions'],'selected' => $this->_tpl_vars['dateSearchField']), $this);?>

	</select>
	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.between"), $this);?>

	<?php echo smarty_function_html_select_date(array('prefix' => 'dateFrom','time' => $this->_tpl_vars['dateFrom'],'all_extra' => "class=\"selectMenu\"",'year_empty' => "",'month_empty' => "",'day_empty' => "",'start_year' => "-5",'end_year' => "+1"), $this);?>

	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.and"), $this);?>

	<?php echo smarty_function_html_select_date(array('prefix' => 'dateTo','time' => $this->_tpl_vars['dateTo'],'all_extra' => "class=\"selectMenu\"",'year_empty' => "",'month_empty' => "",'day_empty' => "",'start_year' => "-5",'end_year' => "+1"), $this);?>

	<input type="hidden" name="dateToHour" value="23" />
	<input type="hidden" name="dateToMinute" value="59" />
	<input type="hidden" name="dateToSecond" value="59" />
	<br/>
	
	<!-- Allows filtering by technical unit and country -->
	<!-- Added by: igm 9/24/2011                        -->
	<!--
	<h5>Filter by</h5>
	<select name="technicalUnitField" id="technicalUnit" class="selectMenu">
		<option value="">All Technical Units</option>
		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['technicalUnits'],'selected' => $this->_tpl_vars['technicalUnitField']), $this);?>

    </select>
	<select name="countryField" id="country" class="selectMenu">
		<option value="">All Countries</option>
		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['countries'],'selected' => $this->_tpl_vars['countryField']), $this);?>

    </select>-->
    <br/>
	<input type="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.search"), $this);?>
" class="button" />
</form>
<br/><br/><br/>
<div id="submissions">
<table class="listing" width="100%">
	<tr><td colspan="5"><strong>ARCHIVED PROPOSALS</strong></td></tr>
	<tr><td colspan="5" class="headseparator">&nbsp;</td></tr>
	<tr class="heading" valign="bottom">
		<td width="10%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.id"), $this);?>
</td>
		<td width="10%"><span class="disabled"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.date.mmdd"), $this);?>
</span><br /><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "common.assigned",'sort' => 'assignDate'), $this);?>
</td>
		<!-- <td width="5%"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "submissions.sec",'sort' => 'section'), $this);?>
</td> *} Commented out by MSB, Sept25,2011-->
		<td width="40%"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "article.title",'sort' => 'title'), $this);?>
</td>
		<td width="20%"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "submission.review",'sort' => 'review'), $this);?>
</td>
		<td width="20%"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "submission.editorDecision",'sort' => 'decision'), $this);?>
</td>
	</tr>
	<tr><td colspan="5" class="headseparator">&nbsp;</td></tr>
<?php $this->_tag_stack[] = array('iterate', array('from' => 'submissions2','item' => 'submission')); $_block_repeat=true;$this->_plugins['block']['iterate'][0][0]->smartyIterate($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
	<?php $this->assign('articleId', $this->_tpl_vars['submission']->getLocalizedWhoId()); ?>
	<?php $this->assign('reviewId', $this->_tpl_vars['submission']->getReviewId()); ?>
	<tr valign="top">
		<td width="10%"><?php echo ((is_array($_tmp=$this->_tpl_vars['articleId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td>
		<td width="10%"><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getDateNotified())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>
</td>
		<!--  Commented out by MSB,Sept25,2011-->
		<td width="40%"><?php if (! $this->_tpl_vars['submission']->getDeclined()): ?><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'submission','path' => $this->_tpl_vars['reviewId']), $this);?>
" class="action"><?php endif; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getLocalizedTitle())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php if (! $this->_tpl_vars['submission']->getDeclined()): ?></a><?php endif; ?></td>
		<td width="20%">
			<?php if ($this->_tpl_vars['submission']->getCancelled()): ?>
				Canceled
			<?php elseif ($this->_tpl_vars['submission']->getDeclined()): ?>
				Declined
			<?php else: ?>
				<?php $this->assign('recommendation', $this->_tpl_vars['submission']->getRecommendation()); ?>
				<?php if ($this->_tpl_vars['recommendation'] === '' || $this->_tpl_vars['recommendation'] === null): ?>
					&mdash;
				<?php else: ?>
					<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => $this->_tpl_vars['reviewerRecommendationOptions'][$this->_tpl_vars['recommendation']]), $this);?>

				<?php endif; ?>
			<?php endif; ?>
		</td>
		<td width="20%">
									<?php $this->assign('round', $this->_tpl_vars['submission']->getRound()); ?>
			<?php $this->assign('decisions', $this->_tpl_vars['submission']->getDecisions($this->_tpl_vars['round'])); ?>
			<?php $_from = $this->_tpl_vars['decisions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lastDecisionFinder'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lastDecisionFinder']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['decision']):
        $this->_foreach['lastDecisionFinder']['iteration']++;
?>
				<?php if (($this->_foreach['lastDecisionFinder']['iteration'] == $this->_foreach['lastDecisionFinder']['total']) && $this->_tpl_vars['decision']['decision'] == SUBMISSION_EDITOR_DECISION_ACCEPT): ?>
					<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.decision.accept"), $this);?>

				<?php elseif (($this->_foreach['lastDecisionFinder']['iteration'] == $this->_foreach['lastDecisionFinder']['total']) && $this->_tpl_vars['decision']['decision'] == SUBMISSION_EDITOR_DECISION_PENDING_REVISIONS): ?>
					<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.decision.pendingRevisions"), $this);?>

				<?php elseif (($this->_foreach['lastDecisionFinder']['iteration'] == $this->_foreach['lastDecisionFinder']['total']) && $this->_tpl_vars['decision']['decision'] == SUBMISSION_EDITOR_DECISION_RESUBMIT): ?>
					<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.decision.resubmit"), $this);?>

				<?php elseif (($this->_foreach['lastDecisionFinder']['iteration'] == $this->_foreach['lastDecisionFinder']['total']) && $this->_tpl_vars['decision']['decision'] == SUBMISSION_EDITOR_DECISION_DECLINE): ?>
					<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.decision.decline"), $this);?>

				<?php else: ?>
					&mdash;
				<?php endif; ?>
			<?php endforeach; else: ?>
				&mdash;
			<?php endif; unset($_from); ?>
					</td>
	</tr>
	<tr>
		<td colspan="5" class="<?php if ($this->_tpl_vars['submissions2']->eof()): ?>end<?php endif; ?>separator">&nbsp;</td>
	</tr>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_plugins['block']['iterate'][0][0]->smartyIterate($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php if ($this->_tpl_vars['submissions2']->wasEmpty()): ?>
	<tr>
		<td colspan="5" class="nodata"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submissions.noSubmissions"), $this);?>
</td>
	</tr>
	<tr>
		<td colspan="5" class="endseparator">&nbsp;</td>
	</tr>
<?php else: ?>
	<tr>
		<td colspan="4" align="left"><?php echo $this->_plugins['function']['page_info'][0][0]->smartyPageInfo(array('iterator' => $this->_tpl_vars['submissions2']), $this);?>
</td>
		<td colspan="3" align="right"><?php echo $this->_plugins['function']['page_links'][0][0]->smartyPageLinks(array('anchor' => 'submissions','name' => 'submissions','iterator' => $this->_tpl_vars['submissions2'],'sort' => $this->_tpl_vars['sort'],'sortDirection' => $this->_tpl_vars['sortDirection']), $this);?>
</td>
	</tr>
<?php endif; ?>
</table>
</div>


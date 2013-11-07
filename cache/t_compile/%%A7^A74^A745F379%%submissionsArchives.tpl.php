<?php /* Smarty version 2.6.26, created on 2012-08-16 00:27:42
         compiled from sectionEditor/submissionsArchives.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sort_heading', 'sectionEditor/submissionsArchives.tpl', 16, false),array('function', 'url', 'sectionEditor/submissionsArchives.tpl', 31, false),array('function', 'translate', 'sectionEditor/submissionsArchives.tpl', 39, false),array('modifier', 'escape', 'sectionEditor/submissionsArchives.tpl', 28, false),array('modifier', 'date_format', 'sectionEditor/submissionsArchives.tpl', 29, false),array('modifier', 'truncate', 'sectionEditor/submissionsArchives.tpl', 30, false),)), $this); ?>
<div id="submissions">
<table class="listing" width="100%">
	<tr><td class="headseparator" colspan="<?php if ($this->_tpl_vars['statViews']): ?>7<?php else: ?>6<?php endif; ?>">&nbsp;</td></tr>
	<tr valign="bottom" class="heading">
		<td width="5%">Proposal ID</td>
		<td width="5%"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "submissions.submit",'sort' => 'submitDate'), $this);?>
</td>
		<td width="23%"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "article.authors",'sort' => 'authors'), $this);?>
</td>
		<td width="32%"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "article.title",'sort' => 'title'), $this);?>
</td>
		<?php if ($this->_tpl_vars['statViews']): ?><td width="5%"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "submission.views",'sort' => 'views'), $this);?>
</td><?php endif; ?>
		<td width="25%" align="right"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "common.status",'sort' => 'status'), $this);?>
</td>
	</tr>
	<tr><td colspan="6" class="headseparator">&nbsp;</td></tr>

<?php $_from = $this->_tpl_vars['submissions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['submission']):
?>
	<?php $this->assign('articleId', $this->_tpl_vars['submission']->getArticleId()); ?>
        <?php $this->assign('whoId', $this->_tpl_vars['submission']->getWhoId($this->_tpl_vars['submission']->getLocale())); ?>
	<tr valign="top">
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['whoId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getDateSubmitted())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>
</td>
	   	<td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['submission']->getFirstAuthor(true))) ? $this->_run_mod_handler('truncate', true, $_tmp, 40, "...") : $this->_plugins['modifier']['truncate'][0][0]->smartyTruncate($_tmp, 40, "...")))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td> <!-- Get first author. Added by MSB, Sept 25, 2011 -->
        <td><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'submissionReview','path' => $this->_tpl_vars['articleId']), $this);?>
" class="action"><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getLocalizedTitle())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a></td>
		<td align="right">
			<?php $this->assign('status', $this->_tpl_vars['submission']->getSubmissionStatus()); ?>
			<?php if ($this->_tpl_vars['status'] == PROPOSAL_STATUS_ARCHIVED): ?>
				<?php $this->assign('statusKey', $this->_tpl_vars['submission']->getEditorDecisionKey()); ?>				
			<?php else: ?>
				<?php $this->assign('statusKey', $this->_tpl_vars['submission']->getProposalStatusKey()); ?>			
			<?php endif; ?>
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => $this->_tpl_vars['statusKey']), $this);?>

		</td>
	</tr>
	<tr>
		<td colspan="6" class="separator">&nbsp;</td>
	</tr>
<?php endforeach; else: ?>
	<tr>
		<td colspan="6" class="nodata"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submissions.noSubmissions"), $this);?>
</td>
	</tr>
<?php endif; unset($_from); ?>
		
</table>
</div>

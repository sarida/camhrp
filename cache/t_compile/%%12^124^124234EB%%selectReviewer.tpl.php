<?php /* Smarty version 2.6.26, created on 2013-01-23 20:57:12
         compiled from sectionEditor/selectReviewer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'sectionEditor/selectReviewer.tpl', 29, false),array('function', 'url', 'sectionEditor/selectReviewer.tpl', 33, false),array('modifier', 'escape', 'sectionEditor/selectReviewer.tpl', 57, false),array('modifier', 'to_array', 'sectionEditor/selectReviewer.tpl', 59, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "user.role.reviewers"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<script type="text/javascript">
<?php echo '
<!--
function sortSearch(heading, direction) {
  document.submit.sort.value = heading;
  document.submit.sortDirection.value = direction;
  document.submit.submit() ;
}
// -->
'; ?>

</script>

<div id="selectReviewer">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.selectReviewer"), $this);?>
</h3>
<table class="listing">
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr colspan="2">			
		<td colspan="3"><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'createExternalReviewer','path' => $this->_tpl_vars['articleId']), $this);?>
" class="action">Create IRB Member</a></td>		
	</tr>
	<tr><td colspan="3">&nbsp;</td></tr>
	<tr><td colspan="3" class="headseparator">&nbsp;</td></tr>
	<tr>
		<!--<td width="20%" class="heading">Role</td>-->
		<td width="30%" class="heading" align="left"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.name",'sort' => 'reviewerName'), $this);?>
</td>	
		<td width="50%" class="heading" align="left">Reviewing interest(s)</td>
		<td width="20%" class="heading" align="left"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.action"), $this);?>
</td>
	</tr>	
	<tr><td colspan="3" class="headseparator">&nbsp;</td></tr>
	<?php $this->assign('count', 0); ?>
	<?php $_from = $this->_tpl_vars['unassignedReviewers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ercMember']):
?>
		<?php if ($this->_tpl_vars['ercMember']->isLocalizedExternalReviewer() == 'Yes'): ?>
			<?php $this->assign('count', $this->_tpl_vars['count']+1); ?>
			<?php $this->assign('reviewerId', $this->_tpl_vars['ercMember']->getId()); ?>
			<tr>
				<!--<td width="20%" class="heading">
					<?php if ($this->_tpl_vars['ercMember']->isLocalizedExternalReviewer() == null || $this->_tpl_vars['ercMember']->isLocalizedExternalReviewer() != 'Yes'): ?>
						NECHR Member
					<?php else: ?>
						IRB Member
					<?php endif; ?>
				</td>-->
				<td width="30%"><?php echo ((is_array($_tmp=$this->_tpl_vars['ercMember']->getFullname())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td>	
				<td width="50%"><?php echo ((is_array($_tmp=$this->_tpl_vars['ercMember']->getInterests())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td>	
				<td width="20%"><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'selectReviewer','path' => ((is_array($_tmp=$this->_tpl_vars['articleId'])) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['reviewerId']) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['reviewerId']))), $this);?>
" class="action">Add and Notify</a></td>
			</tr>			
			<tr><td colspan="3" class="separator">&nbsp;</td></tr>
		<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	<?php if ($this->_tpl_vars['count'] == 0): ?>
		<tr>
			<td colspan="3" class="nodata">No unassigned IRB Members</td>
		</tr>
		<tr>
			<td colspan="3" class="endseparator">&nbsp;</td>
		</tr>
	<?php else: ?>
		<tr>
			<td colspan="3" class="endseparator">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3" align="left"><?php echo $this->_tpl_vars['count']; ?>
 unassigned IRB Member(s)</td>
		</tr>
	<?php endif; ?>
</table>

<p><a class="action" href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'submissionReview','path' => $this->_tpl_vars['articleId']), $this);?>
 class="action"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.backToReview"), $this);?>
</a></p>



</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

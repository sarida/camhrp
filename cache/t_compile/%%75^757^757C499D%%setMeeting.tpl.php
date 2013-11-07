<?php /* Smarty version 2.6.26, created on 2012-05-08 13:47:10
         compiled from sectionEditor/meetings/setMeeting.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'sectionEditor/meetings/setMeeting.tpl', 14, false),array('modifier', 'escape', 'sectionEditor/meetings/setMeeting.tpl', 61, false),array('modifier', 'date_format', 'sectionEditor/meetings/setMeeting.tpl', 62, false),array('modifier', 'truncate', 'sectionEditor/meetings/setMeeting.tpl', 65, false),array('modifier', 'strip_unsafe_html', 'sectionEditor/meetings/setMeeting.tpl', 66, false),array('function', 'url', 'sectionEditor/meetings/setMeeting.tpl', 26, false),array('function', 'translate', 'sectionEditor/meetings/setMeeting.tpl', 26, false),array('function', 'fieldLabel', 'sectionEditor/meetings/setMeeting.tpl', 36, false),array('function', 'sort_heading', 'sectionEditor/meetings/setMeeting.tpl', 42, false),array('function', 'html_checkboxes', 'sectionEditor/meetings/setMeeting.tpl', 60, false),)), $this); ?>

<?php echo ''; ?><?php $this->assign('pageTitle', "editor.meetings.setMeeting"); ?><?php echo ''; ?><?php $this->assign('pageCrumbTitle', "editor.meetings.setMeeting"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<script type="text/javascript" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['baseUrl'])) ? $this->_run_mod_handler('cat', true, $_tmp, "/lib/pkp/js/lib/jquery/jquery-ui-timepicker-addon.js") : smarty_modifier_cat($_tmp, "/lib/pkp/js/lib/jquery/jquery-ui-timepicker-addon.js")); ?>
"></script>
<style type="text/css" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['baseUrl'])) ? $this->_run_mod_handler('cat', true, $_tmp, "/lib/pkp/styles/jquery-ui-timepicker-addon.css") : smarty_modifier_cat($_tmp, "/lib/pkp/styles/jquery-ui-timepicker-addon.css")); ?>
"></style>

<?php echo '
<script type="text/javascript">
$(document).ready(function() {
	$( "#meetingDate" ).datetimepicker({changeMonth: true, changeYear: true, dateFormat: \'yy-mm-dd\', minDate: \'+0 d\', ampm:true});
});
</script>
'; ?>


<ul class="menu">
	<li><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'meetings'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings"), $this);?>
</a></li>
	<li class="current"><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'setMeeting'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings.setMeeting"), $this);?>
</a></li>
</ul>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/formErrors.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="separator"></div>
<br>
<div id="submissions">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings.submissions"), $this);?>
</h3>
<form method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'setMeeting','path' => $this->_tpl_vars['meetingId']), $this);?>
" >
<p><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'selectedProposals','required' => 'true','key' => "editor.meetings.addProposalsToDiscuss"), $this);?>
</p>
<table class="listing" width="100%">
	<tr><td colspan="7" class="headseparator">&nbsp;</td></tr>
	<tr class="heading" valign="bottom">
		<td width="5%">Select</input></td>
		<td width="15%">WHO Proposal ID</td>
		<td width="5%"><span class="disabled"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.date.mmdd"), $this);?>
</span><br /><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "submissions.submit",'sort' => 'submitDate'), $this);?>
</td>
		<!-- <td width="5%"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "submissions.sec",'sort' => 'section'), $this);?>
</td> Commented out by MSB, Sept25,2011-->
		<td width="20%"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "article.authors",'sort' => 'authors'), $this);?>
</td>
		<td width="25%"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "article.title",'sort' => 'title'), $this);?>
</td>
		<td width="25%" align="right"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "common.status",'sort' => 'status'), $this);?>
</td>
	</tr>
	<tr><td colspan="7" class="headseparator">&nbsp;</td></tr>
	<p></p>
<?php $this->assign('count', 0); ?>
<?php $_from = $this->_tpl_vars['submissions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['submission']):
?>
<?php $this->assign('status', $this->_tpl_vars['submission']->getSubmissionStatus()); ?>
<?php $this->assign('decision', $this->_tpl_vars['submission']->getMostRecentDecision()); ?>

<?php if (( $this->_tpl_vars['status'] != PROPOSAL_STATUS_DRAFT && $this->_tpl_vars['status'] != PROPOSAL_STATUS_REVIEWED && $this->_tpl_vars['status'] != PROPOSAL_STATUS_EXEMPTED ) || $this->_tpl_vars['decision'] == SUBMISSION_EDITOR_DECISION_RESUBMIT): ?>
<?php $this->assign('articleId', $this->_tpl_vars['submission']->getArticleId()); ?>
<?php $this->assign('whoId', $this->_tpl_vars['submission']->getWhoId($this->_tpl_vars['submission']->getLocale())); ?>
<?php $this->assign('count', $this->_tpl_vars['count']+1); ?>
	<tr valign="top">
			<td><?php echo smarty_function_html_checkboxes(array('id' => 'selectedProposals','name' => 'selectedProposals','values' => $this->_tpl_vars['submission']->getId(),'checked' => $this->_tpl_vars['selectedProposals']), $this);?>
 </td>
			<td><?php if ($this->_tpl_vars['whoId']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['whoId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php else: ?>&mdash;<?php endif; ?></td>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getDateSubmitted())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatTrunc']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatTrunc'])); ?>
</td>
			<!--  -->
			<!--   Commented out by MSB -->
   			<td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['submission']->getFirstAuthor(true))) ? $this->_run_mod_handler('truncate', true, $_tmp, 40, "...") : $this->_plugins['modifier']['truncate'][0][0]->smartyTruncate($_tmp, 40, "...")))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td> <!-- Get first author. Added by MSB, Sept 25, 2011 -->		
   			<td><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'submissionReview','path' => $this->_tpl_vars['submission']->getId()), $this);?>
" class="action"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['submission']->getLocalizedTitle())) ? $this->_run_mod_handler('strip_unsafe_html', true, $_tmp) : String::stripUnsafeHtml($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 40, "...") : $this->_plugins['modifier']['truncate'][0][0]->smartyTruncate($_tmp, 40, "...")); ?>
</a></td>
			<td align="right">
				<?php $this->assign('proposalStatusKey', $this->_tpl_vars['submission']->getProposalStatusKey()); ?>
				<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => $this->_tpl_vars['proposalStatusKey']), $this);?>

			</td>
	</tr>
<tr>
<td colspan="7" class="separator">&nbsp;</td>
</tr>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['count'] == 0): ?>
<tr>
<td colspan="7" class="nodata"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submissions.noSubmissions"), $this);?>
</td>
</tr>
<tr>
<td colspan="7" class="endseparator">&nbsp;</td>
</tr>
<?php else: ?>
<tr>
<td colspan="7" class="endseparator">&nbsp;</td>
</tr>
<tr>
<td colspan="7" align="left"><?php echo $this->_tpl_vars['count']; ?>
 submission(s)</td>
</tr>
<tr>
<td colspan="7"> &nbsp;</td>
</tr>


<tr valign="top">
<td colspan="7"><h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.designateMeetingDate"), $this);?>
</h3></td>
</tr>
<tr valign="top">
<td colspan="7"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.designateMeetingDateDescription"), $this);?>
</td>
</tr>
<tr valign="top">
<td width="20%" colspan="2" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'meetingDate','required' => 'true','key' => "editor.article.meetingDate"), $this);?>
</td>
<td width="80%" colspan="5" class="value"><input type="text" class="textField" name="meetingDate" id="meetingDate" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['meetingDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %I:%M %p") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %I:%M %p")); ?>
" size="20" maxlength="255" /></td>
</tr>
<?php endif; ?>
</table>

<p> <?php if ($this->_tpl_vars['meetingId'] == 0): ?>
		<input type="submit" name="saveMeeting" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.save"), $this);?>
" class="button defaultButton" />
	<?php else: ?>
		<input type="submit" name="saveMeeting" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.save"), $this);?>
" class="button defaultButton" onclick="ans=confirm('Do you want to save the changes?'); if(ans) document.location.href='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'saveMeeting','path' => $this->_tpl_vars['meetingId']), $this);?>
'" />
	<?php endif; ?> 
 	  <input type="button" class="button" onclick="history.go(-1)" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.back"), $this);?>
" />
 	  </p>
</form>
<p><span class="formRequired"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.requiredField"), $this);?>
</span></p>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php /* Smarty version 2.6.26, created on 2012-05-11 22:13:27
         compiled from sectionEditor/meetings/viewMeeting.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'sectionEditor/meetings/viewMeeting.tpl', 15, false),array('function', 'translate', 'sectionEditor/meetings/viewMeeting.tpl', 15, false),array('function', 'sort_heading', 'sectionEditor/meetings/viewMeeting.tpl', 46, false),array('modifier', 'date_format', 'sectionEditor/meetings/viewMeeting.tpl', 31, false),array('modifier', 'escape', 'sectionEditor/meetings/viewMeeting.tpl', 57, false),array('modifier', 'truncate', 'sectionEditor/meetings/viewMeeting.tpl', 61, false),array('modifier', 'strip_unsafe_html', 'sectionEditor/meetings/viewMeeting.tpl', 62, false),array('modifier', 'count', 'sectionEditor/meetings/viewMeeting.tpl', 80, false),)), $this); ?>

<?php echo ''; ?><?php $this->assign('pageTitle', "editor.meetings.viewMeeting"); ?><?php echo ''; ?><?php $this->assign('pageCrumbTitle', "editor.meetings.viewMeeting"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<ul class="menu">
	<li><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'meetings'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings"), $this);?>
</a></li>
	<li><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'setMeeting'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings.setMeeting"), $this);?>
</a></li>
</ul>

<div class="separator"></div>
<br/>
<div id="details">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.meetings.details"), $this);?>
</h3>
<div class="separator"></div>
<table width="100%" class="data">
	<tr valign="top">
		<td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings.meetingId"), $this);?>
</td>
		<td class="value" width="80%"><?php echo $this->_tpl_vars['meeting']->getId(); ?>
</td>
	</tr>
	<tr valign="top">
		<td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings.meetingDate"), $this);?>
</td>
		<td class="value" width="80%"><?php echo ((is_array($_tmp=$this->_tpl_vars['meeting']->getDate())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %I:%M %p") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %I:%M %p")); ?>
</td>
	</tr>
	<tr valign="top">
		<td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.status"), $this);?>
</td>
		<td class="value" width="80%"><?php echo $this->_tpl_vars['meeting']->getStatusKey(); ?>
</td>
	</tr>
</table>
</div>
<br>
<div id="submissions">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings.submissions"), $this);?>
</h3>
<table width="100%" class="listing">
	<tr><td colspan="6" class="headseparator">&nbsp;</td></tr>
	<tr class="heading" valign="bottom">
		<td width="10%">WHO Proposal ID</td>
		<td width="5%"><span class="disabled"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.date.mmdd"), $this);?>
</span><br /><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "submissions.submit",'sort' => 'submitDate'), $this);?>
</td>
		<!-- <td width="5%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submissions.sec"), $this);?>
</td> Commented out by MSB, Sept25,2011-->
		<td width="25%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.authors"), $this);?>
</td>
		<td width="35%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.title"), $this);?>
</td>
		<td width="25%" align="right"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.status"), $this);?>
</td>
	</tr>
	<tr><td colspan="6" class="headseparator">&nbsp;</td></tr>
	
	<?php $_from = $this->_tpl_vars['submissions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['submission']):
?>
	<?php $this->assign('whoId', $this->_tpl_vars['submission']->getWhoId($this->_tpl_vars['submission']->getLocale())); ?>
	<tr valign="top">
		<td><?php if ($this->_tpl_vars['whoId']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['whoId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php else: ?>&mdash;<?php endif; ?></td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getDateSubmitted())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatTrunc']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatTrunc'])); ?>
</td>
		<!--  -->
		<!--   Commented out by MSB -->
   		<td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['submission']->getFirstAuthor(true))) ? $this->_run_mod_handler('truncate', true, $_tmp, 40, "...") : $this->_plugins['modifier']['truncate'][0][0]->smartyTruncate($_tmp, 40, "...")))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td> <!-- Get first author. Added by MSB, Sept 25, 2011 -->		
   		<td><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'submission','path' => $this->_tpl_vars['submission']->getId()), $this);?>
" class="action"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['submission']->getLocalizedTitle())) ? $this->_run_mod_handler('strip_unsafe_html', true, $_tmp) : String::stripUnsafeHtml($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 40, "...") : $this->_plugins['modifier']['truncate'][0][0]->smartyTruncate($_tmp, 40, "...")); ?>
</a></td>
		<td align="right">
			<?php $this->assign('proposalStatusKey', $this->_tpl_vars['submission']->getProposalStatusKey()); ?>
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => $this->_tpl_vars['proposalStatusKey']), $this);?>

		</td>
	</tr>
	<tr><td colspan="6" class="separator"></td></tr>
	<?php endforeach; endif; unset($_from); ?>
	
	<?php if (empty ( $this->_tpl_vars['submissions'] )): ?>
	<tr>
		<td colspan="6" class="nodata"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submissions.noSubmissions"), $this);?>
</td>
	</tr>
	<?php endif; ?>
	<tr>
		<td colspan="6" class="endseparator">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="6" align="left"><?php echo count($this->_tpl_vars['submissions']); ?>
 submission(s)</td>
	</tr>
</table>
</div>
<br>
<div id="reviewers">
	<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings.reviewers"), $this);?>
</h3>
	<table class="listing" width="100%">
		<tr><td colspan="3" class="headseparator" ></td></tr>
		<tr class="heading" valign="bottom">
			<td width="30%"> <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings.reviewer.name"), $this);?>
</td>
			<td width="50%"> <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings.reviewer.reply"), $this);?>
 </td>
			<td width="20%" align="right"> <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings.reviewer.replyStatus"), $this);?>
 </td>
		</tr>
		<tr><td colspan="3" class="headseparator" ></td></tr>
		<?php $this->assign('attendingReviewers', 0); ?>
		<?php $this->assign('notAttendingReviewers', 0); ?>
		<?php $this->assign('undecidedReviewers', 0); ?>
		<?php $_from = $this->_tpl_vars['reviewers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['reviewer']):
?>
		<tr>
			<td width="30%">
				<?php echo $this->_tpl_vars['reviewer']->getSalutation(); ?>
 &nbsp; <?php echo $this->_tpl_vars['reviewer']->getFirstName(); ?>
 &nbsp; <?php echo $this->_tpl_vars['reviewer']->getLastName(); ?>

				<br/>
				<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'remindReviewersMeeting','meetingId' => $this->_tpl_vars['meeting']->getId(),'reviewerId' => $this->_tpl_vars['reviewer']->getReviewerId()), $this);?>
" class="action">Send Reminder</a>
				<?php echo ((is_array($_tmp=$this->_tpl_vars['reviewer']->getDateReminded())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>

			</td>
			<td width="50%"><?php echo $this->_tpl_vars['reviewer']->getRemarks(); ?>
</td>
			<td width="20%" align="right"><?php echo $this->_tpl_vars['reviewer']->getReplyStatus(); ?>
</td>

			<?php if ($this->_tpl_vars['reviewer']->getIsAttending() == 1): ?>
				<span style="display:none"><?php echo $this->_tpl_vars['attendingReviewers']++; ?>
</span> 
			<?php elseif ($this->_tpl_vars['reviewer']->getIsAttending() == 2): ?>
				<span style="display:none"><?php echo $this->_tpl_vars['notAttendingReviewers']++; ?>
</span> 
			<?php else: ?>
				<span style="display:none"><?php echo $this->_tpl_vars['undecidedReviewers']++; ?>
</span> 
			<?php endif; ?>
		</tr>
		<tr>
		<td colspan="3" class="separator"></td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
		<?php if (empty ( $this->_tpl_vars['reviewers'] )): ?>
		<tr>
			<td colspan="3" class="nodata"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings.reviewer.noReviewers"), $this);?>
</td>
		</tr>
		<?php endif; ?>
		<tr>
			<td colspan="3" class="endseparator">&nbsp;</td>
		</tr>
		<?php if (! empty ( $this->_tpl_vars['reviewers'] )): ?>
		<tr>
			<td colspan="3" align="left"><?php echo count($this->_tpl_vars['reviewers']); ?>
 reviewers(s)</td>
		</tr>
		<?php endif; ?>
	</table>
</div>
<br>
<div>
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings.tentativeAttendance"), $this);?>
</h3>
<div class="separator"></div>
<table width="100%" class="data">
	<tr valign="top">
		<td class="label" width="40%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings.numberOfAttendingReviewers"), $this);?>
</td>
		<td class="value" width="60%"><?php echo $this->_tpl_vars['attendingReviewers']; ?>
</td>
	</tr>
	<tr valign="top">
		<td class="label" width="40%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings.numberOfNotAttendingReviewers"), $this);?>
</td>
		<td class="value" width="60%"><?php echo $this->_tpl_vars['notAttendingReviewers']; ?>
</td>
	</tr>
	<tr valign="top">
		<td class="label" width="40%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings.numberOfUndecidedReviewers"), $this);?>
</td>
		<td class="value" width="60%"><?php echo $this->_tpl_vars['undecidedReviewers']; ?>
</td>
	</tr>
</table>
</div>
<p> <?php if ($this->_tpl_vars['meeting']->getStatus() == 1): ?>
    <input type="button" value="Upload Minutes" class="button defaultButton" onclick="document.location.href='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'uploadMinutes','path' => $this->_tpl_vars['meeting']->getId()), $this);?>
'"/> 
	<input type="button" value="Cancel Meeting" class="button" onclick="ans=confirm('This cannot be undone. Do you want to proceed?'); if(ans) document.location.href='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'notifyReviewersCancelMeeting','path' => $this->_tpl_vars['meeting']->getId()), $this);?>
'" />
	<?php else: ?>
		<?php if ($this->_tpl_vars['meeting']->getStatus() == 2 || $this->_tpl_vars['meeting']->getStatus() == 4): ?>
		<input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.setFinal"), $this);?>
" class="button defaultButton" onclick="ans=confirm('This cannot be undone. Do you want to proceed?'); if(ans) document.location.href='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'setMeetingFinal','path' => $this->_tpl_vars['meeting']->getId()), $this);?>
'" />
	    <input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.edit"), $this);?>
" class="button defaultButton" onclick="document.location.href='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'setMeeting','path' => $this->_tpl_vars['meeting']->getId()), $this);?>
'" />
	   	<?php endif; ?>
	   	<?php if ($this->_tpl_vars['meeting']->getStatus() == 5): ?>
		<input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.minutes.downloadMinutes"), $this);?>
" class="button defaultButton" onclick="document.location.href='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'downloadMinutes','path' => $this->_tpl_vars['meeting']->getId()), $this);?>
'" />
	   	<?php endif; ?>
   	<?php endif; ?>
   	<input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.back"), $this);?>
" class="button" onclick="document.location.href='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'meetings'), $this);?>
'" />
	
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
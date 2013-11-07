<?php /* Smarty version 2.6.26, created on 2012-05-12 16:16:02
         compiled from reviewer/viewMeeting.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'reviewer/viewMeeting.tpl', 11, false),array('function', 'url', 'reviewer/viewMeeting.tpl', 17, false),array('function', 'sort_heading', 'reviewer/viewMeeting.tpl', 53, false),array('modifier', 'assign', 'reviewer/viewMeeting.tpl', 11, false),array('modifier', 'date_format', 'reviewer/viewMeeting.tpl', 36, false),array('modifier', 'escape', 'reviewer/viewMeeting.tpl', 64, false),array('modifier', 'truncate', 'reviewer/viewMeeting.tpl', 68, false),array('modifier', 'strip_unsafe_html', 'reviewer/viewMeeting.tpl', 69, false),array('modifier', 'count', 'reviewer/viewMeeting.tpl', 88, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('meetingId', $this->_tpl_vars['meeting']->getId()); ?><?php echo ''; ?><?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.meeting",'id' => $this->_tpl_vars['meetingId']), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'pageTitleTranslated') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'pageTitleTranslated'));?><?php echo ''; ?><?php $this->assign('pageCrumbTitle', "reviewer.meeting"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<ul class="menu">
	<li><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'meetings'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.meetings"), $this);?>
</a></li>
</ul>

<div class="separator"></div>
<br/>
<div id="details">
<h2><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.meetings.details"), $this);?>
</h2>
<div class="separator"></div>
<table width="100%" class="data">
<tr valign="top">
	<td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings.meetingId"), $this);?>
</td>
	<td class="value" width="80%"><?php echo $this->_tpl_vars['meeting']->getId(); ?>
</td>
</tr>
<tr valign="top">
	<td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.meetings.editor"), $this);?>
</td>
	<td class="value" width="80%"><?php echo $this->_tpl_vars['editor']->getFirstName(); ?>
&nbsp;<?php echo $this->_tpl_vars['editor']->getLastName(); ?>
</td>
</tr>
<tr valign="top">
	<td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings.meetingDate"), $this);?>
</td>
	<td class="value" width="80%"><?php echo ((is_array($_tmp=$this->_tpl_vars['meeting']->getDate())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %I:%M %p") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %I:%M %p")); ?>
</td>
</tr>
<tr valign="top">
	<td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.meetings.scheduleStatus"), $this);?>
</td>
	<td class="value" width="80%"><?php echo $this->_tpl_vars['meeting']->getStatusKey(); ?>
</td>
</tr>
</table>
</div>
<br/>

<div id="submissions">
<h2><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.meetings.submissions"), $this);?>
</h2>
<div class="separator"></div>
<table width="100%" class="listing">
	<tr class="heading" valign="bottom">
		<td width="10%">WHO Proposal ID</td>
		<td width="5%"><span class="disabled"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.date.mmdd"), $this);?>
</span><br /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submissions.submit"), $this);?>
</td>
		<!-- <td width="5%"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "submissions.sec",'sort' => 'section'), $this);?>
</td> *} Commented out by MSB, Sept25,2011-->
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
	<?php $this->assign('key', $this->_tpl_vars['submission']->getId()); ?>
	<tr valign="top">
		<td><?php if ($this->_tpl_vars['whoId']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['whoId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php else: ?>&mdash;<?php endif; ?></td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getDateSubmitted())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatTrunc']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatTrunc'])); ?>
</td>
		<!--  -->
		<!--   Commented out by MSB -->
   		<td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['submission']->getFirstAuthor(true))) ? $this->_run_mod_handler('truncate', true, $_tmp, 40, "...") : $this->_plugins['modifier']['truncate'][0][0]->smartyTruncate($_tmp, 40, "...")))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td> <!-- Get first author. Added by MSB, Sept 25, 2011 -->		
   		<td><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'submission','path' => $this->_tpl_vars['map'][$this->_tpl_vars['key']]), $this);?>
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
	<?php if (! empty ( $this->_tpl_vars['submissions'] )): ?>
	<tr>
		<td colspan="6" align="left"><?php echo count($this->_tpl_vars['submissions']); ?>
 submission(s)</td>
	</tr>
	<?php endif; ?>
</table>
</div>
<br/>

<div id="reply">
<h2><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.meetings.reply"), $this);?>
</h2>
<div class="separator"></div>
<form method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'replyMeeting'), $this);?>
" >
<table width="100%" class="data">
<tr><td colspan="2" class="headseparator">&nbsp;</td></tr>
<tr valign="top">
	<td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.schedule.isAttending"), $this);?>
 </td>
	<td class="value" width="80%">	
		<input type="radio" name="isAttending" id="acceptMeetingSchedule" value="1" <?php if ($this->_tpl_vars['meeting']->getIsAttending() == 1): ?> checked="checked"<?php endif; ?> > </input> Yes
		<input type="radio" name="isAttending" id="regretMeetingSchedule" value="2" <?php if ($this->_tpl_vars['meeting']->getIsAttending() == 2): ?> checked="checked"<?php endif; ?> > </input> No
		<input type="radio" name="isAttending" id="undecidedMeetingSchedule" value="0" <?php if ($this->_tpl_vars['meeting']->getIsAttending() == 0): ?> checked="checked"<?php endif; ?> > </input> Undecided
	</td>
</tr> 
<tr>
	<td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.schedule.remarks"), $this);?>
 </td>
	<td class="value" width="80%">
		<textarea class="textArea" name="remarks" id="proposedDate" rows="5" cols="40" /><?php echo ((is_array($_tmp=$this->_tpl_vars['meeting']->getRemarks())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</textarea>
	</td>
</tr>
<tr>
	<td class="label"></td>
	<td class="value">
		<input type="hidden" id="meetingId" name="meetingId" value=<?php echo $this->_tpl_vars['meetingId']; ?>
> </input>
		<input type="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.save"), $this);?>
" class="button defaultButton" /> <input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.cancel"), $this);?>
" class="button" onclick="document.location.href='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'meetings','escape' => false), $this);?>
'" />
	</td>
</tr>
</table>
</form>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
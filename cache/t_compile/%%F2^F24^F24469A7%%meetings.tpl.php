<?php /* Smarty version 2.6.26, created on 2012-05-13 18:52:52
         compiled from reviewer/meetings.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'reviewer/meetings.tpl', 13, false),array('function', 'translate', 'reviewer/meetings.tpl', 13, false),array('function', 'html_select_date', 'reviewer/meetings.tpl', 50, false),array('function', 'sort_heading', 'reviewer/meetings.tpl', 70, false),array('function', 'page_info', 'reviewer/meetings.tpl', 131, false),array('function', 'page_links', 'reviewer/meetings.tpl', 132, false),array('block', 'iterate', 'reviewer/meetings.tpl', 78, false),array('modifier', 'strip_unsafe_html', 'reviewer/meetings.tpl', 84, false),array('modifier', 'truncate', 'reviewer/meetings.tpl', 84, false),array('modifier', 'cat', 'reviewer/meetings.tpl', 94, false),array('modifier', 'date_format', 'reviewer/meetings.tpl', 108, false),)), $this); ?>

<?php echo ''; ?><?php $this->assign('pageTitle', "reviewer.meetings"); ?><?php echo ''; ?><?php $this->assign('pageCrumbTitle', "reviewer.meetings"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<ul class="menu">
	<li class="current"><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'meetings'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.meetings"), $this);?>
</a></li>
</ul>
<div class="separator"></div>
<br/>
<?php if (! $this->_tpl_vars['dateFrom']): ?>
<?php $this->assign('dateFrom', "--"); ?>
<?php endif; ?>

<?php if (! $this->_tpl_vars['dateTo']): ?>
<?php $this->assign('dateTo', "--"); ?>
<?php endif; ?>
<form method="post" name="submit" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'meetings'), $this);?>
">
<div id="search">
	<table align="left">
		<tr>
			<td><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings"), $this);?>
</td>
			<td>
			<select name="status" size="1"  class="selectMenu" >
				<option value=""><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.all"), $this);?>
</option>
				<option value="1" <?php if ($this->_tpl_vars['status'] == 1): ?>selected<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.meetings.scheduleStatus.final"), $this);?>
</option>
				<option value="2" <?php if ($this->_tpl_vars['status'] == 2): ?>selected<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.meetings.scheduleStatus.rescheduled"), $this);?>
</option>
				<option value="3" <?php if ($this->_tpl_vars['status'] == 3): ?>selected<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.meetings.scheduleStatus.cancelled"), $this);?>
</option>
				<option value="4" <?php if ($this->_tpl_vars['status'] == 4): ?>selected<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.meetings.scheduleStatus.new"), $this);?>
</option>
				<option value="5" <?php if ($this->_tpl_vars['status'] == 5): ?>selected<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.done"), $this);?>
</option>
			</select>
			</td>
			<td>Reply</td>
			<td>
			<select name="replyStatus" size="1"  class="selectMenu" >
				<option value=""><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.all"), $this);?>
</option>
				<option value="1" <?php if ($this->_tpl_vars['replyStatus'] == 1): ?>selected<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.meetings.replyStatus.attending"), $this);?>
</option>
				<option value="2" <?php if ($this->_tpl_vars['replyStatus'] == 2): ?>selected<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.meetings.replyStatus.notAttending"), $this);?>
</option>
				<option value="3" <?php if ($this->_tpl_vars['replyStatus'] == 3): ?>selected<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.meetings.replyStatus.awaitingReply"), $this);?>
</option>
			</select></td>
			</tr>
			<tr>
			<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "search.dateFrom"), $this);?>
</td>
			<td class="value"><?php echo smarty_function_html_select_date(array('prefix' => 'dateFrom','time' => $this->_tpl_vars['dateFrom'],'all_extra' => "class=\"selectMenu\"",'year_empty' => "",'month_empty' => "",'day_empty' => "",'start_year' => "-5",'end_year' => "+1"), $this);?>
</td>
			<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "search.dateTo"), $this);?>
</td>
			<td class="value">
				<?php echo smarty_function_html_select_date(array('prefix' => 'dateTo','time' => $this->_tpl_vars['dateTo'],'all_extra' => "class=\"selectMenu\"",'year_empty' => "",'month_empty' => "",'day_empty' => "",'start_year' => "-5",'end_year' => "+1"), $this);?>

				<input type="hidden" name="dateToHour" value="23" />
				<input type="hidden" name="dateToMinute" value="59" />
				<input type="hidden" name="dateToSecond" value="59" />
			</td>
			<td>
			
		</td>
		</tr>
	</table>
</div><br/><br/><br/>
<p align="left"><input type="submit" class="button defaultButton" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.search"), $this);?>
"/></p>
</form>
<div id="meetings">
	<table class="listing" width="100%">
		<tr><td colspan="5" class="headseparator">&nbsp;</td></tr>
		<tr class="heading" valign="bottom">
			<td width="5%"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "editor.meetings.meetingId",'sort' => 'id'), $this);?>
</td>
			<td width="40%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.meetings.submissions"), $this);?>
</td>
			<td width="25%" align="right"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "editor.meetings.meetingDate",'sort' => 'meetingDate'), $this);?>
</td>
			<td width="15%" align="right"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "editor.meetings.scheduleStatus",'sort' => 'scheduleStatus'), $this);?>
</td>
			<td width="15%" align="right"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "reviewer.meetings.replyStatus",'sort' => 'replyStatus'), $this);?>
</td>
		</tr>
		<tr><td colspan="5" class="headseparator">&nbsp;</td></tr>
	<p></p>
	<?php $this->_tag_stack[] = array('iterate', array('from' => 'meetings','item' => 'meeting')); $_block_repeat=true;$this->_plugins['block']['iterate'][0][0]->smartyIterate($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
	<?php $this->assign('key', $this->_tpl_vars['meeting']->getId()); ?>
		<tr class="heading" valign="bottom">
			<td width="5%"><?php echo $this->_tpl_vars['meeting']->getId(); ?>
</td>
			<td width="40%">
				<?php $_from = $this->_tpl_vars['map'][$this->_tpl_vars['key']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['submissions'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['submissions']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['submission']):
        $this->_foreach['submissions']['iteration']++;
?>
					<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['submission']->getLocalizedTitle())) ? $this->_run_mod_handler('strip_unsafe_html', true, $_tmp) : String::stripUnsafeHtml($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 20, "...") : $this->_plugins['modifier']['truncate'][0][0]->smartyTruncate($_tmp, 20, "...")); ?>

					<?php if (($this->_foreach['submissions']['iteration'] == $this->_foreach['submissions']['total'])): ?><?php else: ?>,&nbsp;<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<?php if (empty ( $this->_tpl_vars['map'][$this->_tpl_vars['key']] )): ?>
					<i><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.meetings.noSubmissions"), $this);?>
</i>
				<?php endif; ?>
				
			</td>
			<td width="25%" align="right">
<!--				<?php if ($this->_tpl_vars['meeting']->getStatus() == 4): ?>-->
<!--					 <img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['baseUrl'])) ? $this->_run_mod_handler('cat', true, $_tmp, "/lib/pkp/styles/images/who_icons/new.png") : smarty_modifier_cat($_tmp, "/lib/pkp/styles/images/who_icons/new.png")); ?>
">-->
<!--				<?php endif; ?>-->
<!--				<?php if ($this->_tpl_vars['meeting']->getStatus() == 1): ?>-->
<!--					 <img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['baseUrl'])) ? $this->_run_mod_handler('cat', true, $_tmp, "/lib/pkp/styles/images/who_icons/final.png") : smarty_modifier_cat($_tmp, "/lib/pkp/styles/images/who_icons/final.png")); ?>
">-->
<!--				<?php endif; ?>	-->
<!--				<?php if ($this->_tpl_vars['meeting']->getStatus() == 2): ?>-->
<!--					 <img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['baseUrl'])) ? $this->_run_mod_handler('cat', true, $_tmp, "/lib/pkp/styles/images/who_icons/resched.png") : smarty_modifier_cat($_tmp, "/lib/pkp/styles/images/who_icons/resched.png")); ?>
">-->
<!--				<?php endif; ?>-->
<!--				<?php if ($this->_tpl_vars['meeting']->getStatus() == 3): ?>-->
<!--					 <img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['baseUrl'])) ? $this->_run_mod_handler('cat', true, $_tmp, "/lib/pkp/styles/images/who_icons/cancelled.png") : smarty_modifier_cat($_tmp, "/lib/pkp/styles/images/who_icons/cancelled.png")); ?>
">-->
<!--				<?php endif; ?>-->
<!--				<?php if ($this->_tpl_vars['meeting']->getStatus() == 5): ?>-->
<!--					 <img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['baseUrl'])) ? $this->_run_mod_handler('cat', true, $_tmp, "/lib/pkp/styles/images/who_icons/done.png") : smarty_modifier_cat($_tmp, "/lib/pkp/styles/images/who_icons/done.png")); ?>
">-->
<!--				<?php endif; ?>-->
				<?php echo ((is_array($_tmp=$this->_tpl_vars['meeting']->getDate())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %I:%M %p") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %I:%M %p")); ?>
</td>
			<td width="15%" align="right">
				<?php echo $this->_tpl_vars['meeting']->getStatusKey(); ?>

			</td>
			<td width="15%" align="right">
				<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'viewMeeting','path' => $this->_tpl_vars['meeting']->getId()), $this);?>
" class="action">
					<?php echo $this->_tpl_vars['meeting']->getReplyStatus(); ?>

				</a>
			</td>
		</tr>	
		<tr>
			<td colspan="5" class="<?php if ($this->_tpl_vars['meetings']->eof()): ?>end<?php endif; ?>separator">&nbsp;</td>
		</tr>
	<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_plugins['block']['iterate'][0][0]->smartyIterate($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
	<?php if ($this->_tpl_vars['meetings']->wasEmpty()): ?>
		<tr>
			<td colspan="5" class="nodata"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings.noMeetings"), $this);?>
</td>
		</tr>
	<tr>
		<td colspan="5" class="endseparator">&nbsp;</td>
	</tr>
	<?php else: ?>
		<tr>
			<td colspan="2" align="left"><?php echo $this->_plugins['function']['page_info'][0][0]->smartyPageInfo(array('iterator' => $this->_tpl_vars['meetings']), $this);?>
</td>
			<td colspan="2" align="right"><?php echo $this->_plugins['function']['page_links'][0][0]->smartyPageLinks(array('anchor' => 'meetings','name' => 'meetings','iterator' => $this->_tpl_vars['meetings'],'sort' => $this->_tpl_vars['sort'],'sortDirection' => $this->_tpl_vars['sortDirection']), $this);?>
</td>
		</tr>
	<?php endif; ?>
	</table>
<br/><br/>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
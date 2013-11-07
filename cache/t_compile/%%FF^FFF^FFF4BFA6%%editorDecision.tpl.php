<?php /* Smarty version 2.6.26, created on 2013-01-23 18:19:32
         compiled from sectionEditor/submission/editorDecision.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'sectionEditor/submission/editorDecision.tpl', 11, false),array('modifier', 'escape', 'sectionEditor/submission/editorDecision.tpl', 86, false),array('modifier', 'date_format', 'sectionEditor/submission/editorDecision.tpl', 166, false),array('modifier', 'assign', 'sectionEditor/submission/editorDecision.tpl', 263, false),array('function', 'translate', 'sectionEditor/submission/editorDecision.tpl', 63, false),array('function', 'url', 'sectionEditor/submission/editorDecision.tpl', 74, false),array('function', 'html_options_translate', 'sectionEditor/submission/editorDecision.tpl', 84, false),array('function', 'icon', 'sectionEditor/submission/editorDecision.tpl', 276, false),)), $this); ?>
<script type="text/javascript" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['baseUrl'])) ? $this->_run_mod_handler('cat', true, $_tmp, "/lib/pkp/js/lib/jquery/jquery-ui-timepicker-addon.js") : smarty_modifier_cat($_tmp, "/lib/pkp/js/lib/jquery/jquery-ui-timepicker-addon.js")); ?>
"></script>
<style type="text/css" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['baseUrl'])) ? $this->_run_mod_handler('cat', true, $_tmp, "/lib/pkp/styles/jquery-ui-timepicker-addon.css") : smarty_modifier_cat($_tmp, "/lib/pkp/styles/jquery-ui-timepicker-addon.css")); ?>
"></style>

<?php echo '
<script type="text/javascript">
$(document).ready(function() {
	$("#approvalDateRow").hide();
	$("#approvalDate").datepicker({changeMonth: true, changeYear: true, dateFormat: \'yy-mm-dd\'});
	$("#decision").change(
		function() {
			var decision = $("#decision option:selected").val();
			if(decision == 1) {
				$("#approvalDateRow").show();
			} else {
				$("#approvalDateRow").hide();
			}
		}
	);
});
function checkSize(){
	var fileToUpload = document.getElementById(\'finalDecisionFile\');
	var check = fileToUpload.files[0].fileSize;
	var valueInKb = Math.ceil(check/1024);
	if (check > 5242880){
		alert (\'The file is too big (\'+valueInKb+\' Kb). It should not exceed 5 Mb.\');
		return false
	} 
}
</script>
'; ?>

 
<?php $this->assign('proposalStatus', $this->_tpl_vars['submission']->getSubmissionStatus()); ?>
<?php $this->assign('proposalStatusKey', $this->_tpl_vars['submission']->getProposalStatusKey($this->_tpl_vars['proposalStatus'])); ?>
<?php if ($this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_ASSIGNED || $this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_EXPEDITED): ?> 
	<div id="peerReviewFields">
		<?php if ($this->_tpl_vars['reviewAssignmentCount'] > 0): ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "sectionEditor/submission/peerReview.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php else: ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "sectionEditor/submission/peerReviewSelection.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php endif; ?>
		<div class="separator"></div>
	</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['authorFees']): ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "sectionEditor/submission/authorFees.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="separator"></div>
<?php endif; ?>

<div id="editorDecision">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.editorDecision"), $this);?>
</h3>

<table id="table1" width="100%" class="data">
<tr valign="top">
	<td title="Current status of the proposal." class="label" width="20%">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.proposalStatus"), $this);?>
</td>
	<td width="80%" class="value">
		<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => $this->_tpl_vars['proposalStatusKey']), $this);?>

		<?php if ($this->_tpl_vars['submission']->isDueForReview() == 1 && $this->_tpl_vars['proposalStatus'] != PROPOSAL_STATUS_COMPLETED): ?>
			(<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submissions.proposal.forContinuingReview"), $this);?>
)
		<?php endif; ?></td>
</tr>
	<form method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'recordDecision'), $this);?>
" onSubmit="return checkSize()" enctype="multipart/form-data">
		<input type="hidden" name="articleId" value="<?php echo $this->_tpl_vars['submission']->getId(); ?>
" />
		<input type="hidden" name="lastDecisionId" value="<?php echo $this->_tpl_vars['lastDecisionArray']['editDecisionId']; ?>
" />
		<input type="hidden" name="resubmitCount" value="<?php echo $this->_tpl_vars['lastDecisionArray']['resubmitCount']; ?>
" />
 
	<tr valign="top">
	<?php if ($this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_SUBMITTED || $this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_RESUBMITTED): ?>
		<td title="Please check all the information submitted and the files downloaded (SUMMARY link above) in order to decide if the proposal is incomplete or not." class="label" width="20%">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.selectInitialReview"), $this);?>
</td>
		<td width="80%" class="value">
			<select id="decision" name="decision" size="1" class="selectMenu">
				<?php echo $this->_plugins['function']['html_options_translate'][0][0]->smartyHtmlOptionsTranslate(array('options' => $this->_tpl_vars['initialReviewOptions'],'selected' => 1), $this);?>

			</select>
			<input type="submit" onclick="return confirm('<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.submissionReview.confirmInitialReview"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'jsparam') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'jsparam'));?>
')" name="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.record"), $this);?>
"  class="button" />			
		</td>

	<?php elseif ($this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_CHECKED): ?>
		<td title="Please select the type of review needed. If the proposal does'nt need any review, please select 'Exemption of Review'." class="label" width="20%">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.selectExemptionDecision"), $this);?>
</td>
		<td width="80%" class="value">
			<select id="decision" name="decision" size="1" class="selectMenu">
				<?php echo $this->_plugins['function']['html_options_translate'][0][0]->smartyHtmlOptionsTranslate(array('options' => $this->_tpl_vars['exemptionOptions'],'selected' => 1), $this);?>

			</select>
			<input type="submit" id="notFullReview" onclick="return confirm('<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.submissionReview.confirmExemption"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'jsparam') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'jsparam'));?>
')" name="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.record"), $this);?>
"  class="button" />
		</td>
	<?php elseif ($this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_REVIEWED && $this->_tpl_vars['submission']->isDueForReview() == 1): ?>
		<td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.selectContinuingReview"), $this);?>
</td>
		<td width="80%" class="value">
				<select id="decision" name="decision" size="1" class="selectMenu">
					<?php echo $this->_plugins['function']['html_options_translate'][0][0]->smartyHtmlOptionsTranslate(array('options' => $this->_tpl_vars['continuingReviewOptions'],'selected' => 1), $this);?>

				</select>
				<input type="submit" onclick="return confirm('<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.submissionReview.confirmReviewSelection"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'jsparam') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'jsparam'));?>
')" name="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.record"), $this);?>
"  class="button" />
		</td>
	<?php elseif (( $this->_tpl_vars['articleMoreRecent'] && $this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_REVIEWED && $this->_tpl_vars['lastDecisionArray']['decision'] == SUBMISSION_EDITOR_DECISION_RESUBMIT )): ?>
		<td title="Please select the final decision. This decision can't be undone." class="label" width="20%">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.selectDecision"), $this);?>
</td>
		<td width="80%" class="value">
				<select id="decision" name="decision" size="1" class="selectMenu">
					<?php echo $this->_plugins['function']['html_options_translate'][0][0]->smartyHtmlOptionsTranslate(array('options' => $this->_tpl_vars['editorDecisionOptions'],'selected' => 0), $this);?>

				</select>
				<input type="submit" onclick="return confirm('<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.submissionReview.confirmDecision"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'jsparam') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'jsparam'));?>
')" name="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.recordDecision"), $this);?>
"  class="button" />
		</td>	
	<?php endif; ?>
	</tr>

<?php if ($this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_WITHDRAWN): ?>
	<tr>
		<td class="label">&nbsp;</td>
		<td class="value">Reason: <?php echo $this->_tpl_vars['submission']->getWithdrawReason('en_US'); ?>
</td>
	</tr>
	<?php if ($this->_tpl_vars['submission']->getWithdrawComments('en_US')): ?>
		<tr>
			<td class="label">&nbsp;</td>
			<td class="value">Comments: <?php echo $this->_tpl_vars['submission']->getWithdrawComments('en_US'); ?>
</td>
		</tr>
	<?php endif; ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_EXPEDITED || $this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_ASSIGNED): ?>	
	<tr>
		<td title="Please select the final decision. This decision can't be undone." class="label" width="20%">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.selectDecision"), $this);?>
</td>
		<td width="80%" class="value">
			<select id="decision" name="decision" <?php if ($this->_tpl_vars['authorFees'] && ! $this->_tpl_vars['submissionPayment'] && $this->_tpl_vars['submission']->getLocalizedStudentInitiatedResearch() != 'Yes'): ?>disabled="disabled"<?php endif; ?> size="1" class="selectMenu">
				<?php echo $this->_plugins['function']['html_options_translate'][0][0]->smartyHtmlOptionsTranslate(array('options' => $this->_tpl_vars['editorDecisionOptions'],'selected' => 0), $this);?>

			</select> <?php if ($this->_tpl_vars['authorFees'] && ! $this->_tpl_vars['submissionPayment'] && $this->_tpl_vars['submission']->getLocalizedStudentInitiatedResearch() != 'Yes'): ?><i>Please confirm the payment of the proposal review fee.</i><?php endif; ?>
			
		</td>		
	</tr>
<?php endif; ?>
	<tr id="approvalDateRow">
		<td title="Please select the date of approbation. If no date is entered, today's date will be selected." class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.setApprovalDate"), $this);?>
</td>
		<td class="value">
			<input type="text" name="approvalDate" id="approvalDate" class="textField" size="19" />
		</td>
	</tr>
<?php if ($this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_EXPEDITED || $this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_ASSIGNED): ?>	
	<tr>
		<td title="Please select and upload the approbation letter. This optionnal step can always be realized after." class="label" width="20%">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.uploadFinalDecisionFile"), $this);?>
</td>
		<td width="80%" class="value">
			<input type="file" class="uploadField" name="finalDecisionFile" id="finalDecisionFile"/>
			<input type="submit" onclick="return confirm('<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.submissionReview.confirmDecision"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'jsparam') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'jsparam'));?>
')" name="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.uploadRecordDecision"), $this);?>
"  class="button" />						
		</td>
	</tr>
<?php endif; ?>
<?php if ($this->_tpl_vars['proposalStatus'] != PROPOSAL_STATUS_COMPLETED): ?>
<tr valign="top">
	<td title="Final decision decided." class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.finalDecision"), $this);?>
</td>
	<td class="value">
		<?php if (! $this->_tpl_vars['submission']->isSubmissionDue() && $this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_REVIEWED || $this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_EXEMPTED): ?>
			<?php $this->assign('decision', $this->_tpl_vars['submission']->getEditorDecisionKey()); ?>
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => $this->_tpl_vars['decision']), $this);?>

			<?php if ($this->_tpl_vars['submission']->isSubmissionDue()): ?>&nbsp;(Due)&nbsp;<?php endif; ?>
			<?php if ($this->_tpl_vars['lastDecisionArray']['decision'] == SUBMISSION_EDITOR_DECISION_ACCEPT): ?>
				<?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getApprovalDate($this->_tpl_vars['submission']->getLocale()))) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>

			<?php else: ?>
				<?php echo ((is_array($_tmp=$this->_tpl_vars['lastDecisionArray']['dateDecided'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>

			<?php endif; ?>
		<?php else: ?>
			<?php $this->assign('decisionAllowed', 'false'); ?>
			<?php if ($this->_tpl_vars['reviewAssignments']): ?>
				<!-- Change false to true for allowing decision only if all reviewers submitted a recommendation-->
				<?php $this->assign('decisionAllowed', 'false'); ?>
				<?php $_from = $this->_tpl_vars['reviewAssignments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['reviewAssignment']):
?>
					<?php if (! $this->_tpl_vars['reviewAssignment']->getRecommendation()): ?>
						<?php $this->assign('decisionAllowed', 'false'); ?>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['decisionAllowed'] == 'true'): ?>
			<select id="decision" name="decision" size="1" class="selectMenu">
				<?php echo $this->_plugins['function']['html_options_translate'][0][0]->smartyHtmlOptionsTranslate(array('options' => $this->_tpl_vars['editorDecisionOptions'],'selected' => 0), $this);?>

			</select>
			<input type="submit" onclick="return confirm('<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.submissionReview.confirmDecision"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'jsparam') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'jsparam'));?>
')" name="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.uploadRecordDecision"), $this);?>
"  class="button" />
			<?php else: ?>
				<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.none"), $this);?>

			<?php endif; ?>
		<?php endif; ?>		
	</td>
</tr>
<?php endif; ?>
</form>

<?php if (( $this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_RETURNED ) || ( $this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_RESUBMITTED ) || ( $this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_REVIEWED && $this->_tpl_vars['lastDecisionArray']['decision'] == SUBMISSION_EDITOR_DECISION_RESUBMIT )): ?>
	<tr valign="top">
		<?php $this->assign('articleLastModified', $this->_tpl_vars['submission']->getLastModified()); ?>
		<?php if ($this->_tpl_vars['articleMoreRecent'] && $this->_tpl_vars['lastDecisionArray']['resubmitCount'] != null && $this->_tpl_vars['lastDecisionArray']['resubmitCount'] != 0): ?>
			<td class="label"></td>
			<?php if ($this->_tpl_vars['lastDecisionArray']['resubmitCount'] == 1): ?>
				<?php $this->assign('resubmitMsg', 'once'); ?>
			<?php else: ?>
				<?php $this->assign('resubmitCount', $this->_tpl_vars['lastDecisionArray']['resubmitCount']); ?>
				<?php $this->assign('resubmitMsg', "for ".($this->_tpl_vars['resubmitCount'])." times"); ?>
			<?php endif; ?>
			<td width="80%" class="value">
				Re-submitted <?php echo $this->_tpl_vars['resubmitMsg']; ?>
 as of <?php echo ((is_array($_tmp=$this->_tpl_vars['articleLastModified'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>

			</td>
		<?php endif; ?>
	</tr>
	<tr valign="top">
	<?php if (! $this->_tpl_vars['articleMoreRecent']): ?>
		<td title="Current status of the proposal." class="label" width="20%">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.submissionStatus"), $this);?>
</td>
		<td width="80%" class="value"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.waitingForResubmission"), $this);?>
</td>
	<?php endif; ?>
	</tr>
<?php endif; ?>


<?php if ($this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_EXEMPTED): ?>
	<?php $this->assign('localizedReasons', $this->_tpl_vars['submission']->getLocalizedReasonsForExemption()); ?>
	<form method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'recordReasonsForExemption'), $this);?>
">
		<input type="hidden" name="articleId" value="<?php echo $this->_tpl_vars['submission']->getId(); ?>
" />
		<input type="hidden" name="decision" value="<?php echo $this->_tpl_vars['lastDecisionArray']['decision']; ?>
" />	
	
		<tr valign="top">
			<td title="If not already done, please select the resasons of the exemption." class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.reasonsForExemption"), $this);?>
</td>
			<td class="value"><!--  --></td>
		</tr>
		<?php $_from = $this->_tpl_vars['reasonsMap']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['reasonVal'] => $this->_tpl_vars['reasonLocale']):
?>
			<tr valign="top">
				<td class="label" align="center">
					<input type="checkbox" name="exemptionReasons[]" id="reason<?php echo $this->_tpl_vars['reasonVal']; ?>
" value=<?php echo $this->_tpl_vars['reasonVal']; ?>
	 <?php if ($this->_tpl_vars['localizedReasons'] > 0): ?>disabled="true"<?php endif; ?> <?php if ($this->_tpl_vars['reasonsForExemption'][$this->_tpl_vars['reasonVal']] == 1): ?>checked="checked"<?php endif; ?>/>				
				</td>
				<td class="value">
					<label for="reason<?php echo $this->_tpl_vars['reasonVal']; ?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => $this->_tpl_vars['reasonLocale']), $this);?>
</label>
				</td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>	
		<?php if (! $this->_tpl_vars['localizedReasons']): ?>
		<tr>
			<td align="center"><input type="submit"  name="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.record"), $this);?>
"  class="button" /></td>
		</tr>			
		<?php endif; ?>
	</form>
<?php endif; ?>

<?php if (( ( $this->_tpl_vars['submission']->getMostRecentDecision() == '6' ) || ( $this->_tpl_vars['submission']->getMostRecentDecision() == '1' ) || ( $this->_tpl_vars['submission']->getMostRecentDecision() == '3' ) ) && $this->_tpl_vars['finalDecisionFileUploaded'] == false): ?>
<form method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'uploadDecisionFile','path' => $this->_tpl_vars['submission']->getId()), $this);?>
"  enctype="multipart/form-data">
	<tr valign="top">
		<td title="Please upload the decision letter here." class="label">[?] Upload Decision File</td>
		<td class="value">		
			<input type="file" class="uploadField" name="finalDecisionFile" id="finalDecisionFile"/>
			<input type="submit" class="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.upload"), $this);?>
" />
		</td>
	</tr>
</form>
<?php endif; ?>

<tr valign="top">
	<td title="Please click on the mail icon for sending an email to investigator. Please click on the speech bubble icon for opening the chat room between you and the investigator." class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.notifyAuthor"), $this);?>
</td>
	<td class="value">
		<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'emailEditorDecisionComment','articleId' => $this->_tpl_vars['submission']->getId()), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'notifyAuthorUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'notifyAuthorUrl'));?>

<!-- 
		 -->
		<?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'mail','url' => $this->_tpl_vars['notifyAuthorUrl']), $this);?>

	
		&nbsp;&nbsp;&nbsp;&nbsp;
		Email to investigator
		<?php if ($this->_tpl_vars['submission']->getMostRecentEditorDecisionComment()): ?>
			<?php $this->assign('comment', $this->_tpl_vars['submission']->getMostRecentEditorDecisionComment()); ?>
			&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:openComments('<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'viewEditorDecisionComments','path' => $this->_tpl_vars['submission']->getId(),'anchor' => $this->_tpl_vars['comment']->getId()), $this);?>
');" class="icon"><?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'comment'), $this);?>
</a>&nbsp;&nbsp;Last message: <?php echo ((is_array($_tmp=$this->_tpl_vars['comment']->getDatePosted())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>

		<?php else: ?>
			&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:openComments('<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'viewEditorDecisionComments','path' => $this->_tpl_vars['submission']->getId()), $this);?>
');" class="icon"><?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'comment'), $this);?>
</a><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.noComments"), $this);?>

		<?php endif; ?>
	</td>
</tr>
</table>

<form method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'editorReview'), $this);?>
" enctype="multipart/form-data">
<input type="hidden" name="articleId" value="<?php echo $this->_tpl_vars['submission']->getId(); ?>
" />
<?php $this->assign('authorFiles', $this->_tpl_vars['submission']->getAuthorFileRevisions($this->_tpl_vars['round'])); ?>
<?php $this->assign('editorFiles', $this->_tpl_vars['submission']->getEditorFileRevisions($this->_tpl_vars['round'])); ?>

<?php $this->assign('authorRevisionExists', false); ?>
<?php $_from = $this->_tpl_vars['authorFiles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['authorFile']):
?>
	<?php $this->assign('authorRevisionExists', true); ?>
<?php endforeach; endif; unset($_from); ?>

<?php $this->assign('editorRevisionExists', false); ?>
<?php $_from = $this->_tpl_vars['editorFiles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['editorFile']):
?>
	<?php $this->assign('editorRevisionExists', true); ?>
<?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['reviewFile']): ?>
	<?php $this->assign('reviewVersionExists', 1); ?>
<?php endif; ?>
</table>

</form>
</div>
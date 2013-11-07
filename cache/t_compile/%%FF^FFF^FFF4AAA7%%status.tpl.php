<?php /* Smarty version 2.6.26, created on 2012-12-03 16:56:26
         compiled from sectionEditor/submission/status.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'sectionEditor/submission/status.tpl', 10, false),array('modifier', 'date_format', 'sectionEditor/submission/status.tpl', 57, false),)), $this); ?>
<div id="status">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.status"), $this);?>
</h3>

<table width="100%" class="data">
	<tr>
		<?php $this->assign('status', $this->_tpl_vars['submission']->getSubmissionStatus()); ?>
		<td title="Current review status of the proposal" width="20%" class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.status"), $this);?>
</td>
		<td width="80%" class="value">
                        <!-- Edited by: AIM, July 4 2011 -->
                        <?php if ($this->_tpl_vars['status'] == PROPOSAL_STATUS_DRAFT): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submissions.proposal.draft"), $this);?>

                        <?php elseif ($this->_tpl_vars['status'] == PROPOSAL_STATUS_WITHDRAWN): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submissions.proposal.withdrawn"), $this);?>

                        <?php elseif ($this->_tpl_vars['status'] == PROPOSAL_STATUS_COMPLETED): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submissions.proposal.completed"), $this);?>

                        <?php elseif ($this->_tpl_vars['status'] == PROPOSAL_STATUS_ARCHIVED): ?>
                            <?php $this->assign('decision', $this->_tpl_vars['submission']->getMostRecentDecision()); ?>
                            <?php if ($this->_tpl_vars['decision'] == SUBMISSION_EDITOR_DECISION_DECLINE): ?>
                                Archived(<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submissions.proposal.decline"), $this);?>
)
                            <?php elseif ($this->_tpl_vars['decision'] == SUBMISSION_EDITOR_DECISION_EXEMPTED): ?>
                                Archived(<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submissions.proposal.exempted"), $this);?>
)
                            <?php endif; ?>
                        <?php elseif ($this->_tpl_vars['status'] == PROPOSAL_STATUS_SUBMITTED): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submissions.proposal.submitted"), $this);?>

                        <?php elseif ($this->_tpl_vars['status'] == PROPOSAL_STATUS_CHECKED): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submissions.proposal.checked"), $this);?>

                        <?php elseif ($this->_tpl_vars['status'] == PROPOSAL_STATUS_EXPEDITED): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submissions.proposal.expedited"), $this);?>

                        <?php elseif ($this->_tpl_vars['status'] == PROPOSAL_STATUS_ASSIGNED): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submissions.proposal.assigned"), $this);?>

                        <?php elseif ($this->_tpl_vars['status'] == PROPOSAL_STATUS_RETURNED): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submissions.proposal.returned"), $this);?>

                        <?php elseif ($this->_tpl_vars['status'] == PROPOSAL_STATUS_REVIEWED): ?>
                            <?php $this->assign('decision', $this->_tpl_vars['submission']->getMostRecentDecision()); ?>
                            <?php if ($this->_tpl_vars['decision'] == SUBMISSION_EDITOR_DECISION_RESUBMIT): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submissions.proposal.resubmit"), $this);?>

                            <?php elseif ($this->_tpl_vars['decision'] == SUBMISSION_EDITOR_DECISION_ACCEPT): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submissions.proposal.approved"), $this);?>

                            <?php elseif ($this->_tpl_vars['decision'] == SUBMISSION_EDITOR_DECISION_DECLINE): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submissions.proposal.decline"), $this);?>

                            <?php elseif ($this->_tpl_vars['decision'] == SUBMISSION_EDITOR_DECISION_EXEMPTED): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submissions.proposal.exempted"), $this);?>

                            <?php endif; ?>
                        <?php endif; ?>
		</td>
	</tr>
	<?php if ($this->_tpl_vars['status'] == PROPOSAL_STATUS_WITHDRAWN): ?>
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
	<tr>
		<td title="Decision's date of the above current status." class="label">[?] Date</td>
		<td colspan="2" class="value"><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getDateStatusModified())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>
</td>
	</tr>
</table>
</div>

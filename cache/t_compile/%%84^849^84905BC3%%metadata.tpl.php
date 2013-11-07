<?php /* Smarty version 2.6.26, created on 2013-01-25 15:36:00
         compiled from submission/metadata/metadata.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'submission/metadata/metadata.tpl', 16, false),array('function', 'translate', 'submission/metadata/metadata.tpl', 16, false),array('function', 'call_hook', 'submission/metadata/metadata.tpl', 17, false),array('modifier', 'escape', 'submission/metadata/metadata.tpl', 26, false),)), $this); ?>
<?php $this->assign('cam', 'kh_CA'); ?>
<?php $this->assign('eng', 'en_US'); ?>
<?php $this->assign('status', $this->_tpl_vars['submission']->getSubmissionStatus()); ?>
<?php $this->assign('decision', $this->_tpl_vars['submission']->getMostRecentDecision()); ?>

<div id="metadata">
<?php if ($this->_tpl_vars['canEditMetadata'] && $this->_tpl_vars['isSectionEditor'] && $this->_tpl_vars['status'] != PROPOSAL_STATUS_COMPLETED && $this->_tpl_vars['status'] != PROPOSAL_STATUS_ARCHIVED && $this->_tpl_vars['decision'] != SUBMISSION_EDITOR_DECISION_EXEMPTED && $this->_tpl_vars['decision'] != SUBMISSION_EDITOR_DECISION_ACCEPT): ?>
	<p><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'viewMetadata','path' => $this->_tpl_vars['submission']->getId()), $this);?>
" class="action"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.editMetadata"), $this);?>
</a></p>
	<?php echo $this->_plugins['function']['call_hook'][0][0]->smartyCallHook(array('name' => "Templates::Submission::Metadata::Metadata::AdditionalEditItems"), $this);?>

<?php endif; ?>
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.role.authors"), $this);?>
</h3>
<table class="listing" width="100%">
	<div id="proposalDetails">
<?php $_from = $this->_tpl_vars['submission']->getAuthors(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['authors'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['authors']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['author']):
        $this->_foreach['authors']['iteration']++;
?>
	<tr valign="top" id="authorFields">
        <td class="label" width="40%"><?php if ($this->_tpl_vars['author']->getPrimaryContact()): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.role.author"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.role.coinvestigator"), $this);?>
<?php endif; ?></td>
        <td class="value">
			<?php echo ((is_array($_tmp=$this->_tpl_vars['author']->getFullName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<br />
			<?php echo ((is_array($_tmp=$this->_tpl_vars['author']->getEmail())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<br />
			<?php if (( $this->_tpl_vars['author']->getLocalizedAffiliation() ) != ""): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['author']->getLocalizedAffiliation())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<br/><?php endif; ?>
			<?php if ($this->_tpl_vars['author']->getPrimaryContact()): ?><?php echo $this->_tpl_vars['submission']->getLocalizedAuthorPhoneNumber(); ?>

			<?php else: ?>
			<?php if (( $this->_tpl_vars['author']->getUrl() ) != ""): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['author']->getUrl())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php endif; ?>
			<?php endif; ?>
        </td>
    </tr>
<?php endforeach; endif; unset($_from); ?>
	<tr valign="top"><td colspan="2"><h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.titleAndAbstract"), $this);?>
</h4></td></tr>	
    <tr valign="top" id="engScientificTitleField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.engScientificTitle"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getScientificTitle($this->_tpl_vars['eng']); ?>
</td>
    </tr>
    <tr valign="top" id="camScientificTitleField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.camScientificTitle"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getScientificTitle($this->_tpl_vars['cam']); ?>
</td>
    </tr>
    <tr valign="top" id="engPublicTitleField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.engPublicTitle"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getPublicTitle($this->_tpl_vars['eng']); ?>
</td>
    </tr>
    <tr valign="top" id="camPublicTitleField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.camPublicTitle"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getPublicTitle($this->_tpl_vars['cam']); ?>
</td>
    </tr>
    <tr valign="top" id="engAbstractField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.engAbstract"), $this);?>
</td>
        <td class="value">
        	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.background"), $this);?>
<br/><?php echo $this->_tpl_vars['submission']->getBackground($this->_tpl_vars['eng']); ?>
<br/><br/>
        	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.objectives"), $this);?>
<br/><?php echo $this->_tpl_vars['submission']->getObjectives($this->_tpl_vars['eng']); ?>
<br/><br/>
        	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.studyMatters"), $this);?>
<br/><?php echo $this->_tpl_vars['submission']->getStudyMatters($this->_tpl_vars['eng']); ?>
<br/><br/>
        	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.expectedOutcomes"), $this);?>
<br/><?php echo $this->_tpl_vars['submission']->getExpectedOutcomes($this->_tpl_vars['eng']); ?>
<br/><br/>
        </td>
    </tr>
    <tr valign="top" id="camAbstractField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.camAbstract"), $this);?>
</td>
        <td class="value">
        	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.background"), $this);?>
<br/><?php echo $this->_tpl_vars['submission']->getBackground($this->_tpl_vars['cam']); ?>
<br/><br/>
        	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.objectives"), $this);?>
<br/><?php echo $this->_tpl_vars['submission']->getObjectives($this->_tpl_vars['cam']); ?>
<br/><br/>
        	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.studyMatters"), $this);?>
<br/><?php echo $this->_tpl_vars['submission']->getStudyMatters($this->_tpl_vars['cam']); ?>
<br/><br/>
        	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.expectedOutcomes"), $this);?>
<br/><?php echo $this->_tpl_vars['submission']->getExpectedOutcomes($this->_tpl_vars['cam']); ?>
<br/><br/>
        </td>
    </tr>
    <tr valign="top" id="engKeywords">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.engKeywords"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getKeywords($this->_tpl_vars['eng']); ?>
</td>
    </tr>
    <tr valign="top" id="camKeywords">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.camKeywords"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getKeywords($this->_tpl_vars['cam']); ?>
</td>
    </tr>
	<tr valign="top"><td colspan="2"><h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.proposalDetails"), $this);?>
</h4></td></tr>
	<tr valign="top" id="studentInitiatedResearchField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.studentInitiatedResearch"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['submission']->getStudentInitiatedResearch($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <?php if (( $this->_tpl_vars['submission']->getStudentInitiatedResearch($this->_tpl_vars['eng']) ) == 'Yes'): ?>
    <tr valign="top" id="studentInstitutionField">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.studentInstitution"), $this);?>
: <?php echo $this->_tpl_vars['submission']->getStudentInstitution($this->_tpl_vars['eng']); ?>
</td>
    </tr>
    <tr valign="top" id="academicDegreeField">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.academicDegree"), $this);?>
 
        	<?php if ($this->_tpl_vars['submission']->getAcademicDegree($this->_tpl_vars['eng']) == 'Undergraduate'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.undergraduate"), $this);?>

        	<?php elseif ($this->_tpl_vars['submission']->getAcademicDegree($this->_tpl_vars['eng']) == 'Master'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.master"), $this);?>

        	<?php elseif ($this->_tpl_vars['submission']->getAcademicDegree($this->_tpl_vars['eng']) == "Post-Doc"): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.postDoc"), $this);?>

        	<?php elseif ($this->_tpl_vars['submission']->getAcademicDegree($this->_tpl_vars['eng']) == "Ph.D"): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.phd"), $this);?>

        	<?php elseif ($this->_tpl_vars['submission']->getAcademicDegree($this->_tpl_vars['eng']) == 'Other'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.other"), $this);?>

        	<?php endif; ?>
        </td>
    </tr>
    <tr valign="top" id="supervisorField">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.supervisor"), $this);?>
:</td>
    </tr>
    <tr valign="top" id="supervisorFullNameField">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.supervisorFullName"), $this);?>
: <?php echo $this->_tpl_vars['submission']->getSupervisorFullName($this->_tpl_vars['eng']); ?>
</td>
    </tr>
    <tr valign="top" id="supervisorEmailField">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.email"), $this);?>
: <?php echo $this->_tpl_vars['submission']->getSupervisorEmail($this->_tpl_vars['eng']); ?>
</td>
    </tr>
    <tr valign="top" id="supervisorPhoneField">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.phone"), $this);?>
: <?php echo $this->_tpl_vars['submission']->getSupervisorPhone($this->_tpl_vars['eng']); ?>
</td>
    </tr>
    <tr valign="top" id="supervisorAffiliationField">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.affiliation"), $this);?>
: <?php echo $this->_tpl_vars['submission']->getSupervisorAffiliation($this->_tpl_vars['eng']); ?>
</td>
    </tr>
    <?php endif; ?>
    <tr valign="top" id="startDateField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.startDate"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getStartDate($this->_tpl_vars['eng']); ?>
</td>
    </tr>
    <tr valign="top" id="endDateField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.endDate"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getEndDate($this->_tpl_vars['eng']); ?>
</td>
    </tr>
    <tr valign="top" id="primarySponsorField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.primarySponsor"), $this);?>
</td>
        <td class="value">
        	<?php if ($this->_tpl_vars['submission']->getLocalizedPrimarySponsor()): ?>
        		<?php echo $this->_tpl_vars['submission']->getLocalizedPrimarySponsorText(); ?>

        	<?php endif; ?>
    	</td>
    </tr>    
    <?php if ($this->_tpl_vars['submission']->getLocalizedSecondarySponsors()): ?>
    <tr valign="top" id="secondarySponsorsField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.secondarySponsors"), $this);?>
</td>
        <td class="value">
        	<?php if ($this->_tpl_vars['submission']->getLocalizedSecondarySponsors()): ?>
        		<?php echo $this->_tpl_vars['submission']->getLocalizedSecondarySponsorText(); ?>

        	<?php endif; ?> 
        </td>
    </tr>
    <?php endif; ?>
    <tr valign="top" id="multiCountryResearchField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.multiCountryResearch"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['submission']->getMultiCountryResearch($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
	<?php if (( $this->_tpl_vars['submission']->getMultiCountryResearch($this->_tpl_vars['eng']) ) == 'Yes'): ?>
	<tr valign="top" id="multiCountryTextField">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedMultiCountryText(); ?>
</td>
    </tr>
	<?php endif; ?>
    <tr valign="top" id="nationwideField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.nationwide"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getNationwide($this->_tpl_vars['eng']); ?>
</td>
    </tr>	
    <tr valign="top" id="proposalCountryField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.proposalCountry"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedProposalCountryText(); ?>
</td>
    </tr>
    <tr valign="top" id="researchFieldField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.researchField"), $this);?>
</td>
        <td class="value">
        	<?php if ($this->_tpl_vars['submission']->getLocalizedResearchField()): ?>
        		<?php echo $this->_tpl_vars['submission']->getLocalizedResearchFieldText(); ?>

        	<?php endif; ?>
        </td>
    </tr>
    <tr valign="top" id="withHumanSubjectsField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.withHumanSubjects"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['submission']->getWithHumanSubjects($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <?php if (( $this->_tpl_vars['submission']->getWithHumanSubjects($this->_tpl_vars['eng']) ) == 'Yes'): ?>
    <tr valign="top" id="proposalTypeField">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value">
        	<?php if (( $this->_tpl_vars['submission']->getLocalizedProposalType() )): ?>
        		<?php echo $this->_tpl_vars['submission']->getLocalizedProposalTypeText(); ?>

        	<?php endif; ?>      
        </td>
    </tr>
    <?php endif; ?>    
     <tr valign="top" id="dataCollectionField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.dataCollection"), $this);?>
</td>
        <td class="value">
        	<?php if ($this->_tpl_vars['submission']->getDataCollection($this->_tpl_vars['eng']) == 'Primary'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.primaryDataCollection"), $this);?>

        	<?php elseif ($this->_tpl_vars['submission']->getDataCollection($this->_tpl_vars['eng']) == 'Secondary'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.secondaryDataCollection"), $this);?>

        	<?php elseif ($this->_tpl_vars['submission']->getDataCollection($this->_tpl_vars['eng']) == 'Both'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.bothDataCollection"), $this);?>

        	<?php endif; ?>
        </td>
    </tr>   
    <tr valign="top" id="reviewedByOtherErcField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.reviewedByOtherErc"), $this);?>
</td>
        <td class="value">
        	<?php if ($this->_tpl_vars['submission']->getReviewedByOtherErc($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?>        
        	<?php if ($this->_tpl_vars['submission']->getOtherErcDecision($this->_tpl_vars['eng']) == 'Under Review'): ?>(<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.otherErcDecisionUnderReview"), $this);?>
)
        	<?php elseif ($this->_tpl_vars['submission']->getOtherErcDecision($this->_tpl_vars['eng']) == 'Final Decision Available'): ?>(<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.otherErcDecisionFinalAvailable"), $this);?>
)
        	<?php endif; ?>
        </td>
    </tr>
    </div>
	<div id="sourceOfMonetary">
	<tr valign="top"><td colspan="2"><h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.sourceOfMonetary"), $this);?>
</h4></td></tr>
    <tr valign="top" id="fundsRequiredField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.fundsRequired"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getFundsRequired($this->_tpl_vars['eng']); ?>
 <?php if ($this->_tpl_vars['submission']->getSelectedCurrency($this->_tpl_vars['eng']) == "US Dollar(s)"): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.fundsRequiredUSD"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.fundsRequiredEUR"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="industryGrantField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.industryGrant"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['submission']->getIndustryGrant($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <?php if (( $this->_tpl_vars['submission']->getIndustryGrant($this->_tpl_vars['eng']) ) == 'Yes'): ?>
     <tr valign="top" id="nameOfIndustryField">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getNameOfIndustry($this->_tpl_vars['eng']); ?>
</td>
    </tr>   
    <?php endif; ?>
    <tr valign="top" id="internationalGrantField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.internationalGrant"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['submission']->getInternationalGrant($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <?php if (( $this->_tpl_vars['submission']->getInternationalGrant($this->_tpl_vars['eng']) ) == 'Yes'): ?>
     <tr valign="top" id="internationalGrantNameField">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value">
        	<?php if ($this->_tpl_vars['submission']->getLocalizedInternationalGrantName()): ?>
        		<?php echo $this->_tpl_vars['submission']->getLocalizedInternationalGrantNameText(); ?>
 
        	<?php endif; ?>        
        </td>
    </tr>     
    <?php endif; ?>
    <tr valign="top" id="mohGrantField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.mohGrant"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['submission']->getMohGrant($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="governmentGrantField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.governmentGrant"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['submission']->getGovernmentGrant($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <?php if (( $this->_tpl_vars['submission']->getGovernmentGrant($this->_tpl_vars['eng']) ) == 'Yes'): ?>
     <tr valign="top" id="governmentGrantNameField">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getGovernmentGrantName($this->_tpl_vars['eng']); ?>
</td>
    </tr>     
    <?php endif; ?>
    <tr valign="top" id="universityGrantField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.universityGrant"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['submission']->getUniversityGrant($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="selfFundingField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.selfFunding"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['submission']->getSelfFunding($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="otherGrantField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.otherGrant"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['submission']->getOtherGrant($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <?php if (( $this->_tpl_vars['submission']->getOtherGrant($this->_tpl_vars['eng']) ) == 'Yes'): ?>
     <tr valign="top" id="specifyOtherGrantField">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getSpecifyOtherGrant($this->_tpl_vars['eng']); ?>
</td>
    </tr>    
    <?php endif; ?>
    </div>
    <div id=riskAssessments>
    <tr><td colspan="2"><h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.riskAssessment"), $this);?>
</h4></td></tr>
    <tr valign="top"><td colspan="2"><b><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.researchIncludesHumanSubject"), $this);?>
</b></td></tr>
    <tr valign="top" id="identityRevealedField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.identityRevealed"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['submission']->getIdentityRevealed($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="unableToConsentField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.unableToConsent"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['submission']->getUnableToConsent($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="under18Field">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.under18"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['submission']->getUnder18($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="dependentRelationshipField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.dependentRelationship"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['submission']->getDependentRelationship($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="ethnicMinorityField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.ethnicMinority"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['submission']->getEthnicMinority($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="impairmentField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.impairment"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['submission']->getImpairment($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="pregnantField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.pregnant"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['submission']->getPregnant($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top"><td colspan="2"><b><br/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.researchIncludes"), $this);?>
</b></td></tr>
    <tr valign="top" id="newTreatmentField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.newTreatment"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['submission']->getNewTreatment($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="bioSamplesField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.bioSamples"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['submission']->getBioSamples($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="radiationField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.radiation"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['submission']->getRadiation($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="distressField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.distress"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['submission']->getDistress($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="inducementsField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.inducements"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['submission']->getInducements($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="sensitiveInfoField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.sensitiveInfo"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['submission']->getSensitiveInfo($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="deceptionField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.deception"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['submission']->getDeception($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="reproTechnologyField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.reproTechnology"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['submission']->getReproTechnology($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="geneticsField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.genetics"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['submission']->getGenetics($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="stemCellField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.stemCell"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['submission']->getStemCell($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="biosafetyField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.biosafety"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['submission']->getBiosafety($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="exportField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.export"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['submission']->getExport($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>    
    <tr valign="top"><td colspan="2"><b><br/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.researchIncludes"), $this);?>
</b></td></tr>
    <tr valign="top" id="riskLevelField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.riskLevel"), $this);?>
</td>
        <td class="value">
        <?php if ($this->_tpl_vars['submission']->getRiskLevel($this->_tpl_vars['eng']) == 'No more than minimal risk'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.riskLevelNoMore"), $this);?>

        <?php elseif ($this->_tpl_vars['submission']->getRiskLevel($this->_tpl_vars['eng']) == 'Minor increase over minimal risk'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.riskLevelMinore"), $this);?>

        <?php elseif ($this->_tpl_vars['submission']->getRiskLevel($this->_tpl_vars['eng']) == 'More than minor increase over minimal risk'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.riskLevelMore"), $this);?>

        <?php endif; ?>
        </td>
    </tr>
    <?php if ($this->_tpl_vars['submission']->getRiskLevel($this->_tpl_vars['eng']) != 'No more than minimal risk'): ?>
    <tr valign="top" id="listRisksField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.listRisks"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getListRisks($this->_tpl_vars['eng']); ?>
</td>
    </tr>
    <tr valign="top" id="howRisksMinimizedField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.howRisksMinimized"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getHowRisksMinimized($this->_tpl_vars['eng']); ?>
</td>
    </tr>
    <?php endif; ?>
    <tr valign="top" id="riskApplyToField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.riskApplyTo"), $this);?>
</td>
        <td class="value">
        <?php $this->assign('riskApplyTo', $this->_tpl_vars['submission']->getRiskApplyTo()); ?>
        <?php $this->assign('firstRisk', '0'); ?>
        <?php if ($this->_tpl_vars['riskApplyTo'][$this->_tpl_vars['eng']][0] == '1'): ?>
        	<?php if ($this->_tpl_vars['firstRisk'] == '1'): ?> & <?php endif; ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.researchTeam"), $this);?>

        	<?php $this->assign('firstRisk', '1'); ?>	
        <?php endif; ?>
        <?php if ($this->_tpl_vars['riskApplyTo'][$this->_tpl_vars['eng']][1] == '1'): ?>
        	<?php if ($this->_tpl_vars['firstRisk'] == '1'): ?> & <?php endif; ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.researchSubjects"), $this);?>

        	<?php $this->assign('firstRisk', '1'); ?>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['riskApplyTo'][$this->_tpl_vars['eng']][2] == '1'): ?>
        	<?php if ($this->_tpl_vars['firstRisk'] == '1'): ?> & <?php endif; ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.widerCommunity"), $this);?>

        	<?php $this->assign('firstRisk', '1'); ?>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['riskApplyTo'][$this->_tpl_vars['eng']][0] != '1' && $this->_tpl_vars['riskApplyTo'][$this->_tpl_vars['eng']][1] != '1' && $this->_tpl_vars['riskApplyTo'][$this->_tpl_vars['eng']][2] != '1'): ?>
        	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.nobody"), $this);?>

        <?php endif; ?>
        </td>
    </tr>
    <tr valign="top"><td colspan="2"><b><br/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.potentialBenefits"), $this);?>
</b></td></tr>
    <tr valign="top" id="benefitsFromTheProjectField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.benefitsFromTheProject"), $this);?>
</td>
        <td class="value">
        <?php $this->assign('benefitsFrom', $this->_tpl_vars['submission']->getBenefitsFromTheProject()); ?>
        <?php $this->assign('firstBenefits', '0'); ?>
        <?php if ($this->_tpl_vars['benefitsFrom'][$this->_tpl_vars['eng']][0] == '1'): ?>
        	<?php if ($this->_tpl_vars['firstBenefits'] == '1'): ?> & <?php endif; ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.directBenefits"), $this);?>

        	<?php $this->assign('firstBenefits', '1'); ?>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['benefitsFrom'][$this->_tpl_vars['eng']][1] == '1'): ?>
        	<?php if ($this->_tpl_vars['firstBenefits'] == '1'): ?> & <?php endif; ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.participantCondition"), $this);?>

        	<?php $this->assign('firstBenefits', '1'); ?>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['benefitsFrom'][$this->_tpl_vars['eng']][2] == '1'): ?>
        	<?php if ($this->_tpl_vars['firstBenefits'] == '1'): ?> & <?php endif; ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.diseaseOrCondition"), $this);?>

        	<?php $this->assign('firstBenefits', '1'); ?>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['benefitsFrom'][$this->_tpl_vars['eng']][0] != '1' && $this->_tpl_vars['benefitsFrom'][$this->_tpl_vars['eng']][1] != '1' && $this->_tpl_vars['benefitsFrom'][$this->_tpl_vars['eng']][2] != '1'): ?>
        	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.noBenefits"), $this);?>

        <?php endif; ?>
        </td>
    </tr>
    <tr valign="top" id="multiInstitutionsField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.multiInstitutions"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['submission']->getMultiInstitutions($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="conflictOfInterestField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.conflictOfInterest"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['submission']->getConflictOfInterest($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php elseif ($this->_tpl_vars['submission']->getConflictOfInterest($this->_tpl_vars['eng']) == 'Not sure'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.notSure"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    </div>
</table>
</div>

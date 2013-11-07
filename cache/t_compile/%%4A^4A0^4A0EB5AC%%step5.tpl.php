<?php /* Smarty version 2.6.26, created on 2013-01-25 15:34:36
         compiled from author/submit/step5.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'author/submit/step5.tpl', 31, false),array('function', 'url', 'author/submit/step5.tpl', 33, false),array('function', 'fieldLabel', 'author/submit/step5.tpl', 493, false),array('function', 'call_hook', 'author/submit/step5.tpl', 536, false),array('modifier', 'escape', 'author/submit/step5.tpl', 34, false),array('modifier', 'to_array', 'author/submit/step5.tpl', 469, false),array('modifier', 'date_format', 'author/submit/step5.tpl', 472, false),)), $this); ?>
<?php $this->assign('pageTitle', "author.submit.step5"); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "author/submit/submitHeader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $this->assign('cam', 'kh_CA'); ?>
<?php $this->assign('eng', 'en_US'); ?>

<script type="text/javascript">
<?php echo '
<!--
function checkSubmissionChecklist(elements) {
	if (elements.type == \'checkbox\' && !elements.checked) {
		alert('; ?>
'Please confirm that you sent the proposal review fee to the appropriate ethics committee.'<?php echo ');
		return false;
	}
	return true;
}
// -->
'; ?>

</script>

<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.confirmationDescription",'journalTitle' => $this->_tpl_vars['journal']->getLocalizedTitle()), $this);?>
</p>

<form method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'saveSubmit','path' => $this->_tpl_vars['submitStep']), $this);?>
">
<input type="hidden" name="articleId" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['articleId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/formErrors.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.metadata"), $this);?>
</h3>
<table class="listing" width="100%">
    <tr valign="top"><td colspan="5" class="headseparator">&nbsp;</td></tr>
    <div id="proposalDetails">
<?php $_from = $this->_tpl_vars['article']->getAuthors(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['authors'] = array('total' => count($_from), 'iteration' => 0);
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
			<?php if ($this->_tpl_vars['author']->getPrimaryContact()): ?><?php echo $this->_tpl_vars['article']->getLocalizedAuthorPhoneNumber(); ?>

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
        <td class="value"><?php echo $this->_tpl_vars['article']->getScientificTitle($this->_tpl_vars['eng']); ?>
</td>
    </tr>
    <tr valign="top" id="camScientificTitleField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.camScientificTitle"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getScientificTitle($this->_tpl_vars['cam']); ?>
</td>
    </tr>
    <tr valign="top" id="engPublicTitleField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.engPublicTitle"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getPublicTitle($this->_tpl_vars['eng']); ?>
</td>
    </tr>
    <tr valign="top" id="camPublicTitleField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.camPublicTitle"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getPublicTitle($this->_tpl_vars['cam']); ?>
</td>
    </tr>
    <tr valign="top" id="engAbstractField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.engAbstract"), $this);?>
</td>
        <td class="value">
        	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.background"), $this);?>
<br/><?php echo $this->_tpl_vars['article']->getBackground($this->_tpl_vars['eng']); ?>
<br/><br/>
        	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.objectives"), $this);?>
<br/><?php echo $this->_tpl_vars['article']->getObjectives($this->_tpl_vars['eng']); ?>
<br/><br/>
        	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.studyMatters"), $this);?>
<br/><?php echo $this->_tpl_vars['article']->getStudyMatters($this->_tpl_vars['eng']); ?>
<br/><br/>
        	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.expectedOutcomes"), $this);?>
<br/><?php echo $this->_tpl_vars['article']->getExpectedOutcomes($this->_tpl_vars['eng']); ?>
<br/><br/>
        </td>
    </tr>
    <tr valign="top" id="camAbstractField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.camAbstract"), $this);?>
</td>
        <td class="value">
        	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.background"), $this);?>
<br/><?php echo $this->_tpl_vars['article']->getBackground($this->_tpl_vars['cam']); ?>
<br/><br/>
        	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.objectives"), $this);?>
<br/><?php echo $this->_tpl_vars['article']->getObjectives($this->_tpl_vars['cam']); ?>
<br/><br/>
        	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.studyMatters"), $this);?>
<br/><?php echo $this->_tpl_vars['article']->getStudyMatters($this->_tpl_vars['cam']); ?>
<br/><br/>
        	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.expectedOutcomes"), $this);?>
<br/><?php echo $this->_tpl_vars['article']->getExpectedOutcomes($this->_tpl_vars['cam']); ?>
<br/><br/>
        </td>
    </tr>
    <tr valign="top" id="engKeywords">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.engKeywords"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getKeywords($this->_tpl_vars['eng']); ?>
</td>
    </tr>
    <tr valign="top" id="camKeywords">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.camKeywords"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getKeywords($this->_tpl_vars['cam']); ?>
</td>
    </tr>
	<tr valign="top"><td colspan="2"><h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.proposalDetails"), $this);?>
</h4></td></tr>
	<tr valign="top" id="studentInitiatedResearchField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.studentInitiatedResearch"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['article']->getStudentInitiatedResearch($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <?php if (( $this->_tpl_vars['article']->getStudentInitiatedResearch($this->_tpl_vars['eng']) ) == 'Yes'): ?>
    <tr valign="top" id="studentInstitutionField">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.studentInstitution"), $this);?>
: <?php echo $this->_tpl_vars['article']->getStudentInstitution($this->_tpl_vars['eng']); ?>
</td>
    </tr>
    <tr valign="top" id="academicDegreeField">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.academicDegree"), $this);?>
 
        	<?php if ($this->_tpl_vars['article']->getAcademicDegree($this->_tpl_vars['eng']) == 'Undergraduate'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.undergraduate"), $this);?>

        	<?php elseif ($this->_tpl_vars['article']->getAcademicDegree($this->_tpl_vars['eng']) == 'Master'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.master"), $this);?>

        	<?php elseif ($this->_tpl_vars['article']->getAcademicDegree($this->_tpl_vars['eng']) == "Post-Doc"): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.postDoc"), $this);?>

        	<?php elseif ($this->_tpl_vars['article']->getAcademicDegree($this->_tpl_vars['eng']) == "Ph.D"): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.phd"), $this);?>

        	<?php elseif ($this->_tpl_vars['article']->getAcademicDegree($this->_tpl_vars['eng']) == 'Other'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.other"), $this);?>

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
: <?php echo $this->_tpl_vars['article']->getSupervisorFullName($this->_tpl_vars['eng']); ?>
</td>
    </tr>
    <tr valign="top" id="supervisorEmailField">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.email"), $this);?>
: <?php echo $this->_tpl_vars['article']->getSupervisorEmail($this->_tpl_vars['eng']); ?>
</td>
    </tr>
    <tr valign="top" id="supervisorPhoneField">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.phone"), $this);?>
: <?php echo $this->_tpl_vars['article']->getSupervisorPhone($this->_tpl_vars['eng']); ?>
</td>
    </tr>
    <tr valign="top" id="supervisorAffiliationField">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.affiliation"), $this);?>
: <?php echo $this->_tpl_vars['article']->getSupervisorAffiliation($this->_tpl_vars['eng']); ?>
</td>
    </tr>
    <?php endif; ?>
    <tr valign="top" id="startDateField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.startDate"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getStartDate($this->_tpl_vars['eng']); ?>
</td>
    </tr>
    <tr valign="top" id="endDateField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.endDate"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getEndDate($this->_tpl_vars['eng']); ?>
</td>
    </tr>
    <tr valign="top" id="primarySponsorField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.primarySponsor"), $this);?>
</td>
        <td class="value">
        	<?php if ($this->_tpl_vars['article']->getLocalizedPrimarySponsor()): ?>
        		<?php echo $this->_tpl_vars['article']->getLocalizedPrimarySponsorText(); ?>

        	<?php endif; ?>
    	</td>
    </tr>    
    <?php if ($this->_tpl_vars['article']->getLocalizedSecondarySponsors()): ?>
    <tr valign="top" id="secondarySponsorsField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.secondarySponsors"), $this);?>
</td>
        <td class="value">
        	<?php if ($this->_tpl_vars['article']->getLocalizedSecondarySponsors()): ?>
        		<?php echo $this->_tpl_vars['article']->getLocalizedSecondarySponsorText(); ?>

        	<?php endif; ?> 
        </td>
    </tr>
    <?php endif; ?>
    <tr valign="top" id="multiCountryResearchField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.multiCountryResearch"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['article']->getMultiCountryResearch($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
	<?php if (( $this->_tpl_vars['article']->getMultiCountryResearch($this->_tpl_vars['eng']) ) == 'Yes'): ?>
	<tr valign="top" id="multiCountryTextField">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getLocalizedMultiCountryText(); ?>
</td>
    </tr>
	<?php endif; ?>
    <tr valign="top" id="nationwideField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.nationwide"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getNationwide($this->_tpl_vars['eng']); ?>
</td>
    </tr>
    <tr valign="top" id="proposalCountryField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.proposalCountry"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getLocalizedProposalCountryText(); ?>
</td>
    </tr>
    <tr valign="top" id="researchFieldField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.researchField"), $this);?>
</td>
        <td class="value">
        	<?php if ($this->_tpl_vars['article']->getLocalizedResearchField()): ?>
        		<?php echo $this->_tpl_vars['article']->getLocalizedResearchFieldText(); ?>

        	<?php endif; ?>
        </td>
    </tr>
    <tr valign="top" id="withHumanSubjectsField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.withHumanSubjects"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['article']->getWithHumanSubjects($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <?php if (( $this->_tpl_vars['article']->getWithHumanSubjects($this->_tpl_vars['eng']) ) == 'Yes'): ?>
    <tr valign="top" id="proposalTypeField">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value">
        	<?php if (( $this->_tpl_vars['article']->getLocalizedProposalType() )): ?>
        		<?php echo $this->_tpl_vars['article']->getLocalizedProposalTypeText(); ?>

        	<?php endif; ?>      
        </td>
    </tr>
    <?php endif; ?>    
     <tr valign="top" id="dataCollectionField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.dataCollection"), $this);?>
</td>
        <td class="value">
        	<?php if ($this->_tpl_vars['article']->getDataCollection($this->_tpl_vars['eng']) == 'Primary'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.primaryDataCollection"), $this);?>

        	<?php elseif ($this->_tpl_vars['article']->getDataCollection($this->_tpl_vars['eng']) == 'Secondary'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.secondaryDataCollection"), $this);?>

        	<?php elseif ($this->_tpl_vars['article']->getDataCollection($this->_tpl_vars['eng']) == 'Both'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.bothDataCollection"), $this);?>

        	<?php endif; ?>
        </td>
    </tr>   
    <tr valign="top" id="reviewedByOtherErcField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.reviewedByOtherErc"), $this);?>
</td>
        <td class="value">
        	<?php if ($this->_tpl_vars['article']->getReviewedByOtherErc($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?>        
        	<?php if ($this->_tpl_vars['article']->getOtherErcDecision($this->_tpl_vars['eng']) == 'Under Review'): ?>(<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.otherErcDecisionUnderReview"), $this);?>
)
        	<?php elseif ($this->_tpl_vars['article']->getOtherErcDecision($this->_tpl_vars['eng']) == 'Final Decision Available'): ?>(<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.otherErcDecisionFinalAvailable"), $this);?>
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
        <td class="value"><?php echo $this->_tpl_vars['article']->getFundsRequired($this->_tpl_vars['eng']); ?>
 <?php if ($this->_tpl_vars['article']->getSelectedCurrency($this->_tpl_vars['eng']) == "US Dollar(s)"): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.fundsRequiredUSD"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.fundsRequiredEUR"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="industryGrantField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.industryGrant"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['article']->getIndustryGrant($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <?php if (( $this->_tpl_vars['article']->getIndustryGrant($this->_tpl_vars['eng']) ) == 'Yes'): ?>
     <tr valign="top" id="nameOfIndustryField">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getNameOfIndustry($this->_tpl_vars['eng']); ?>
</td>
    </tr>   
    <?php endif; ?>
    <tr valign="top" id="internationalGrantField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.internationalGrant"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['article']->getInternationalGrant($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <?php if (( $this->_tpl_vars['article']->getInternationalGrant($this->_tpl_vars['eng']) ) == 'Yes'): ?>
     <tr valign="top" id="internationalGrantNameField">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value">
        	<?php if ($this->_tpl_vars['article']->getLocalizedInternationalGrantName()): ?>
        		<?php echo $this->_tpl_vars['article']->getLocalizedInternationalGrantNameText(); ?>
 
        	<?php endif; ?>        
        </td>
    </tr>     
    <?php endif; ?>
    <tr valign="top" id="mohGrantField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.mohGrant"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['article']->getMohGrant($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="governmentGrantField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.governmentGrant"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['article']->getGovernmentGrant($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <?php if (( $this->_tpl_vars['article']->getGovernmentGrant($this->_tpl_vars['eng']) ) == 'Yes'): ?>
     <tr valign="top" id="governmentGrantNameField">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getGovernmentGrantName($this->_tpl_vars['eng']); ?>
</td>
    </tr>     
    <?php endif; ?>
    <tr valign="top" id="universityGrantField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.universityGrant"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['article']->getUniversityGrant($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="selfFundingField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.selfFunding"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['article']->getSelfFunding($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="otherGrantField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.otherGrant"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['article']->getOtherGrant($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <?php if (( $this->_tpl_vars['article']->getOtherGrant($this->_tpl_vars['eng']) ) == 'Yes'): ?>
     <tr valign="top" id="specifyOtherGrantField">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getSpecifyOtherGrant($this->_tpl_vars['eng']); ?>
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
        <td class="value"><?php if ($this->_tpl_vars['article']->getIdentityRevealed($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="unableToConsentField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.unableToConsent"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['article']->getUnableToConsent($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="under18Field">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.under18"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['article']->getUnder18($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="dependentRelationshipField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.dependentRelationship"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['article']->getDependentRelationship($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="ethnicMinorityField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.ethnicMinority"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['article']->getEthnicMinority($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="impairmentField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.impairment"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['article']->getImpairment($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="pregnantField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.pregnant"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['article']->getPregnant($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top"><td colspan="2"><b><br/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.researchIncludes"), $this);?>
</b></td></tr>
    <tr valign="top" id="newTreatmentField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.newTreatment"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['article']->getNewTreatment($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="bioSamplesField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.bioSamples"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['article']->getBioSamples($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="radiationField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.radiation"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['article']->getRadiation($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="distressField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.distress"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['article']->getDistress($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="inducementsField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.inducements"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['article']->getInducements($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="sensitiveInfoField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.sensitiveInfo"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['article']->getSensitiveInfo($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="deceptionField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.deception"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['article']->getDeception($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="reproTechnologyField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.reproTechnology"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['article']->getReproTechnology($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="geneticsField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.genetics"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['article']->getGenetics($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="stemCellField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.stemCell"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['article']->getStemCell($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="biosafetyField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.biosafety"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['article']->getBiosafety($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="exportField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.export"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['article']->getExport($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top"><td colspan="2"><b><br/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.researchIncludes"), $this);?>
</b></td></tr>
    <tr valign="top" id="riskLevelField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.riskLevel"), $this);?>
</td>
        <td class="value">
        <?php if ($this->_tpl_vars['article']->getRiskLevel($this->_tpl_vars['eng']) == 'No more than minimal risk'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.riskLevelNoMore"), $this);?>

        <?php elseif ($this->_tpl_vars['article']->getRiskLevel($this->_tpl_vars['eng']) == 'Minor increase over minimal risk'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.riskLevelMinore"), $this);?>

        <?php elseif ($this->_tpl_vars['article']->getRiskLevel($this->_tpl_vars['eng']) == 'More than minor increase over minimal risk'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.riskLevelMore"), $this);?>

        <?php endif; ?>
        </td>
    </tr>
    <?php if ($this->_tpl_vars['article']->getRiskLevel($this->_tpl_vars['eng']) != 'No more than minimal risk'): ?>
    <tr valign="top" id="listRisksField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.listRisks"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getListRisks($this->_tpl_vars['eng']); ?>
</td>
    </tr>
    <tr valign="top" id="howRisksMinimizedField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.howRisksMinimized"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getHowRisksMinimized($this->_tpl_vars['eng']); ?>
</td>
    </tr>
    <?php endif; ?>
    <tr valign="top" id="riskApplyToField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.riskApplyTo"), $this);?>
</td>
        <td class="value">
        <?php $this->assign('riskApplyTo', $this->_tpl_vars['article']->getRiskApplyTo(null)); ?>
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
        <?php $this->assign('benefitsFrom', $this->_tpl_vars['article']->getBenefitsFromTheProject()); ?>
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
        <td class="value"><?php if ($this->_tpl_vars['article']->getMultiInstitutions($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    <tr valign="top" id="conflictOfInterestField">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.conflictOfInterest"), $this);?>
</td>
        <td class="value"><?php if ($this->_tpl_vars['article']->getConflictOfInterest($this->_tpl_vars['eng']) == 'Yes'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php elseif ($this->_tpl_vars['article']->getConflictOfInterest($this->_tpl_vars['eng']) == 'Not sure'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.notSure"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    </tr>
    </div>
</table>
<div class="separator"></div>


<br />
<br />

<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.filesSummary"), $this);?>
</h3>
<table class="listing" width="100%">
<tr>
	<td colspan="5" class="headseparator">&nbsp;</td>
</tr>
<tr class="heading" valign="bottom">
	<!--td width="10%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.id"), $this);?>
</td-->
	<td width="35%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.originalFileName"), $this);?>
</td>
	<td width="25%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.type"), $this);?>
</td>
	<td width="20%" class="nowrap"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.fileSize"), $this);?>
</td>
	<td width="10%" class="nowrap"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.dateUploaded"), $this);?>
</td>
</tr>
<tr>
	<td colspan="5" class="headseparator">&nbsp;</td>
</tr>
<?php $_from = $this->_tpl_vars['files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['file']):
?>
<tr valign="top">
	<!--td><?php echo $this->_tpl_vars['file']->getFileId(); ?>
</td-->
	<td><a class="file" href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'download','path' => ((is_array($_tmp=$this->_tpl_vars['articleId'])) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['file']->getFileId()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['file']->getFileId()))), $this);?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['file']->getOriginalFileName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a></td>
	<td><?php if (( $this->_tpl_vars['file']->getType() == 'supp' )): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.suppFile"), $this);?>
<?php elseif (( $this->_tpl_vars['file']->getType() == 'previous' )): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.previousSubmissionFile"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.submissionFile"), $this);?>
<?php endif; ?></td>
	<td><?php echo $this->_tpl_vars['file']->getNiceFileSize(); ?>
</td>
	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['file']->getDateUploaded())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatTrunc']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatTrunc'])); ?>
</td>
</tr>
<?php endforeach; else: ?>
<tr valign="top">
<td colspan="5" class="nodata"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.noFiles"), $this);?>
</td>
</tr>
<?php endif; unset($_from); ?>
</table>
<div class="separator"></div>


<br />
<br />

<div id="commentsForEditor">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.commentsForEditor"), $this);?>
</h3>

<table width="100%" class="data">
<tr valign="top">
	<td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'commentsToEditor','key' => "author.submit.comments"), $this);?>
</td>
	<td width="80%" class="value"><textarea name="commentsToEditor" id="commentsToEditor" rows="3" cols="40" class="textArea"><?php echo ((is_array($_tmp=$this->_tpl_vars['commentsToEditor'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</textarea></td>
</tr>
</table>

</div>
<div class="separator"></div>

<?php if ($this->_tpl_vars['authorFees'] && $this->_tpl_vars['article']->getLocalizedStudentInitiatedResearch() != 'Yes'): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "author/submit/authorFees.tpl", 'smarty_include_vars' => array('showPayLinks' => 1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php if ($this->_tpl_vars['currentJournal']->getLocalizedSetting('waiverPolicy') != ''): ?>
		<?php if ($this->_tpl_vars['manualPayment']): ?>
						<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "payment.instruction"), $this);?>
</p>
			<table class="data" width="100%">
				<tr valign="top">
					<td width="5%" align="left"><input type="checkbox" id="paymentSent" name="paymentSent" value="1" <?php if ($this->_tpl_vars['paymentSent']): ?>checked="checked"<?php endif; ?> /></td>
					<td width="95%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "payment.paymentSent"), $this);?>
</td>
				</tr>
			</table>
		<?php endif; ?>
		
		<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.requestWaiver"), $this);?>
</h3>
		<table class="data" width="100%">
			<tr valign="top">
				<td width="5%" align="left"><input type="checkbox" name="qualifyForWaiver" value="1" <?php if ($this->_tpl_vars['qualifyForWaiver']): ?>checked="checked"<?php endif; ?>/></td>
				<td width="95%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.qualityForWaiver"), $this);?>
</td>
			</tr>
			<tr>
				<td />
				<td>
					<label for="commentsToEditor"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.addReasonsForWaiver"), $this);?>
</label><br />
					<textarea name="commentsToEditor" id="commentsToEditor" rows="3" cols="40" class="textArea"><?php echo ((is_array($_tmp=$this->_tpl_vars['commentsToEditor'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</textarea>
				</td>
			</tr>
		</table>
		
	<?php endif; ?>

	<div class="separator"></div>
<?php endif; ?>

<?php echo $this->_plugins['function']['call_hook'][0][0]->smartyCallHook(array('name' => "Templates::Author::Submit::Step5::AdditionalItems"), $this);?>

<p><font color=#FF0000><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.form.pleaseVerify"), $this);?>
</font></p>
<p><input type="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.finishSubmission"), $this);?>
" class="button defaultButton" <?php if ($this->_tpl_vars['authorFees'] && $this->_tpl_vars['article']->getLocalizedStudentInitiatedResearch() != 'Yes'): ?> onclick="return checkSubmissionChecklist(document.getElementById('paymentSent'))"<?php endif; ?> /> <input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.cancel"), $this);?>
" class="button" onclick="confirmAction('<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'author'), $this);?>
', '<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.cancelSubmission"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'jsparam') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'jsparam'));?>
')" /></p>
</form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

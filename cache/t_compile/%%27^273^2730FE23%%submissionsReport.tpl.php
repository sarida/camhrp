<?php /* Smarty version 2.6.26, created on 2013-01-25 09:05:20
         compiled from sectionEditor/reports/submissionsReport.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'sectionEditor/reports/submissionsReport.tpl', 13, false),array('function', 'url', 'sectionEditor/reports/submissionsReport.tpl', 507, false),array('function', 'translate', 'sectionEditor/reports/submissionsReport.tpl', 507, false),array('function', 'html_options_translate', 'sectionEditor/reports/submissionsReport.tpl', 706, false),array('function', 'html_options', 'sectionEditor/reports/submissionsReport.tpl', 873, false),)), $this); ?>

<?php echo ''; ?><?php $this->assign('pageTitle', "editor.reports.reportGenerator"); ?><?php echo ''; ?><?php $this->assign('pageCrumbTitle', "editor.reports.submissions"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>

<script type="text/javascript" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['baseUrl'])) ? $this->_run_mod_handler('cat', true, $_tmp, "/lib/pkp/js/lib/jquery/jquery-ui-timepicker-addon.js") : smarty_modifier_cat($_tmp, "/lib/pkp/js/lib/jquery/jquery-ui-timepicker-addon.js")); ?>
"></script>
<?php echo '<script type="text/javascript">
$(document).ready(function() {
		hideSubmissionCheckboxes();
		hideAuthorCheckboxes();
		hideProposalDetailsCheckboxes();
		hideSourceOfMonetaryCheckboxes();
		hideRiskAssessmentCheckboxes()
        //Restrict end date to (start date) + 1
        $( "#startDateBefore" ).datepicker(
        	{
        		changeMonth: true, changeYear: true, dateFormat: \'dd-M-yy\', onSelect: function(dateText, inst){
            		dayAfter = new Date();
                    dayAfter = $("#startDateBefore").datepicker("getDate");
                    dayAfter.setDate(dayAfter.getDate() + 1);
                    $("#endDateBefore").datepicker("option","minDate", dayAfter)
                }
        	}
        );
            
        $( "#endDateBefore" ).datepicker(
        	{
        		changeMonth: true, changeYear: true, dateFormat: \'dd-M-yy\'
        	}
        );
        
        $( "#startDateAfter" ).datepicker(
        	{
        		changeMonth: true, changeYear: true, dateFormat: \'dd-M-yy\', onSelect: function(dateText, inst){
            		dayAfter = new Date();
                    dayAfter = $("#startDateAfter").datepicker("getDate");
                    dayAfter.setDate(dayAfter.getDate() + 1);
                    $("#endDateAfter").datepicker("option","minDate", dayAfter)
                }
            }
        );  
            
        $( "#endDateAfter" ).datepicker(
        	{
        		changeMonth: true, changeYear: true, dateFormat: \'dd-M-yy\'
        	}
        );
        
        $( "#submittedBefore" ).datepicker(
        	{
        		changeMonth: true, changeYear: true, maxDate: \'0\', dateFormat: \'dd-M-yy\', onSelect: function(dateText, inst){
            		dayAfter = new Date();
                    dayAfter = $("#submittedBefore").datepicker("getDate");
                    dayAfter.setDate(dayAfter.getDate() + 1);
                    $("#approvedBefore").datepicker("option","minDate", dayAfter)
                }
            }
        );
        
        $( "#approvedBefore" ).datepicker(
        	{
        		changeMonth: true, changeYear: true, dateFormat: \'dd-M-yy\', maxDate: \'0\', onSelect: function(){
        			showProposalDetails();
        			$(\'.decisionField\').remove();
        			$(\'#decisions\').val(\'editor.article.decision.accept\');
        		}
        	}
        );
        
        $( "#submittedAfter" ).datepicker(
        	{
        		changeMonth: true, changeYear: true, maxDate: \'-1 d\', dateFormat: \'dd-M-yy\', onSelect: function(dateText, inst){
            		dayAfter = new Date();
                    dayAfter = $("#submittedAfter").datepicker("getDate");
                    dayAfter.setDate(dayAfter.getDate() + 1);
                    $("#approvedAfter").datepicker("option","minDate", dayAfter)
                }
            }
        );

        $( "#approvedAfter" ).datepicker(
        	{
        		changeMonth: true, changeYear: true, dateFormat: \'dd-M-yy\', maxDate: \'-1 d\', onSelect: function(){
        			showProposalDetails();
        			$(\'.decisionField\').remove();
        			$(\'#decisions\').val(\'editor.article.decision.accept\');
        		}
        	}
        );
        
        $(\'#decisions\').change(function(){
        	if ($(\'#decisions\').val() != \'editor.article.decision.accept\') {
        		if ($(\'#approvedAfter\').val() != "" || $(\'#approvedBefore\').val() != ""){
        			$(\'#approvedAfter\').val("");
        			$(\'#approvedBefore\').val("");
        		}
        	}
        });
        
        //Start code for multiple decisions
        $(\'#addAnotherDecision\').click(
        	function(){
       			var decisionHtml = \'<tr valign="top" class="decisionField">\' + $(\'#firstDecision\').html() + \'</tr>\';
            	$(\'#firstDecision\').after(decisionHtml);
        		$(\'#firstDecision\').next().find(\'select\').attr(\'selectedIndex\', 0);
        		$(\'.decisionField\').find(\'.removeDecision\').show();
        		$(\'.decisionField\').find(\'.decisionTitle\').hide();
        		$(\'.decisionField\').find(\'.noDecisionTitle\').show();
        		$(\'#firstDecision\').find(\'.removeDecision\').hide();
        		$(\'#firstDecision\').find(\'.decisionTitle\').show();
        		$(\'#firstDecision\').find(\'.noDecisionTitle\').hide();
        		if ($(\'#approvedAfter\').val() != "" || $(\'#approvedBefore\').val() != ""){
        			$(\'#approvedAfter\').val("");
        			$(\'#approvedBefore\').val("");
        		}
            	return false;
        	}
    	);

        $(\'.removeDecision\').live(
        	\'click\', function(){
        		$(this).closest(\'tr\').remove();
        		return false;
        	}
        );
        
        //Start code for multiple primary sponsor
        $(\'#addAnotherPrimarySponsor\').click(
        	function(){
       			var primarySponsorHtml = \'<tr valign="top" class="primarySponsorField">\' + $(\'#firstPrimarySponsor\').html() + \'</tr>\';
            	$(\'#firstPrimarySponsor\').after(primarySponsorHtml);
        		$(\'#firstPrimarySponsor\').next().find(\'select\').attr(\'selectedIndex\', 0);
        		$(\'.primarySponsorField\').find(\'.removePrimarySponsor\').show();
        		$(\'.primarySponsorField\').find(\'.primarySponsorTitle\').hide();
        		$(\'.primarySponsorField\').find(\'.noPrimarySponsorTitle\').show();
        		$(\'#firstPrimarySponsor\').find(\'.removePrimarySponsor\').hide();
        		$(\'#firstPrimarySponsor\').find(\'.primarySponsorTitle\').show();
        		$(\'#firstPrimarySponsor\').find(\'.noPrimarySponsorTitle\').hide();
            	return false;
        	}
    	);

        $(\'.removePrimarySponsor\').live(
        	\'click\', function(){
        		$(this).closest(\'tr\').remove();
        		return false;
        	}
        );
        
        //Start code for multiple primary sponsor
        $(\'#addAnotherSecondarySponsor\').click(
        	function(){
       			var secondarySponsorHtml = \'<tr valign="top" class="secondarySponsorField">\' + $(\'#firstSecondarySponsor\').html() + \'</tr>\';
            	$(\'#firstSecondarySponsor\').after(secondarySponsorHtml);
        		$(\'#firstSecondarySponsor\').next().find(\'select\').attr(\'selectedIndex\', 0);
        		$(\'.secondarySponsorField\').find(\'.removeSecondarySponsor\').show();
        		$(\'.secondarySponsorField\').find(\'.secondarySponsorTitle\').hide();
        		$(\'.secondarySponsorField\').find(\'.noSecondarySponsorTitle\').show();
        		$(\'#firstSecondarySponsor\').find(\'.removeSecondarySponsor\').hide();
        		$(\'#firstSecondarySponsor\').find(\'.secondarySponsorTitle\').show();
        		$(\'#firstSecondarySponsor\').find(\'.noSecondarySponsorTitle\').hide();
            	return false;
        	}
    	);

        $(\'.removeSecondarySponsor\').live(
        	\'click\', function(){
        		$(this).closest(\'tr\').remove();
        		return false;
        	}
        );
        
        //Start code for multiple research Field
        $(\'#addAnotherResearchField\').click(
        	function(){
       			var researchFieldHtml = \'<tr valign="top" class="researchFieldField">\' + $(\'#firstResearchField\').html() + \'</tr>\';
            	$(\'#firstResearchField\').after(researchFieldHtml);
        		$(\'#firstResearchField\').next().find(\'select\').attr(\'selectedIndex\', 0);
        		$(\'.researchFieldField\').find(\'.removeResearchField\').show();
        		$(\'.researchFieldField\').find(\'.researchFieldTitle\').hide();
        		$(\'.researchFieldField\').find(\'.noResearchFieldTitle\').show();
        		$(\'#firstResearchField\').find(\'.removeResearchField\').hide();
        		$(\'#firstResearchField\').find(\'.researchFieldTitle\').show();
        		$(\'#firstResearchField\').find(\'.noResearchFieldTitle\').hide();
            	return false;
        	}
    	);

        $(\'.removeResearchField\').live(
        	\'click\', function(){
        		$(this).closest(\'tr\').remove();
        		return false;
        	}
        );
        
                
        //Start code for multiple proposal type
        $(\'#addAnotherProposalType\').click(
        	function(){
       			var proposalTypeHtml = \'<tr valign="top" class="proposalTypeField">\' + $(\'#firstProposalType\').html() + \'</tr>\';
            	$(\'#firstProposalType\').after(proposalTypeHtml);
        		$(\'#firstProposalType\').next().find(\'select\').attr(\'selectedIndex\', 0);
        		$(\'.proposalTypeField\').find(\'.removeProposalType\').show();
        		$(\'.proposalTypeField\').find(\'.proposalTypeTitle\').hide();
        		$(\'.proposalTypeField\').find(\'.noProposalTypeTitle\').show();
        		$(\'#firstProposalType\').find(\'.removeProposalType\').hide();
        		$(\'#firstProposalType\').find(\'.proposalTypeTitle\').show();
        		$(\'#firstProposalType\').find(\'.noProposalTypeTitle\').hide();
            	return false;
        	}
    	);

        $(\'.removeProposalType\').live(
        	\'click\', function(){
        		$(this).closest(\'tr\').remove();
        		return false;
        	}
        );
        
        //Start code for multiple provinces
        $(\'#addAnotherProvince\').click(
        	function(){
       			var provinceHtml = \'<tr valign="top" class="provinceField">\' + $(\'#firstProvince\').html() + \'</tr>\';
            	$(\'#firstProvince\').after(provinceHtml);
        		$(\'#firstProvince\').next().find(\'select\').attr(\'selectedIndex\', 0);
        		$(\'.provinceField\').find(\'.removeProvince\').show();
        		$(\'.provinceField\').find(\'.provinceTitle\').hide();
        		$(\'.provinceField\').find(\'.noProvinceTitle\').show();
        		$(\'#firstProvince\').find(\'.removeProvince\').hide();
        		$(\'#firstProvince\').find(\'.provinceTitle\').show();
        		$(\'#firstProvince\').find(\'.noProvinceTitle\').hide();
            	return false;
        	}
    	);

        $(\'.removeProvince\').live(
        	\'click\', function(){
        		$(this).closest(\'tr\').remove();
        		return false;
        	}
        );
});

function hideProposalDetails(){
	$(\'.decisionField\').remove();
	$(\'.primarySponsorField\').remove();
	$(\'.secondarySponsorField\').remove();
	$(\'.researchFieldField\').remove();
	$(\'.proposalTypeField\').remove();
	
	$(\'#proposalDetails\').hide();
	$(\'#academicDegreeField\').hide();
	$(\'#showProposalDetails\').show();
	
	$(\'#ercnioph\').removeAttr(\'checked\');
	$(\'#ercuhs\').removeAttr(\'checked\');
	$(\'#studentResearchy\').removeAttr(\'checked\');
	$(\'#studentResearchn\').removeAttr(\'checked\');
	
	$(\'#decisions\').val("");
	$(\'#academicDegree\').val("");
	$(\'#primarySponsors\').val("");
	$(\'#secondarySponsors\').val("");
	$(\'#researchFields\').val("");
	$(\'#proposalTypes\').val("");
	$(\'#dataCollection\').val("");
	
	if ($(\'#approvedAfter\').val() != "" || $(\'#approvedBefore\').val() != ""){
    	$(\'#approvedAfter\').val("");
        $(\'#approvedBefore\').val("");
    }
}

function showProposalDetails(){
	$(\'#proposalDetails\').show();
	$(\'#showProposalDetails\').hide();	
}

function hideGeographicalAreas(){
	document.getElementById(\'firstProvince\').style.display = \'none\';
	document.getElementById(\'addAnotherProvince\').style.display = \'none\';
	$(\'#geographicalAreas\').hide();
	$(\'.provinceField\').remove();
	$(\'#showGeographicalAreas\').show();
	$(\'#multicountryy\').removeAttr(\'checked\');
	$(\'#multicountryn\').removeAttr(\'checked\');
	$(\'#provinces\').val("");
}

function showGeographicalAreas(){
	$(\'#geographicalAreas\').show();
	$(\'#showGeographicalAreas\').hide();	
}

function hideDates(){

	$(\'#dates\').hide();
	$(\'#showDates\').show();
	
	$(\'#researchDates\').hide();
	$(\'#reviewDates\').hide();

	$(\'#showResearchDates\').show();
	$(\'#hideResearchDates\').hide();

	$(\'#showReviewDates\').show();
	$(\'#hideReviewDates\').hide();
	
	$(\'#startDateBefore\').val("");
	$(\'#startDateAfter\').val("");
	$(\'#endDateBefore\').val("");
	$(\'#endDateAfter\').val("");
	
	$(\'#submittedBefore\').val("");
	$(\'#submittedAfter\').val("");
	$(\'#approvedBefore\').val("");
	$(\'#approvedAfter\').val("");
}

function showDates(){
	$(\'#dates\').show();
	$(\'#showDates\').hide();	
}

function showResearchDates(){
	$(\'#showResearchDates\').hide();
	$(\'#researchDates\').show();
	$(\'#hideResearchDates\').show();	
}

function hideResearchDates(){
	$(\'#showResearchDates\').show();
	$(\'#researchDates\').hide();
	$(\'#hideResearchDates\').hide();
	$(\'#startDateBefore\').val("");
	$(\'#startDateAfter\').val("");
	$(\'#endDateBefore\').val("");
	$(\'#endDateAfter\').val("");
}

function showReviewDates(){
	$(\'#showReviewDates\').hide();
	$(\'#reviewDates\').show();
	$(\'#hideReviewDates\').show();	
}

function hideReviewDates(){
	$(\'#showReviewDates\').show();
	$(\'#reviewDates\').hide();
	$(\'#hideReviewDates\').hide();
	$(\'#submittedBefore\').val("");
	$(\'#submittedAfter\').val("");
	$(\'#approvedBefore\').val("");
	$(\'#approvedAfter\').val("");
}

function showOrHideProvince(value){
	if (value == \'No\'){
		document.getElementById(\'firstProvince\').style.display = \'\';
		document.getElementById(\'addAnotherProvince\').style.display = \'\';
	} else {
		document.getElementById(\'firstProvince\').style.display = \'none\';
		document.getElementById(\'addAnotherProvince\').style.display = \'none\';
		$(\'.provinceField\').remove();
		$(\'#provinces\').val("");
	}
}

function showOrHideAcademicDegreeField(value){
	if (value == \'Yes\') {
		document.getElementById(\'academicDegreeField\').style.display = \'\';	
	} else {
		document.getElementById(\'academicDegreeField\').style.display = \'none\';
		$(\'#academicDegree\').val("");
	}
}

function submissionCheckAll(){
	$(\'.checkSubmission\').attr(\'checked\',\'checked\');
}

function submissionUncheckAll(){
	$(\'.checkSubmission\').removeAttr(\'checked\');
}

function investigatorCheckAll(){
	$(\'.checkInvestigator\').attr(\'checked\',\'checked\');
}

function investigatorUncheckAll(){
	$(\'.checkInvestigator\').removeAttr(\'checked\');
}

function detailsCheckAll(){
	$(\'.checkDetails\').attr(\'checked\',\'checked\');
}

function detailsUncheckAll(){
	$(\'.checkDetails\').removeAttr(\'checked\');
}

function monetaryCheckAll(){
	$(\'.checkMonetary\').attr(\'checked\',\'checked\');
}

function monetaryUncheckAll(){
	$(\'.checkMonetary\').removeAttr(\'checked\');
}

function riskCheckAll(){
	$(\'.checkRisk\').attr(\'checked\',\'checked\');
}

function riskUncheckAll(){
	$(\'.checkRisk\').removeAttr(\'checked\');
}

function hideSubmissionCheckboxes(){
	$(\'#submission\').hide();
	$(\'#hideSubmissionCheckboxes\').hide();
	$(\'#showSubmissionCheckboxes\').show();
}

function showSubmissionCheckboxes(){
	$(\'#submission\').show();
	$(\'#hideSubmissionCheckboxes\').show();
	$(\'#showSubmissionCheckboxes\').hide();
}

function hideAuthorCheckboxes(){
	$(\'#author\').hide();
	$(\'#hideAuthorCheckboxes\').hide();
	$(\'#showAuthorCheckboxes\').show();
}

function showAuthorCheckboxes(){
	$(\'#author\').show();
	$(\'#hideAuthorCheckboxes\').show();
	$(\'#showAuthorCheckboxes\').hide();
}

function hideProposalDetailsCheckboxes(){
	$(\'#metadata\').hide();
	$(\'#hideProposalDetailsCheckboxes\').hide();
	$(\'#showProposalDetailsCheckboxes\').show();
}

function showProposalDetailsCheckboxes(){
	$(\'#metadata\').show();
	$(\'#hideProposalDetailsCheckboxes\').show();
	$(\'#showProposalDetailsCheckboxes\').hide();
}

function hideSourceOfMonetaryCheckboxes(){
	$(\'#sourceOfMonetary\').hide();
	$(\'#hideSourceOfMonetaryCheckboxes\').hide();
	$(\'#showSourceOfMonetaryCheckboxes\').show();
}

function showSourceOfMonetaryCheckboxes(){
	$(\'#sourceOfMonetary\').show();
	$(\'#hideSourceOfMonetaryCheckboxes\').show();
	$(\'#showSourceOfMonetaryCheckboxes\').hide();
}

function hideRiskAssessmentCheckboxes(){
	$(\'#riskAssessment\').hide();
	$(\'#hideRiskAssessmentCheckboxes\').hide();
	$(\'#showRiskAssessmentCheckboxes\').show();
}

function showRiskAssessmentCheckboxes(){
	$(\'#riskAssessment\').show();
	$(\'#hideRiskAssessmentCheckboxes\').show();
	$(\'#showRiskAssessmentCheckboxes\').hide();
}

</script>
<style type="text/css">
	.checkboxes tr {
		height : 30px;
		width : 700px;
	 }
	 .checkboxes input{
	 	margin-top: 0px;
		width: 15px;
    	height: 15px;
    	float: left;
	 }
	 .checkboxes label{
	 	float: left;
	 	padding-left: 15px;
	 	margin-top: 10px;
	 	font-size: 11px;
	 } 
</style>
'; ?>

<!--
<ul class="menu">
	<li><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'submissionsReport'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.submissions"), $this);?>
</a></li>
	<li class="current"><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'meetingAttendanceReport'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.meetingAttendance"), $this);?>
</a></li>
</ul>
<div class="separator"></div>
<h2><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.submissions"), $this);?>
</h2>
-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/formErrors.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="submissionsReport">
<form method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'submissionsReport'), $this);?>
">

	<?php if (! $this->_tpl_vars['dateFrom']): ?>
	<?php $this->assign('dateFrom', "--"); ?>
	<?php endif; ?>
	
	<?php if (! $this->_tpl_vars['dateTo']): ?>
	<?php $this->assign('dateTo', "--"); ?>
	<?php endif; ?>

<h5><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.metadataExport"), $this);?>
</h5>
<h4><a href="#submissionCheckboxes" onclick="hideSubmissionCheckboxes()" class="action" id="hideSubmissionCheckboxes"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.submission"), $this);?>
</a></h4>
<h4><a href="#submissionCheckboxes" onclick="showSubmissionCheckboxes()" class="action" id="showSubmissionCheckboxes"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.submission"), $this);?>
</a></h4>
<a name="submissionCheckboxes"></a>
<div id="submission">
<table width="100%" class="data">
	<tr valign="top">
		<td width="25%"></td>
		<td width="25%"></td>
		<td width="25%"></td>
		<td width="25%"></td>
	</tr>
	<tr>
		<td colspan="4" align="right"><a href="javascript:void(0)" onclick="submissionCheckAll()" id="submissionCheckAll"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.checkAll"), $this);?>
</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:void(0)" onclick="submissionUncheckAll()" id="submissionUncheckAll"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.uncheckAll"), $this);?>
</a></td>
	</tr>
	<tr>
		<td><input type="checkbox" name="checkProposalId" class="checkSubmission" checked="checked"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.id"), $this);?>
</td>
		<td><input type="checkbox" name="checkDateApproved" class="checkSubmission"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.approvalDate"), $this);?>
</td>
		<td><input type="checkbox" name="checkDecision" class="checkSubmission" checked="checked"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.status"), $this);?>
</td>
		<td><input type="checkbox" name="checkDateSubmitted" class="checkSubmission"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.dateSubmitted"), $this);?>
</td>
	</tr>
</table>
</div>
<h4><a href="#authorCheckboxes" onclick="hideAuthorCheckboxes()" class="action" id="hideAuthorCheckboxes"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.author"), $this);?>
</a></h4>
<h4><a href="#authorCheckboxes" onclick="showAuthorCheckboxes()" class="action" id="showAuthorCheckboxes"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.author"), $this);?>
</a></h4>
<a name="authorCheckboxes"></a>
<div id="author">
<table width="100%" class="data">
	<tr valign="top">
		<td width="25%"></td>
		<td width="25%"></td>
		<td width="25%"></td>
		<td width="25%"></td>
	</tr>
	<tr>
		<td colspan="4" align="right"><a href="javascript:void(0)" onclick="investigatorCheckAll()" id="investigatorCheckAll"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.checkAll"), $this);?>
</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:void(0)" onclick="investigatorUncheckAll()" id="investigatorUncheckAll"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.uncheckAll"), $this);?>
</a></td>
	</tr>
	<tr>
		<td><input type="checkbox" name="checkName" class="checkInvestigator" checked="checked"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.fullName"), $this);?>
</td>
		<td><input type="checkbox" name="checkAffiliation" class="checkInvestigator" checked="checked"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.affiliation"), $this);?>
</td>
		<td><input type="checkbox" name="checkEmail" class="checkInvestigator"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.email"), $this);?>
</td>
	</tr>
</table>
</div>
<h4><a href="#proposalDetailsCheckboxes" onclick="hideProposalDetailsCheckboxes()" class="action" id="hideProposalDetailsCheckboxes"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.proposalDetails"), $this);?>
</a></h4>
<h4><a href="#proposalDetailsCheckboxes" onclick="showProposalDetailsCheckboxes()" class="action" id="showProposalDetailsCheckboxes"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.proposalDetails"), $this);?>
</a></h4>
<a name="proposalDetailsCheckboxes"></a>
<div id="metadata">
<table width="100%" class="data">
	<tr valign="top">
		<td width="25%"></td>
		<td width="25%"></td>
		<td width="25%"></td>
		<td width="25%"></td>
	</tr>
	<tr>
		<td colspan="4" align="right"><a href="javascript:void(0)" onclick="detailsCheckAll()" id="detailsCheckAll"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.checkAll"), $this);?>
</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:void(0)" onclick="detailsUncheckAll()" id="detailsUncheckAll"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.uncheckAll"), $this);?>
</a></td>
	</tr>
	<tr>
		<td><input type="checkbox" name="checkEngScientificTitle" class="checkDetails" checked="checked"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.engScientificTitle"), $this);?>
</td>
		<td><input type="checkbox" name="checkCamScientificTitle" class="checkDetails"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.camScientificTitle"), $this);?>
</td>
	</tr>
	<tr>
		<td><input type="checkbox" name="checkPrimarySponsor" class="checkDetails" checked="checked"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.primarySponsor"), $this);?>
</td>
		<td><input type="checkbox" name="checkSecondarSponsor" class="checkDetails" checked="checked"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.secondarySponsors"), $this);?>
</td>
		<td><input type="checkbox" name="checkResearchFields" class="checkDetails" checked="checked"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.researchField"), $this);?>
</td>
		<td><input type="checkbox" name="checkProposalTypes" class="checkDetails" checked="checked"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.proposalType"), $this);?>
</td>
	</tr>
	<tr>
		<td><input type="checkbox" name="checkArea" class="checkDetails" checked="checked"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.proposalCountry"), $this);?>
</td>
		<td><input type="checkbox" name="checkDataCollection" class="checkDetails" checked="checked"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.dataCollection"), $this);?>
</td>	
		<td><input type="checkbox" name="checkErcReview" class="checkDetails" checked="checked"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.reviewedByOtherErc"), $this);?>
</td>
	</tr>
	<tr>
		<td><input type="checkbox" name="checkDuration" class="checkDetails" checked="checked"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "search.researchDates"), $this);?>
</td>
		<td><input type="checkbox" name="checkStudentResearch" class="checkDetails"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.studentInitiatedResearch"), $this);?>
</td>
	</tr>
</table>
</div>
<h4><a href="#sourceOfMonetaryCheckboxes" onclick="hideSourceOfMonetaryCheckboxes()" class="action" id="hideSourceOfMonetaryCheckboxes"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.sourceOfMonetary"), $this);?>
</a></h4>
<h4><a href="#sourceOfMonetaryCheckboxes" onclick="showSourceOfMonetaryCheckboxes()" class="action" id="showSourceOfMonetaryCheckboxes"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.sourceOfMonetary"), $this);?>
</a></h4>
<a name="sourceOfMonetaryCheckboxes"></a>
<div id="sourceOfMonetary">
<table width="100%" class="data">
	<tr valign="top">
		<td width="25%"></td>
		<td width="25%"></td>
		<td width="25%"></td>
		<td width="25%"></td>
	</tr>
	<tr>
		<td colspan="4" align="right"><a href="javascript:void(0)" onclick="monetaryCheckAll()" id="monetaryCheckAll"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.checkAll"), $this);?>
</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:void(0)" onclick="monetaryUncheckAll()" id="monetaryUncheckAll"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.uncheckAll"), $this);?>
</a></td>
	</tr>
	<tr>
		<td><input type="checkbox" name="checkBudget" class="checkDetails" checked="checked"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.fundsRequired"), $this);?>
</td>
		<td><input type="checkbox" name="checkIndustryGrant" class="checkMonetary"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.industryGrant"), $this);?>
</td>
		<td><input type="checkbox" name="checkAgencyGrant" class="checkMonetary"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.internationalGrant"), $this);?>
</td>
		<td><input type="checkbox" name="checkMohGrant" class="checkMonetary"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.mohGrant"), $this);?>
</td>
	</tr>
	<tr>
		<td><input type="checkbox" name="checkGovernmentGrant" class="checkMonetary"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.governmentGrant"), $this);?>
</td>
		<td><input type="checkbox" name="checkUniversityGrant" class="checkMonetary"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.universityGrant"), $this);?>
</td>
		<td><input type="checkbox" name="checkSelfFunding" class="checkMonetary"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.selfFunding"), $this);?>
</td>
		<td><input type="checkbox" name="checkOtherGrant" class="checkMonetary"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.otherGrant"), $this);?>
</td>
	</tr>
</table>
</div>
<h4><a href="#riskAssessmentCheckboxes" onclick="hideRiskAssessmentCheckboxes()" class="action" id="hideRiskAssessmentCheckboxes"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.riskAssessment"), $this);?>
</a></h4>
<h4><a href="#riskAssessmentCheckboxes" onclick="showRiskAssessmentCheckboxes()" class="action" id="showRiskAssessmentCheckboxes"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.riskAssessment"), $this);?>
</a></h4>
<a name="riskAssessmentCheckboxes"></a>
<div id="riskAssessment">
<table width="100%" class="data">
	<tr valign="top">
		<td width="25%"></td>
		<td width="25%"></td>
		<td width="25%"></td>
		<td width="25%"></td>
	</tr>
	<tr>
		<td colspan="4" align="right"><a href="javascript:void(0)" onclick="riskCheckAll()" id="riskCheckAll"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.checkAll"), $this);?>
</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:void(0)" onclick="riskUncheckAll()" id="riskUncheckAll"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.uncheckAll"), $this);?>
</a></td>
	</tr>
	<tr>
		<td><input type="checkbox" name="checkIdentityRevealed" class="checkRisk"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.identityRevealedAbb"), $this);?>
</td>
		<td><input type="checkbox" name="checkUnableToConsent" class="checkRisk"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.unableToConsentAbb"), $this);?>
</td>
		<td><input type="checkbox" name="checkUnder18" class="checkRisk"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.under18Abb"), $this);?>
</td>
		<td><input type="checkbox" name="checkDependentRelationship" class="checkRisk"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.dependentRelationshipAbb"), $this);?>
</td>
	</tr>
	<tr>
		<td><input type="checkbox" name="checkEthnicMinority" class="checkRisk"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.ethnicMinorityAbb"), $this);?>
</td>
		<td><input type="checkbox" name="checkImpairment" class="checkRisk"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.impairmentAbb"), $this);?>
</td>
		<td><input type="checkbox" name="checkPregnant" class="checkRisk"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.pregnantAbb"), $this);?>
</td>
	</tr>
	<tr>
		<td><input type="checkbox" name="checkNewTreatment" class="checkRisk"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.newTreatmentAbb"), $this);?>
</td>
		<td><input type="checkbox" name="checkBioSamples" class="checkRisk"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.bioSamplesAbb"), $this);?>
</td>
		<td><input type="checkbox" name="checkRadiation" class="checkRisk"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.radiationAbb"), $this);?>
</td>
		<td><input type="checkbox" name="checkDistress" class="checkRisk"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.distressAbb"), $this);?>
</td>
	</tr>
	<tr>
		<td><input type="checkbox" name="checkInducements" class="checkRisk"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.inducementsAbb"), $this);?>
</td>
		<td><input type="checkbox" name="checkSensitiveInfo" class="checkRisk"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.sensitiveInfoAbb"), $this);?>
</td>
		<td><input type="checkbox" name="checkDeception" class="checkRisk"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.deceptionAbb"), $this);?>
</td>
		<td><input type="checkbox" name="checkReproTechnology" class="checkRisk"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.reproTechnologyAbb"), $this);?>
</td>
	</tr>
	<tr>
		<td><input type="checkbox" name="checkGenetics" class="checkRisk"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.geneticsAbb"), $this);?>
</td>
		<td><input type="checkbox" name="checkStemCell" class="checkRisk"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.stemCellAbb"), $this);?>
</td>
		<td><input type="checkbox" name="checkBiosafety" class="checkRisk"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.biosafetyAbb"), $this);?>
</td>
	</tr>
	<tr>
		<td><input type="checkbox" name="checkRiskLevel" class="checkRisk"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.riskLevelAbb"), $this);?>
</td>
		<td><input type="checkbox" name="checkRiskApplyTo" class="checkRisk"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.riskApplyToAbb"), $this);?>
</td>
	</tr>
	<tr>
		<td><input type="checkbox" name="checkBenefitsFromTheProject" class="checkRisk"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.benefitsFromTheProjectAbb"), $this);?>
</td>
		<td><input type="checkbox" name="checkMultiInstitutions" class="checkRisk"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.multiInstitutionsAbb"), $this);?>
</td>
		<td><input type="checkbox" name="checkConflictOfInterest" class="checkRisk"/>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.conflictOfInterestAbb"), $this);?>
</td>
	</tr>
</table>
</div>
<br/>
<h5><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.filterBy"), $this);?>
</h5>
<a name="proposal"></a>
<table width="100%" class="data" id="proposalDetails" style="display:none">
	<tr valign="top">
		<td width="5%"></td>
		<td width="3%"></td>
		<td width="17%"></td>
		<td width="5%"></td>
		<td width="70%"></td>
	</tr>
	<tr><td colspan="5"><h4><a href="#proposal" onclick="hideProposalDetails()" class="action" id="hideProposalDetails"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.proposalDetails"), $this);?>
</a></h4></td></tr>

	<tr valign="top" id="firstDecision" class="decision">
		<td>&nbsp;</td>
		<td colspan="2" class="decisionTitle"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.filterBy.decisions"), $this);?>
</td>
		<td colspan="2" class="noDecisionTitle" style="display: none;" align="right"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.orCap"), $this);?>
&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td colspan="2">			
			<select name="decisions[]" id="decisions" class="selectMenu">
				<option value=""></option>
		 		<?php echo $this->_plugins['function']['html_options_translate'][0][0]->smartyHtmlOptionsTranslate(array('options' => $this->_tpl_vars['decisionsOptions'],'selected' => $this->_tpl_vars['decisions']), $this);?>

			</select>
			<a href="" class="removeDecision" style="display:none"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.remove"), $this);?>
</a>
		</td>
	</tr>
	
    <tr id="addAnotherDecision">
    	<td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td colspan="2"><a href="#" id="addAnotherDecision"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.filterBy.addAnotherdecision"), $this);?>
</a></td>
    </tr>	

	<tr valign="top">
		<td>&nbsp;</td>
		<td colspan="2"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.studentInitiatedResearch"), $this);?>
</td>
		<td colspan="2">
        	<input type="radio" name="studentResearch" id="studentResearchy" value="Yes" onclick="showOrHideAcademicDegreeField(this.value)"/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>

            &nbsp;&nbsp;&nbsp;&nbsp;
        	<input type="radio" name="studentResearch" id="studentResearchn" value="No" onclick="showOrHideAcademicDegreeField(this.value)"/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>

        </td>
	</tr>
	<tr valign="top" id="academicDegreeField" style="display: none;">
		<td colspan="2">&nbsp;</td>
		<td><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.studentAcademicDegree"), $this);?>
</td>
		<td colspan="2">
			<select name="academicDegree" id="academicDegree" class="selectMenu">
				<option value=""></option>
				<option value="Undergraduate"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.undergraduate"), $this);?>
</option>
				<option value="Master"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.master"), $this);?>
</option>
				<option value="Post-Doc"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.postDoc"), $this);?>
</option>
				<option value="Ph.D"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.phd"), $this);?>
</option>
				<option value="Other"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.other"), $this);?>
</option>
			</select>
        </td>
	</tr>
	<tr valign="top" id="firstPrimarySponsor" class="primarySponsor">
		<td>&nbsp;</td>
		<td colspan="2" class="primarySponsorTitle"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.primarySponsor"), $this);?>
</td>
		<td colspan="2" class="noPrimarySponsorTitle" style="display: none;" align="right"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.orCap"), $this);?>
&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td colspan="2">			
        	<select name="primarySponsors[]" id="primarySponsors" class="selectMenu">
                <option value=""></option>
                <?php $_from = $this->_tpl_vars['agencies']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['sponsor']):
?>
                	<?php if ($this->_tpl_vars['sponsor']['code'] != 'NA'): ?>
                        <option value="<?php echo $this->_tpl_vars['sponsor']['code']; ?>
"><?php echo $this->_tpl_vars['sponsor']['name']; ?>
</option>
                    <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </select>
            <a href="" class="removePrimarySponsor" style="display:none"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.remove"), $this);?>
</a>
		</td>
	</tr>
    <tr id="addAnotherPrimarySponsor">
    	<td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td colspan="2"><a href="#" id="addAnotherPrimarySponsor"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.filterBy.addAnotherPSponsor"), $this);?>
</a></td>
    </tr>
    
	<tr valign="top" id="firstSecondarySponsor" class="secondarySponsor">
		<td>&nbsp;</td>
		<td colspan="2" class="secondarySponsorTitle"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.secondarySponsor"), $this);?>
</td>
		<td colspan="2" class="noSecondarySponsorTitle" style="display: none;" align="right"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.orCap"), $this);?>
&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td colspan="2">			
        	<select name="secondarySponsors[]" id="secondarySponsors" class="selectMenu">
                <option value=""></option>
                <?php $_from = $this->_tpl_vars['agencies']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['sponsor']):
?>
                	<?php if ($this->_tpl_vars['sponsor']['code'] != 'NA'): ?>
                        <option value="<?php echo $this->_tpl_vars['sponsor']['code']; ?>
"><?php echo $this->_tpl_vars['sponsor']['name']; ?>
</option>
                    <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </select>
            <a href="" class="removeSecondarySponsor" style="display:none"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.remove"), $this);?>
</a>
		</td>
	</tr>
	<tr id="addAnotherSecondarySponsor">
    	<td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td colspan="2"><a href="#" id="addAnotherSecondarySponsor"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.filterBy.addAnotherSSponsor"), $this);?>
</a></td>
    </tr>
    
	<tr valign="top" id="firstResearchField" class="researchField">
		<td>&nbsp;</td>
		<td colspan="2" class="researchFieldTitle"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.researchField"), $this);?>
</td>
		<td colspan="2" class="noResearchFieldTitle" style="display: none;" align="right"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.orCap"), $this);?>
&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td colspan="2">			
        	<select name="researchFields[]" id="researchFields" class="selectMenu">
                <option value=""></option>
                <?php $_from = $this->_tpl_vars['researchFields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['rfield']):
?>
                	<?php if ($this->_tpl_vars['rfield']['code'] != 'NA'): ?>
                        <option value="<?php echo $this->_tpl_vars['rfield']['code']; ?>
"><?php echo $this->_tpl_vars['rfield']['name']; ?>
</option>
                    <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </select>
            <a href="" class="removeResearchField" style="display:none"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.remove"), $this);?>
</a>
		</td>
	</tr>
    <tr id="addAnotherResearchField">
    	<td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td colspan="2"><a href="#" id="addAnotherResearchField"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.filterBy.addAnotherRField"), $this);?>
</a></td>
    </tr>
    
	<tr valign="top" id="firstProposalType" class="proposalType">
		<td>&nbsp;</td>
		<td colspan="2" class="proposalTypeTitle"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.proposalType"), $this);?>
</td>
		<td colspan="2" class="noProposalTypeTitle" style="display: none;" align="right"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.orCap"), $this);?>
&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td colspan="2">			
        	<select name="proposalTypes[]" id="proposalTypes" class="selectMenu">
                <option value=""></option>
                <option value="PNHS"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.proposalType.pnhs"), $this);?>
</option>
                <?php $_from = $this->_tpl_vars['proposalTypes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['ptype']):
?>
                	<?php if ($this->_tpl_vars['ptype']['code'] != 'NA'): ?>
                        <option value="<?php echo $this->_tpl_vars['ptype']['code']; ?>
"><?php echo $this->_tpl_vars['ptype']['name']; ?>
</option>
                    <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </select>
            <a href="" class="removeProposalType" style="display:none"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.remove"), $this);?>
</a>
		</td>
	</tr>
    <tr id="addAnotherProposalType">
    	<td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td colspan="2"><a href="#" id="addAnotherProposalType"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.filterBy.addAnotherPType"), $this);?>
</a></td>
    </tr>
    
	<tr valign="top">
		<td>&nbsp;</td>
		<td colspan="2"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.dataCollection"), $this);?>
</td>
		<td colspan="2">
			<select name="dataCollection" id="dataCollection" class="selectMenu">
            	<option value=""></option>
            	<option value="Primary"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.primaryDC"), $this);?>
</option>
            	<option value="Secondary"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.secondaryDC"), $this);?>
</option>
            	<option value="Both"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.bothDC"), $this);?>
</option>
			</select>
		</td>
	</tr>
</table>
<h4><a href="#proposal" onclick="showProposalDetails()" class="action" id="showProposalDetails"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.proposalDetails"), $this);?>
</a></h4>

<a name="areas"></a>
<table width="100%" class="data" id="geographicalAreas"  style="display:none">
	<tr><td colspan="6"><h4><a href="#areas" onclick="hideGeographicalAreas()" class="action" id="hideGeographicalAreas"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.country"), $this);?>
</a></h4></td></tr>
	<tr valign="top">
		<td width="5%"></td>
		<td width="5%"></td>
		<td width="5%"></td>
		<td width="5%"></td>
		<td width="5%"></td>
		<td width="75%"></td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td colspan="4"><br/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.multiCountry"), $this);?>
</td>
		<td colspan="2"><br/>
        	<input type="radio" name="multicountry" id="multicountryy" value="Yes" onclick="showOrHideProvince(this.value)"/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>

            &nbsp;&nbsp;&nbsp;&nbsp;
        	<input type="radio" name="multicountry" id="multicountryn" value="No" onclick="showOrHideProvince(this.value)"/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>

        </td>
	</tr>
	
	<tr valign="top" id="firstProvince" class="province" style="display: none;">
		<td>&nbsp;</td>
		<td colspan="4" class="provinceTitle"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.province"), $this);?>
</td>
		<td colspan="4" class="noProvinceTitle" style="display: none;" align="right"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.orCap"), $this);?>
&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td colspan="2">
			<select name="provinces[]" id="provinces" class="selectMenu">
		 		<option value=""></option>
		 		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['countriesOptions'],'selected' => $this->_tpl_vars['countries']), $this);?>

			</select>
			<a href="" class="removeProvince" style="display:none"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.remove"), $this);?>
</a>
		</td>
	</tr>
	
	<tr id="addAnotherProvince" style="display: none;">
    	<td>&nbsp;</td>
        <td colspan="4">&nbsp;</td>
        <td colspan="2"><a href="#" id="addAnotherProvince"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.filterBy.addAnotherProvince"), $this);?>
</a></td>
    </tr>	
</table>

<h4><a href="#areas" onclick="showGeographicalAreas()" class="action" id="showGeographicalAreas"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.country"), $this);?>
</a></h4>

<a name="dates"></a>
<table width="100%" class="data" id="dates" style="display: none;">
	
	<tr><td colspan="2"><h4><a href="#dates" onclick="hideDates()" class="action" id="hideDates"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.dates"), $this);?>
</a></h4></td></tr>
	
	<tr><td width="5%"></td><td><a href="#researchDates" onclick="showResearchDates()" class="action" id="showResearchDates">&#187; <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.duration"), $this);?>
</a></td></tr>
	<tr><td width="5%"></td><td><a href="#dates" onclick="hideResearchDates()" class="action" id="hideResearchDates" style="display:none;">&#187; <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.duration"), $this);?>
</a></td></tr>
	
	<tr><td colspan="2">
	<a name="researchDates"></a>
	<table width="100%" class="data" id="researchDates" style="display: none;">
		<tr valign="top">
			<td width="10%">&nbsp;</td>
			<td width="10%"><br/><strong><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.startDate"), $this);?>
</strong></td>
			<td width="10%"><br/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.before"), $this);?>
</td>
			<td width="70%"><br/><input type="text" class="textField" name="startDateBefore" id="startDateBefore" size="20" maxlength="255" /><br/><span><i><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.lessThan"), $this);?>
</i></span></td>
		</tr>
		<tr valign="top">
			<td width="10%">&nbsp;</td>
			<td width="10%">&nbsp;</td>
			<td width="10%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.after"), $this);?>
</td>
			<td width="70%">
				<input type="text" class="textField" name="startDateAfter" id="startDateAfter" size="20" maxlength="255" /><br/>
				<span><i><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.greaterThan"), $this);?>
</i></span>
			</td>
		</tr>
		<tr valign="top">
			<td width="10%">&nbsp;</td>
			<td width="10%"><br/><strong><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.endDate"), $this);?>
</strong></td>
			<td width="10%"><br/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.before"), $this);?>
</td>
			<td width="70%"><br/><input type="text" class="textField" name="endDateBefore" id="endDateBefore" size="20" maxlength="255" /><br/><span><i><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.lessThan"), $this);?>
</i></span></td>
		</tr>
		<tr valign="top">
			<td width="10%">&nbsp;</td>
			<td width="10%">&nbsp;</td>
			<td width="10%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.after"), $this);?>
</td>
			<td width="70%"><input type="text" class="textField" name="endDateAfter" id="endDateAfter" size="20" maxlength="255" /><br/><span><i><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.greaterThan"), $this);?>
</i></span></td>
		</tr>
	</table>
	</td></tr>

	<tr><td width="5%"></td><td><a href="#reviewDates" onclick="showReviewDates()" class="action" id="showReviewDates">&#187; <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.review"), $this);?>
</a></td></tr>
	<tr><td width="5%"></td><td><a href="#dates" onclick="hideReviewDates()" class="action" id="hideReviewDates" style="display:none;">&#187; <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.review"), $this);?>
</a></td></tr>
	
	<tr><td colspan="2">
	<a name="reviewDates"></a>
	<table width="100%" class="data" id="reviewDates" style="display: none;">
		<tr valign="top">
			<td width="10%">&nbsp;</td>
			<td width="10%"><br/><strong><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.submitDate"), $this);?>
</strong></td>
			<td width="10%"><br/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.before"), $this);?>
</td>
			<td width="70%"><br/><input type="text" class="textField" name="submittedBefore" id="submittedBefore" size="20" maxlength="255" /><br/><span><i><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.lessThan"), $this);?>
</i></span></td>
		</tr>
		<tr valign="top">
			<td width="10%">&nbsp;</td>
			<td width="10%">&nbsp;</td>
			<td width="10%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.after"), $this);?>
</td>
			<td width="70%"><input type="text" class="textField" name="submittedAfter" id="submittedAfter" size="20" maxlength="255" /><br/><span><i><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.greaterThan"), $this);?>
</i></span></td>
		</tr>	
		<tr valign="top">
			<td width="10%">&nbsp;</td>
			<td width="10%"><br/><strong><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.approveDate"), $this);?>
</strong></td>
			<td width="10%"><br/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.before"), $this);?>
</td>
			<td width="70%"><br/><input type="text" class="textField" name="approvedBefore" id="approvedBefore" size="20" maxlength="255" /><br/><span><i><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.lessThan"), $this);?>
</i></span></td>
		</tr>
		<tr valign="top">
			<td width="10%">&nbsp;</td>
			<td width="10%">&nbsp;</td>
			<td width="10%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.after"), $this);?>
</td>
			<td width="70%"><input type="text" class="textField" name="approvedAfter" id="approvedAfter" size="20" maxlength="255" /><br/><span><i><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.greaterThan"), $this);?>
</i></span></td>
		</tr>
		<tr>
		<td colspan="2">&nbsp</td>
		<td colspan="2"><span><i><strong><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.approveDateInstruct"), $this);?>
</strong></i></span></td>
		</tr>
	</table>
	</td></tr>
</table>
<h4><a href="#dates" onclick="showDates()" class="action" id="showDates"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.dates"), $this);?>
</a></h4>

	<input type="hidden" name="dateToHour" value="23" />
	<input type="hidden" name="dateToMinute" value="59" />
	<input type="hidden" name="dateToSecond" value="59" />
	<input type="hidden" id="isValid" name="isValid" value="<?php echo $this->_tpl_vars['isValid']; ?>
" />
	
	<br/><br/>
	<input type="submit" name="generateSubmissionsReport" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.reports.generateReport"), $this);?>
" class="button defaultButton" />
	<input type="button" class="button" onclick="history.go(-1)" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.cancel"), $this);?>
" />

</form>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php /* Smarty version 2.6.26, created on 2013-01-15 13:13:13
         compiled from submission/suppFile/suppFile.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'submission/suppFile/suppFile.tpl', 48, false),array('function', 'url', 'submission/suppFile/suppFile.tpl', 71, false),array('function', 'html_options_translate', 'submission/suppFile/suppFile.tpl', 163, false),array('function', 'fieldLabel', 'submission/suppFile/suppFile.tpl', 178, false),array('modifier', 'escape', 'submission/suppFile/suppFile.tpl', 72, false),array('modifier', 'to_array', 'submission/suppFile/suppFile.tpl', 123, false),array('modifier', 'date_format', 'submission/suppFile/suppFile.tpl', 135, false),)), $this); ?>

<?php echo ''; ?><?php if ($this->_tpl_vars['suppFileId']): ?><?php echo ''; ?><?php $this->assign('pageTitle', "author.submit.editSupplementaryFile"); ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php if ($this->_tpl_vars['type'] == 'Progress Report'): ?><?php echo ''; ?><?php $this->assign('pageTitle', "author.submit.addProgressReport"); ?><?php echo ''; ?><?php elseif ($this->_tpl_vars['type'] == 'Completion Report'): ?><?php echo ''; ?><?php $this->assign('pageTitle', "author.submit.addCompletionReport"); ?><?php echo ''; ?><?php elseif ($this->_tpl_vars['type'] == 'Extension Request'): ?><?php echo ''; ?><?php $this->assign('pageTitle', "author.submit.addExtensionRequest"); ?><?php echo ''; ?><?php elseif ($this->_tpl_vars['type'] == 'Raw Data File'): ?><?php echo ''; ?><?php $this->assign('pageTitle', "author.submit.addRawDataFile"); ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php $this->assign('pageTitle', "author.submit.addSupplementaryFile"); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['type'] == 'Progress Report'): ?><?php echo ''; ?><?php $this->assign('pageCrumbTitle', "submission.progressReports"); ?><?php echo ''; ?><?php elseif ($this->_tpl_vars['type'] == 'Completion Report'): ?><?php echo ''; ?><?php $this->assign('pageCrumbTitle', "submission.completionReports"); ?><?php echo ''; ?><?php elseif ($this->_tpl_vars['type'] == 'Extension Request'): ?><?php echo ''; ?><?php $this->assign('pageCrumbTitle', "submission.extensionRequest"); ?><?php echo ''; ?><?php elseif ($this->_tpl_vars['type'] == 'Raw Data File'): ?><?php echo ''; ?><?php $this->assign('pageCrumbTitle', "submission.rawDataFile"); ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php $this->assign('pageCrumbTitle', "submission.supplementaryFiles"); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>

<?php echo '
<script type="text/javascript">
$(document).ready(function() {
   $(\'#fileType\').change(function(){
        var isOtherSelected = false;
        $.each($(\'#fileType\').val(), function(key, value){
            if(value == "'; ?>
<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.other"), $this);?>
<?php echo '") {
                isOtherSelected = true;
            }
        });
        if(isOtherSelected) {
            $(\'#divOtherFileType\').show();
        } else {
            $(\'#divOtherFileType\').hide();
        }
    });
});

function checkSize(){
	var fileToUpload = document.getElementById(\'uploadSuppFile\');
	var check = fileToUpload.files[0].fileSize;
	var valueInKb = Math.ceil(check/1024);
	if (check > 5242880){
		alert (\'The file is too big (\'+valueInKb+\' Kb). It should not exceed 5 Mb.\');
		return false
	} 
}
</script>
'; ?>

<form name="suppFile" method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => $this->_tpl_vars['rolePath'],'op' => 'saveSuppFile','path' => $this->_tpl_vars['suppFileId']), $this);?>
" onSubmit="return checkSize()" enctype="multipart/form-data">
<input type="hidden" name="articleId" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['articleId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
<input type="hidden" name="from" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['from'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
<input type="hidden" name="type" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['type'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" /> <!-- Added by AIM, June 15 2011 -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/formErrors.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['type'] == 'Supp File'): ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function() {
    // Add filter of sudent research
    if ($(\'#fileType\').val() == null){
        $(\'#saveButton\').hide();
    } else {
        $(\'#saveButton\').show();
	}

    $(\'#fileType\').change(
        function(){
            var answer = $(\'#fileType\').val();
            if(answer == null) {
		        $(\'#saveButton\').hide();
            } else {
		        $(\'#saveButton\').show();
            }
    	}
    );
});
</script>
'; ?>

<?php endif; ?>

<div id="supplementaryFileUpload">

<?php if ($this->_tpl_vars['type'] == 'Progress Report'): ?>
    <h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.progressReports"), $this);?>
</h3>
<?php elseif ($this->_tpl_vars['type'] == 'Completion Report'): ?>
    <h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.completionReports"), $this);?>
</h3>
<?php elseif ($this->_tpl_vars['type'] == 'Extension Request'): ?>
    <h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.extensionRequest"), $this);?>
</h3>
<?php elseif ($this->_tpl_vars['type'] == 'Raw Data File'): ?>
    <h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.rawDataFile"), $this);?>
</h3>
<?php elseif ($this->_tpl_vars['type'] == 'Other Supplementary Research Output'): ?>
    <h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.otherSuppResearchOutput"), $this);?>
</h3>
<?php else: ?>
    <h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.supplementaryFileUpload"), $this);?>
</h3>
<?php endif; ?>

<table id="suppFile" class="data">
<?php if ($this->_tpl_vars['suppFile']): ?>
	<tr valign="top">
		<td width="20%" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.fileName"), $this);?>
</td>
		<td width="80%" class="data"><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'downloadFile','path' => ((is_array($_tmp=$this->_tpl_vars['articleId'])) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['suppFile']->getFileId()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['suppFile']->getFileId()))), $this);?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['suppFile']->getFileName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a></td>
	</tr>
	<tr valign="top">
		<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.originalFileName"), $this);?>
</td>
		<td class="value"><?php echo ((is_array($_tmp=$this->_tpl_vars['suppFile']->getOriginalFileName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td>
	</tr>
	<tr valign="top">
		<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.fileSize"), $this);?>
</td>
		<td class="value"><?php echo $this->_tpl_vars['suppFile']->getNiceFileSize(); ?>
</td>
	</tr>
	<tr>
		<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.dateUploaded"), $this);?>
</td>
		<td class="value"><?php echo ((is_array($_tmp=$this->_tpl_vars['suppFile']->getDateUploaded())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>
</td>
	</tr>
</table>
<!--
-->
<?php else: ?>
	<tr valign="top">
		<td colspan="2" class="nodata"></td>
	</tr>
<?php endif; ?>

<br />

<table id="showReviewers" width="100%" class="data">
        <!--Start Edit Jan 30 2012-->
        <?php if ($this->_tpl_vars['type'] == 'Supp File'): ?>
            <tr>
                <td width="30%" class="label">Select file type(s)<br />(Hold down the CTRL button to select multiple options.)</td>
                <td width="35%" class="value">
                        <select name="fileType[]" id="fileType" multiple="multiple" size="10" class="selectMenu">
                            <?php echo $this->_plugins['function']['html_options_translate'][0][0]->smartyHtmlOptionsTranslate(array('options' => $this->_tpl_vars['typeOptions'],'translateValues' => 'true','selected' => $this->_tpl_vars['fileType']), $this);?>

                        </select>
                </td>
                <td style="vertical-align: bottom;">
                        <div id="divOtherFileType" style="display: none;">
                            <span class="label" style="font-style: italic;">Specify "Other" file type</span> <br />
                            <input type="text" name="otherFileType" id="otherFileType" size="20" /> <br />
                        </div>
                </td>
            </tr>
        <?php endif; ?>
        <!--End Edit -->
	<tr valign="top">
		<td class="label">
			<?php if ($this->_tpl_vars['suppFile']): ?>
				<?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'uploadSuppFile','key' => "common.replaceFile"), $this);?>

			<?php else: ?>
				<?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'uploadSuppFile','key' => "common.upload"), $this);?>

			<?php endif; ?>
		</td>
		<td class="value" colspan="2"><input type="file" name="uploadSuppFile" id="uploadSuppFile" class="uploadField" />&nbsp;&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.supplementaryFiles.saveToUpload"), $this);?>
</td>
	</tr>

</table>
</div>

<div class="separator"></div>


<p>
<input type="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.save"), $this);?>
" class="button defaultButton" id="saveButton" /> 
<input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.cancel"), $this);?>
" class="button" onclick="history.go(-1)" />
</p>

<p><span class="formRequired"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.requiredField"), $this);?>
</span></p></form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

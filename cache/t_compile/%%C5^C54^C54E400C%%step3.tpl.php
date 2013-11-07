<?php /* Smarty version 2.6.26, created on 2013-01-09 23:33:39
         compiled from author/submit/step3.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'author/submit/step3.tpl', 28, false),array('function', 'translate', 'author/submit/step3.tpl', 32, false),array('function', 'fieldLabel', 'author/submit/step3.tpl', 91, false),array('function', 'get_help_id', 'author/submit/step3.tpl', 98, false),array('modifier', 'escape', 'author/submit/step3.tpl', 29, false),array('modifier', 'to_array', 'author/submit/step3.tpl', 62, false),array('modifier', 'date_format', 'author/submit/step3.tpl', 74, false),)), $this); ?>
<?php $this->assign('pageTitle', "author.submit.step3"); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "author/submit/submitHeader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script type="text/javascript">
function checkSize(){
	var fileToUpload = document.getElementById(\'submissionFileUpload\');
	var check = fileToUpload.files[0].fileSize;
	var valueInKb = Math.ceil(check/1024);
	if (check > 5242880){
		alert (\'The file is too big (\'+valueInKb+\' Kb). It should not exceed 5 Mb.\');
		return false
	}
}
</script>
'; ?>


<form method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'saveSubmit','path' => $this->_tpl_vars['submitStep']), $this);?>
" onSubmit="return checkSize()" enctype="multipart/form-data">
<input type="hidden" name="articleId" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['articleId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/formErrors.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="uploadInstructions"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.uploadInstructions"), $this);?>
</div>

<?php if ($this->_tpl_vars['journalSettings']['supportPhone']): ?>
	<?php $this->assign('howToKeyName', "author.submit.howToSubmit"); ?>
<?php else: ?>
	<?php $this->assign('howToKeyName', "author.submit.howToSubmitNoPhone"); ?>
<?php endif; ?>

<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => $this->_tpl_vars['howToKeyName'],'supportName' => $this->_tpl_vars['journalSettings']['supportName'],'supportEmail' => $this->_tpl_vars['journalSettings']['supportEmail'],'supportPhone' => $this->_tpl_vars['journalSettings']['supportPhone']), $this);?>
</p>

<?php if ($this->_tpl_vars['articleComments']): ?>
    <div class="separator"></div>
    <div id="articleComments">
        <h3>Proposal Comments</h3>
        <li>
        <?php $_from = $this->_tpl_vars['articleComments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['comment']):
?>
            <ul><?php echo $this->_tpl_vars['comment']->getComments(); ?>
 (<?php echo $this->_tpl_vars['comment']->getAuthorName(); ?>
, <?php echo $this->_tpl_vars['comment']->getDatePosted(); ?>
)</ul>
        <?php endforeach; endif; unset($_from); ?>
        </li>
    </div>
<?php endif; ?>

<div class="separator"></div>

<div id="submissionFile">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.submissionFile"), $this);?>
</h3>
<table class="data" width="100%">
<?php if ($this->_tpl_vars['submissionFile']): ?>
<tr valign="top">
	<td width="20%" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.fileName"), $this);?>
</td>
	<td width="80%" class="value"><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'download','path' => ((is_array($_tmp=$this->_tpl_vars['articleId'])) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['submissionFile']->getFileId()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['submissionFile']->getFileId()))), $this);?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['submissionFile']->getFileName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a></td>
</tr>
<tr valign="top">
	<td width="20%" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.originalFileName"), $this);?>
</td>
	<td width="80%" class="value"><?php echo ((is_array($_tmp=$this->_tpl_vars['submissionFile']->getOriginalFileName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td>
</tr>
<tr valign="top">
	<td width="20%" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.fileSize"), $this);?>
</td>
	<td width="80%" class="value"><?php echo $this->_tpl_vars['submissionFile']->getNiceFileSize(); ?>
</td>
</tr>
<tr valign="top">
	<td width="20%" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.dateUploaded"), $this);?>
</td>
	<td width="80%" class="value"><?php echo ((is_array($_tmp=$this->_tpl_vars['submissionFile']->getDateUploaded())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['datetimeFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['datetimeFormatShort'])); ?>
</td>
</tr>
<?php else: ?>
<tr valign="top">
	<td colspan="2" class="nodata"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.noSubmissionFile"), $this);?>
</td>
</tr>
<?php endif; ?>
</table>
</div>

<div class="separator"></div>

<div id="addSubmissionFile">
<table class="data" width="100%">
<tr>
	<td width="30%" class="label">
		<?php if ($this->_tpl_vars['submissionFile']): ?>
			<?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'submissionFile','key' => "author.submit.replaceSubmissionFile"), $this);?>

		<?php else: ?>
			<?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'submissionFile','key' => "author.submit.uploadSubmissionFile"), $this);?>

		<?php endif; ?>
	</td>
	<td width="70%" class="value">
		<input type="file" class="uploadField" name="submissionFile" id="submissionFileUpload" /> <input name="uploadSubmissionFile" type="submit" class="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.upload"), $this);?>
" />
		<?php if ($this->_tpl_vars['currentJournal']->getSetting('showEnsuringLink')): ?><a class="action" href="javascript:openHelp('<?php echo $this->_plugins['function']['get_help_id'][0][0]->smartyGetHelpId(array('key' => "editorial.sectionEditorsRole.review.blindPeerReview",'url' => 'true'), $this);?>
')"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.ensuringBlindReview"), $this);?>
</a><?php endif; ?>
	</td>
</tr>
</table>
</div>

<div class="separator"></div>

<p>
<?php if ($this->_tpl_vars['submissionFile']): ?>
<input type="submit"<?php if (! $this->_tpl_vars['submissionFile']): ?> onclick="return confirm('<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.noSubmissionConfirm"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'jsparam') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'jsparam'));?>
')"<?php endif; ?> value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.saveAndContinue"), $this);?>
" class="button defaultButton" /> 
<?php endif; ?>
<input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.cancel"), $this);?>
" class="button" onclick="confirmAction('<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'author'), $this);?>
', '<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.cancelSubmission"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'jsparam') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'jsparam'));?>
')" />
</p>
</form>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

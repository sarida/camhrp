<?php /* Smarty version 2.6.26, created on 2012-04-17 18:47:41
         compiled from submission/suppFile/withdraw.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'submission/suppFile/withdraw.tpl', 13, false),array('function', 'fieldLabel', 'submission/suppFile/withdraw.tpl', 22, false),array('function', 'form_language_chooser', 'submission/suppFile/withdraw.tpl', 27, false),array('function', 'translate', 'submission/suppFile/withdraw.tpl', 67, false),array('modifier', 'escape', 'submission/suppFile/withdraw.tpl', 14, false),array('modifier', 'to_array', 'submission/suppFile/withdraw.tpl', 24, false),array('modifier', 'assign', 'submission/suppFile/withdraw.tpl', 24, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "author.submit.addWithdrawReport"); ?><?php echo ''; ?><?php $this->assign('pageCrumbTitle', "submission.withdrawReports"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<form name="withdrawFile" method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => $this->_tpl_vars['rolePath'],'op' => 'saveWithdrawal'), $this);?>
" enctype="multipart/form-data">
<input type="hidden" name="articleId" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['articleId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
<input type="hidden" name="type" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['type'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" /> <!-- Added by AIM, June 15 2011 -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/formErrors.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if (count ( $this->_tpl_vars['formLocales'] ) > 1): ?>
<div id="locale">
<table width="100%" class="data">
	<tr valign="top">
		<td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'formLocale','key' => "form.formLanguage"), $this);?>
</td>
		<td width="80%" class="value">
			<?php if ($this->_tpl_vars['suppFileId']): ?><?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'editSuppFile','path' => ((is_array($_tmp=$this->_tpl_vars['articleId'])) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['suppFileId']) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['suppFileId'])),'from' => $this->_tpl_vars['from'],'escape' => false), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'formUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'formUrl'));?>

			<?php else: ?><?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'addSuppFile','path' => $this->_tpl_vars['articleId'],'from' => $this->_tpl_vars['from'],'escape' => false), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'formUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'formUrl'));?>

			<?php endif; ?>
			<?php echo $this->_plugins['function']['form_language_chooser'][0][0]->smartyFormLanguageChooser(array('form' => 'suppFile','url' => $this->_tpl_vars['formUrl']), $this);?>

			<!--  -->
		</td>
	</tr>
</table>
</div>
<?php endif; ?>


<div id="supplementaryFileUpload">

<br />
<table id="showReviewers" width="70%" class="data">
	<tr valign="top">
		<td class="label">Upload Report</td>
		<td class="value"><input type="file" name="uploadSuppFile" id="uploadSuppFile" class="uploadField" /></td>
	</tr>
        <tr valign="top">
		<td class="label">Reason for Withdrawal</td>
		<td class="value">
                    <select name="withdrawReason[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="withdrawReason" class="selectMenu">
                        <option value="">-Select One-</option>
                        <option value="Lack of Funding">Lack of Funding</option>
                        <option value="Adverse Event">Adverse Event</option>
                        <option value="Others">Others</option>
                    </select>
                </td>
	</tr>
        <tr valign="top">
		<td class="label">Comments</td>
		<td class="value">
                    <textarea name="withdrawComments[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="withdrawComments" class="textArea" rows="5" cols="30"></textarea>
                </td>
	</tr>
</table>
</div>

<div class="separator"></div>


<p><input type="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.save"), $this);?>
" class="button defaultButton" /> <input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.cancel"), $this);?>
" class="button" onclick="history.go(-1)" /></p>

<p><span class="formRequired"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.requiredField"), $this);?>
</span></p>

</form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

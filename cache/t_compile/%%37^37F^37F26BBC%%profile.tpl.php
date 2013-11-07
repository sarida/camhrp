<?php /* Smarty version 2.6.26, created on 2013-01-24 15:15:33
         compiled from user/profile.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'user/profile.tpl', 13, false),array('function', 'fieldLabel', 'user/profile.tpl', 57, false),array('function', 'form_language_chooser', 'user/profile.tpl', 60, false),array('function', 'translate', 'user/profile.tpl', 61, false),array('function', 'html_options_translate', 'user/profile.tpl', 102, false),array('function', 'html_options', 'user/profile.tpl', 150, false),array('modifier', 'assign', 'user/profile.tpl', 13, false),array('modifier', 'escape', 'user/profile.tpl', 67, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "user.profile.editProfile"); ?><?php echo ''; ?><?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'profile'), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'url') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'url'));?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<?php $this->assign('viet', 'vi_VN'); ?>
<?php $this->assign('eng', 'en_US'); ?>

<?php echo '
<script type="text/javascript">
	$(document).ready(function(){
   		//Start code for multiple reviewing interests
        $(\'#addAnotherInterest\').click(
        	function(){
           		var reviewingInterestHtml = \'<tr valign="top" class="reviewingInterestSupp">\' + $(\'#firstReviewingInterest\').html() + \'</tr>\';
            	$(\'#firstReviewingInterest\').after(reviewingInterestHtml);
            	$(\'#firstReviewingInterest\').next().find(\'select\').attr(\'selectedIndex\', 0);
            	$(\'.reviewingInterestSupp\').find(\'.removeReviewingInterest\').show();
            	$(\'.reviewingInterestSupp\').find(\'.reviewingInterestTitle\').hide();
            	$(\'.reviewingInterestSupp\').find(\'.noReviewingInterestTitle\').show();
            	$(\'#firstReviewingInterest\').find(\'.removeReviewingInterest\').hide();
            	$(\'#firstReviewingInterest\').find(\'.reviewingInterestTitle\').show();
            	$(\'#firstReviewingInterest\').find(\'.noReviewingInterestTitle\').hide();
            	return false;
        	}
        );

        $(\'.removeReviewingInterest\').live(
        	\'click\', function(){
        		$(this).closest(\'tr\').remove();
            	return false;
        	}
        );
    	//End code for multiple reviewing interests
	});
</script>
'; ?>


<form name="profile" method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'saveProfile'), $this);?>
" enctype="multipart/form-data">

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/formErrors.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<table class="data" width="100%">
<?php if (count ( $this->_tpl_vars['formLocales'] ) > 1): ?>
	<tr valign="top" id="localesField">
		<td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'formLocale','required' => 'true','key' => "common.language"), $this);?>
</td>
		<td width="80%" class="value">
			<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'user','op' => 'profile','escape' => false), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'userProfileUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'userProfileUrl'));?>

			<?php echo $this->_plugins['function']['form_language_chooser'][0][0]->smartyFormLanguageChooser(array('form' => 'profile','url' => $this->_tpl_vars['userProfileUrl']), $this);?>

			<span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "form.formLanguage.description"), $this);?>
</span>
		</td>
	</tr>
<?php endif; ?>
<tr valign="top" id="usernameField">
	<td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('suppressId' => 'true','name' => 'username','key' => "user.username"), $this);?>
</td>
	<td width="80%" class="value"><?php echo ((is_array($_tmp=$this->_tpl_vars['username'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td>
</tr>

<tr valign="top" id="salutationField">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'salutation','key' => "user.salutation"), $this);?>
</td>
	<td class="value">
		<select name="salutation" id="salutation" class="selectMenu">
			<option value=""></option>
			<option value="Dr." <?php if ($this->_tpl_vars['salutation'] == "Dr."): ?> selected="selected"<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.salutation.dr"), $this);?>
</option>
			<option value="Prof." <?php if ($this->_tpl_vars['salutation'] == "Prof."): ?> selected="selected"<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.salutation.prof"), $this);?>
</option>
			<option value="Ms." <?php if ($this->_tpl_vars['salutation'] == "Ms."): ?> selected="selected"<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.salutation.ms"), $this);?>
</option>
			<option value="Mr." <?php if ($this->_tpl_vars['salutation'] == "Mr."): ?> selected="selected"<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.salutation.mr"), $this);?>
</option>
		</select>	
	</td>
</tr>

<tr valign="top" id="firstNameField">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'firstName','required' => 'true','key' => "user.firstName"), $this);?>
</td>
	<td class="value"><input type="text" name="firstName" id="firstName" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['firstName'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="20" maxlength="40" class="textField" /></td>
</tr>

<tr valign="top" id="middleNameField">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'middleName','key' => "user.middleName"), $this);?>
</td>
	<td class="value"><input type="text" name="middleName" id="middleName" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['middleName'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="20" maxlength="40" class="textField" /></td>
</tr>

<tr valign="top" id="lastNameField">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'lastName','required' => 'true','key' => "user.lastName"), $this);?>
</td>
	<td class="value"><input type="text" name="lastName" id="lastName" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['lastName'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="20" maxlength="90" class="textField" /></td>
</tr>

<tr valign="top" id="genderField">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'gender','key' => "user.gender"), $this);?>
</td>
	<td class="value">
		<select name="gender" id="gender" size="1" class="selectMenu">
			<?php echo $this->_plugins['function']['html_options_translate'][0][0]->smartyHtmlOptionsTranslate(array('options' => $this->_tpl_vars['genderOptions'],'selected' => $this->_tpl_vars['gender']), $this);?>

		</select>
	</td>
</tr>

<tr valign="top" id="affiliationField">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'affiliation','required' => 'true','key' => "user.affiliation"), $this);?>
</td>
	<td class="value">
		<textarea name="affiliation[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="affiliation" rows="5" cols="40" class="textArea"><?php echo ((is_array($_tmp=$this->_tpl_vars['affiliation'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</textarea><br/>
		<span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.affiliation.description"), $this);?>
</span>
	</td>
</tr>

<tr valign="top" id="bioField">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'biography','key' => "user.biography"), $this);?>
<br /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.biography.description"), $this);?>
</td>
	<td class="value"><textarea name="biography[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="biography" rows="5" cols="40" class="textArea"><?php echo ((is_array($_tmp=$this->_tpl_vars['biography'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</textarea></td>
</tr>

<tr valign="top" id="emailField">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'email','required' => 'true','key' => "user.email"), $this);?>
</td>
	<td class="value"><input type="text" name="email" id="email" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="30" maxlength="90" class="textField" /></td>
</tr>

<tr valign="top" id="phoneField">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'phone','required' => 'true','key' => "user.phone"), $this);?>
</td>
	<td class="value"><input type="text" name="phone" id="phone" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['phone'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="15" maxlength="24" class="textField" /></td>
</tr>

<tr valign="top" id="phoneInstructField">
	<td class="label">&nbsp;</td>
	<td class="value"><i><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.phoneInstruct"), $this);?>
</i></td>
</tr>

<tr valign="top" id="mailingAddressField">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'mailingAddress','required' => 'true','key' => "common.mailingAddress"), $this);?>
</td>
	<td class="value"><textarea name="mailingAddress" id="mailingAddress" rows="3" cols="40" class="textArea"><?php echo ((is_array($_tmp=$this->_tpl_vars['mailingAddress'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</textarea></td>
</tr>

<tr valign="top" id="mailingAddressInstructField">
	<td class="label">&nbsp;</td>
	<td class="value"><i><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.mailingAddressInstruct"), $this);?>
</i></td>
</tr>

<tr valign="top" id="residenceField">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'country','required' => 'true','key' => "common.country"), $this);?>
</td>
	<td class="value">
		<select name="country" id="country" class="selectMenu">
			<option value=""></option>
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['countries'],'selected' => $this->_tpl_vars['country']), $this);?>

		</select>
	</td>
</tr>

		<tr valign="top" id="reviewingInterestInstructField">
			<td colspan="2"><i><br/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.reviewingInterestsInstruct"), $this);?>
</i></td>
		</tr>
		<?php $_from = $this->_tpl_vars['reviewingInterest'][$this->_tpl_vars['eng']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['interest']):
?>
    		<tr valign="top" <?php if ($this->_tpl_vars['i'] == 0): ?> id="firstReviewingInterest" <?php else: ?> id="reviewingInterestField" <?php endif; ?>>
    			<td width="20%" class="reviewingInterestTitle"><?php if ($this->_tpl_vars['i'] == 0): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.reviewingInterests"), $this);?>
:<?php else: ?>&nbsp;<?php endif; ?></td>
    	    	<td width="20%" class="noReviewingInterestTitle" style="display:none;">&nbsp;</td>
    	    	<td width="80%" class="value">
    	    		<select name="reviewingInterest[<?php echo ((is_array($_tmp=$this->_tpl_vars['eng'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
][]" class="selectMenu">
    	        		<option value=""></option>
    	            	<?php $_from = $this->_tpl_vars['reviewingInterests']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['if'] => $this->_tpl_vars['rInterest']):
?>
    	            		<?php $this->assign('isSelected', false); ?>
    	            		<?php $_from = 'if'; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['selectedInterests']):
?>
    	            			<?php if ($this->_tpl_vars['reviewingInterest'][$this->_tpl_vars['eng']][$this->_tpl_vars['i']] == $this->_tpl_vars['rInterest']['code']): ?>
    	            				<?php $this->assign('isSelected', true); ?>
    	            			<?php endif; ?>
    	            		<?php endforeach; endif; unset($_from); ?>
    	            		<option value="<?php echo $this->_tpl_vars['rInterest']['code']; ?>
" <?php if ($this->_tpl_vars['isSelected'] == true): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['rInterest']['name']; ?>
</option>
    	            	<?php endforeach; endif; unset($_from); ?>
    	        	</select>
    	        	<a href="" class="removeReviewingInterest" <?php if ($this->_tpl_vars['i'] == 0): ?>style="display:none"<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.remove"), $this);?>
</a>
		    	</td>
    		</tr>
		<?php endforeach; endif; unset($_from); ?>                  
    	<tr id="addAnotherInterest">
    		<td width="20%">&nbsp;</td>
    	    <td><a href="#" id="addAnotherInterest"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.addReviewingInterest"), $this);?>
</a></td>
    	</tr>


<?php if ($this->_tpl_vars['displayOpenAccessNotification']): ?>
	<?php $this->assign('notFirstJournal', 0); ?>
	<?php $_from = $this->_tpl_vars['journals']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['journalOpenAccessNotifications'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['journalOpenAccessNotifications']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['thisJournalId'] => $this->_tpl_vars['thisJournal']):
        $this->_foreach['journalOpenAccessNotifications']['iteration']++;
?>
		<?php $this->assign('thisJournalId', $this->_tpl_vars['thisJournal']->getJournalId()); ?>
		<?php $this->assign('publishingMode', $this->_tpl_vars['thisJournal']->getSetting('publishingMode')); ?>
		<?php $this->assign('enableOpenAccessNotification', $this->_tpl_vars['thisJournal']->getSetting('enableOpenAccessNotification')); ?>
		<?php $this->assign('notificationEnabled', $this->_tpl_vars['user']->getSetting('openAccessNotification',$this->_tpl_vars['thisJournalId'])); ?>
		<?php if (! $this->_tpl_vars['notFirstJournal']): ?>
			<?php $this->assign('notFirstJournal', 1); ?>
			<tr valign="top">
				<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.profile.form.openAccessNotifications"), $this);?>
</td>
				<td class="value">
		<?php endif; ?>

		<?php if ($this->_tpl_vars['publishingMode'] == @PUBLISHING_MODE_SUBSCRIPTION && $this->_tpl_vars['enableOpenAccessNotification']): ?>
			<input type="checkbox" name="openAccessNotify[]" <?php if ($this->_tpl_vars['notificationEnabled']): ?>checked="checked" <?php endif; ?>id="openAccessNotify-<?php echo ((is_array($_tmp=$this->_tpl_vars['thisJournalId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['thisJournalId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" /> <label for="openAccessNotify-<?php echo ((is_array($_tmp=$this->_tpl_vars['thisJournalId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['thisJournal']->getLocalizedTitle())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</label><br/>
		<?php endif; ?>

		<?php if (($this->_foreach['journalOpenAccessNotifications']['iteration'] == $this->_foreach['journalOpenAccessNotifications']['total'])): ?>
				</td>
			</tr>
		<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>

</table>
<p><input type="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.save"), $this);?>
" class="button defaultButton" /> <input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.cancel"), $this);?>
" class="button" onclick="document.location.href='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'user'), $this);?>
'" /></p>
</form>

<p><span class="formRequired"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.requiredField"), $this);?>
</span></p>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

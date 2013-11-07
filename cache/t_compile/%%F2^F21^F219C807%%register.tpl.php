<?php /* Smarty version 2.6.26, created on 2013-01-15 22:43:18
         compiled from user/register.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'user/register.tpl', 49, false),array('function', 'translate', 'user/register.tpl', 51, false),array('function', 'fieldLabel', 'user/register.tpl', 80, false),array('function', 'form_language_chooser', 'user/register.tpl', 83, false),array('function', 'html_options_translate', 'user/register.tpl', 161, false),array('function', 'html_options', 'user/register.tpl', 214, false),array('modifier', 'assign', 'user/register.tpl', 56, false),array('modifier', 'escape', 'user/register.tpl', 74, false),array('modifier', 'nl2br', 'user/register.tpl', 280, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "user.register"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<?php $this->assign('cam', 'kh_CA'); ?>
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


<form name="register" method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'registerUser'), $this);?>
">

<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.register.completeForm"), $this);?>
</p>

<?php if (! $this->_tpl_vars['implicitAuth']): ?>
	<!--
	<?php if (! $this->_tpl_vars['existingUser']): ?>
		<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'user','op' => 'register','existingUser' => 1), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'url') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'url'));?>

		<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.register.alreadyRegisteredOtherJournal",'registerUrl' => $this->_tpl_vars['url']), $this);?>
</p>
	<?php else: ?>
		<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'user','op' => 'register'), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'url') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'url'));?>

		<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.register.notAlreadyRegisteredOtherJournal",'registerUrl' => $this->_tpl_vars['url']), $this);?>
</p>
		<input type="hidden" name="existingUser" value="1"/>
	<?php endif; ?>
	-->
	<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.profile"), $this);?>
</h3>

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/formErrors.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<?php if ($this->_tpl_vars['existingUser']): ?>
		<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.register.loginToRegister"), $this);?>
</p>
	<?php endif; ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['source']): ?>
	<input type="hidden" name="source" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['source'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
<?php endif; ?>

<table class="data" width="100%">
<?php if (count ( $this->_tpl_vars['formLocales'] ) > 1 && ! $this->_tpl_vars['existingUser']): ?>
	<tr valign="top" id="localesField">
		<td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'formLocale','key' => "form.formLanguage"), $this);?>
</td>
		<td width="80%" class="value">
			<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'user','op' => 'register','escape' => false), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'userRegisterUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'userRegisterUrl'));?>

			<?php echo $this->_plugins['function']['form_language_chooser'][0][0]->smartyFormLanguageChooser(array('form' => 'register','url' => $this->_tpl_vars['userRegisterUrl']), $this);?>

			<span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "form.formLanguage.description"), $this);?>
</span>
		</td>
	</tr>
<?php endif; ?>
<?php if (! $this->_tpl_vars['implicitAuth']): ?>
	<tr valign="top" id="usernameField">
		<td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'username','required' => 'true','key' => "user.username"), $this);?>
</td>
		<td width="80%" class="value"><input type="text" name="username" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['username'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" id="username" size="20" maxlength="32" class="textField" /></td>
	</tr>
	<?php if (! $this->_tpl_vars['existingUser']): ?>
	<tr valign="top" id="usernameInstructField">
		<td></td>
		<td class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.register.usernameRestriction"), $this);?>
</td>
	</tr>
	<?php endif; ?>
	<tr valign="top" id="passwordField">
		<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'password','required' => 'true','key' => "user.password"), $this);?>
</td>
		<td class="value"><input type="password" name="password" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['password'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" id="password" size="20" maxlength="32" class="textField" /></td>
	</tr>

	<?php if (! $this->_tpl_vars['existingUser']): ?>
		<tr valign="top" id="passwordInstructField">
			<td></td>
			<td class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.register.passwordLengthRestriction",'length' => $this->_tpl_vars['minPasswordLength']), $this);?>
</td>
		</tr>
		
		<tr valign="top" id="password2Field">
			<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'password2','required' => 'true','key' => "user.register.repeatPassword"), $this);?>
</td>
			<td class="value"><input type="password" name="password2" id="password2" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['password2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="20" maxlength="32" class="textField" /></td>
		</tr>

		<?php if ($this->_tpl_vars['captchaEnabled']): ?>
			<tr>
				<td class="label" valign="top"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'captcha','required' => 'true','key' => "common.captchaField"), $this);?>
</td>
				<td class="value">
					<img src="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'user','op' => 'viewCaptcha','path' => $this->_tpl_vars['captchaId']), $this);?>
" alt="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.captchaField.altText"), $this);?>
" /><br />
					<span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.captchaField.description"), $this);?>
</span><br />
					<input name="captcha" id="captcha" value="" size="20" maxlength="32" class="textField" />
					<input type="hidden" name="captchaId" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['captchaId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quoted') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'quoted')); ?>
" />
				</td>
			</tr>
		<?php endif; ?>
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
			<td class="value"><input type="text" id="firstName" name="firstName" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['firstName'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="20" maxlength="40" class="textField" /></td>
		</tr>
		
		<tr valign="top" id="middleNameField">
			<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'middleName','key' => "user.middleName"), $this);?>
</td>
			<td class="value"><input type="text" id="middleName" name="middleName" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['middleName'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="20" maxlength="40" class="textField" /></td>
		</tr>
		
		<tr valign="top" id="lastNameField">
			<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'lastName','required' => 'true','key' => "user.lastName"), $this);?>
</td>
			<td class="value"><input type="text" id="lastName" name="lastName" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['lastName'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="20" maxlength="90" class="textField" /></td>
		</tr>

		<tr valign="top" id="genderField">
			<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => "gender-m",'key' => "user.gender"), $this);?>
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
				<textarea id="affiliation" name="affiliation[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" rows="5" cols="40" class="textArea"><?php echo ((is_array($_tmp=$this->_tpl_vars['affiliation'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
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
			<td class="value"><input type="text" id="email" name="email" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="30" maxlength="90" class="textField" /> <?php if ($this->_tpl_vars['privacyStatement']): ?><a class="action" href="#privacyStatement"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.register.privacyStatement"), $this);?>
</a><?php endif; ?></td>
		</tr>

		<tr valign="top" id="email2Field">
			<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'confirmEmail','required' => 'true','key' => "user.confirmEmail"), $this);?>
</td>
			<td class="value"><input type="text" id="confirmEmail" name="confirmEmail" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['confirmEmail'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
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

		<tr valign="top" id="sendPasswordField">
			<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'sendPassword','key' => "user.sendPassword"), $this);?>
</td>
			<td class="value">
				<input type="checkbox" name="sendPassword" id="sendPassword" value="1"<?php if ($this->_tpl_vars['sendPassword']): ?> checked="checked"<?php endif; ?> /> <label for="sendPassword"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.sendPassword.description"), $this);?>
</label>
			</td>
		</tr>

	<?php endif; ?><?php endif; ?>
<?php if ($this->_tpl_vars['allowRegReader'] || $this->_tpl_vars['allowRegReader'] === null || $this->_tpl_vars['allowRegAuthor'] || $this->_tpl_vars['allowRegAuthor'] === null || $this->_tpl_vars['allowRegReviewer'] || $this->_tpl_vars['allowRegReviewer'] === null || ( $this->_tpl_vars['currentJournal'] && $this->_tpl_vars['currentJournal']->getSetting('publishingMode') == @PUBLISHING_MODE_SUBSCRIPTION && $this->_tpl_vars['enableOpenAccessNotification'] )): ?>
	<tr valign="top">
		<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('suppressId' => 'true','name' => 'registerAs','key' => "user.register.registerAs"), $this);?>
</td>
		<td class="value"><?php if ($this->_tpl_vars['allowRegReader'] || $this->_tpl_vars['allowRegReader'] === null): ?><input type="checkbox" name="registerAsReader" id="registerAsReader" value="1"<?php if ($this->_tpl_vars['registerAsReader']): ?> checked="checked"<?php endif; ?> /> <label for="registerAsReader"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.role.reader"), $this);?>
</label>: <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.register.readerDescription"), $this);?>
<br /><?php endif; ?>
		<?php if ($this->_tpl_vars['currentJournal'] && $this->_tpl_vars['currentJournal']->getSetting('publishingMode') == @PUBLISHING_MODE_SUBSCRIPTION && $this->_tpl_vars['enableOpenAccessNotification']): ?><input type="checkbox" name="openAccessNotification" id="openAccessNotification" value="1"<?php if ($this->_tpl_vars['openAccessNotification']): ?> checked="checked"<?php endif; ?> /> <label for="openAccessNotification"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.role.reader"), $this);?>
</label>: <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.register.openAccessNotificationDescription"), $this);?>
<br /><?php endif; ?>
		<?php if ($this->_tpl_vars['allowRegAuthor'] || $this->_tpl_vars['allowRegAuthor'] === null): ?><input type="checkbox" name="registerAsAuthor" id="registerAsAuthor" value="1" checked="checked"/> <label for="registerAsAuthor"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.role.author"), $this);?>
</label><!--: <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.register.authorDescription"), $this);?>
--><br /><?php endif; ?>
		<?php if ($this->_tpl_vars['allowRegReviewer'] || $this->_tpl_vars['allowRegReviewer'] === null): ?><input type="checkbox" name="registerAsReviewer" id="registerAsReviewer" value="1"<?php if ($this->_tpl_vars['registerAsReviewer']): ?> checked="checked"<?php endif; ?> /> <label for="registerAsReviewer"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.role.reviewer"), $this);?>
</label>: <?php if ($this->_tpl_vars['existingUser']): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.register.reviewerDescriptionNoInterests"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.register.reviewerDescription"), $this);?>
 <input type="text" name="interests[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['interests'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="20" maxlength="255" class="textField" /><?php endif; ?><?php endif; ?></td>
	</tr>
<?php endif; ?>

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

</table>

<br />
<p><input type="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.register"), $this);?>
" class="button defaultButton" /> <input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.cancel"), $this);?>
" class="button" onclick="document.location.href='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'index','escape' => false), $this);?>
'" /></p>

<?php if (! $this->_tpl_vars['implicitAuth']): ?>
	<p><span class="formRequired"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.requiredField"), $this);?>
</span></p>
<?php endif; ?>
<!--div id="privacyStatement">
<?php if ($this->_tpl_vars['privacyStatement']): ?>
	<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.register.privacyStatement"), $this);?>
</h3>
	<p><?php echo ((is_array($_tmp=$this->_tpl_vars['privacyStatement'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>
<?php endif; ?>
</div-->

</form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

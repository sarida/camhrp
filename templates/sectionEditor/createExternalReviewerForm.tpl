{**
 * createReviewerForm.tpl
 *
 * Copyright (c) 2003-2011 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * Form for editors to create reviewers.
 *
 * $Id$
 *}
{strip}
{**assign var="pageTitle" value="sectionEditor.review.createReviewer"*}
{assign var="pageTitle" value="sectionEditor.review.createExternalReviewer"}
{include file="common/header.tpl"}
{/strip}

{literal}
<script type="text/javascript">
	$(document).ready(function(){
   		//Start code for multiple reviewing interests
        $('#addAnotherInterest').click(
        	function(){
           		var reviewingInterestHtml = '<tr valign="top" class="reviewingInterestSupp">' + $('#firstReviewingInterest').html() + '</tr>';
            	$('#firstReviewingInterest').after(reviewingInterestHtml);
            	$('#firstReviewingInterest').next().find('select').attr('selectedIndex', 0);
            	$('.reviewingInterestSupp').find('.removeReviewingInterest').show();
            	$('.reviewingInterestSupp').find('.reviewingInterestTitle').hide();
            	$('.reviewingInterestSupp').find('.noReviewingInterestTitle').show();
            	$('#firstReviewingInterest').find('.removeReviewingInterest').hide();
            	$('#firstReviewingInterest').find('.reviewingInterestTitle').show();
            	$('#firstReviewingInterest').find('.noReviewingInterestTitle').hide();
            	return false;
        	}
        );

        $('.removeReviewingInterest').live(
        	'click', function(){
        		$(this).closest('tr').remove();
            	return false;
        	}
        );
    	//End code for multiple reviewing interests
	});
</script>
{/literal}

<form method="post" name="reviewerForm" action="{url op="createExternalReviewer" path=$articleId|to_array:"create"}">

{include file="common/formErrors.tpl"}

<script type="text/javascript">
{literal}
// <!--

	function generateUsername() {
		var req = makeAsyncRequest();

		if (document.reviewerForm.lastName.value == "") {
			alert("{/literal}{translate key="manager.people.mustProvideName"}{literal}");
			return;
		}

		req.onreadystatechange = function() {
			if (req.readyState == 4) {
				document.reviewerForm.username.value = req.responseText;
			}
		}
		sendAsyncRequest(req, '{/literal}{url op="suggestUsername" firstName="REPLACE1" lastName="REPLACE2" escape=false}{literal}'.replace('REPLACE1', escape(document.reviewerForm.firstName.value)).replace('REPLACE2', escape(document.reviewerForm.lastName.value)), null, 'get');
	}


// -->
{/literal}
</script>
<div id="createReviewerForm">
<table width="100%" class="data">
	{if count($formLocales) > 1}

		<tr valign="top" id="localesField">
		<td width="20%" class="label">{fieldLabel name="formLocale" key="form.formLanguage"}</td>
		<td width="80%" class="value">
			{url|assign:"createReviewerUrl" op="createReviewer" escape=false}
			{form_language_chooser form="reviewerForm" url=$createReviewerUrl}
			<span class="instruct">{translate key="form.formLanguage.description"}</span>
		</td>
	</tr>
	
	{/if}
	
	<tr valign="top" id="salutationField">
		<td class="label">{fieldLabel name="salutation" key="user.salutation"}</td>
		<td class="value">
			<select name="salutation" id="salutation" class="selectMenu">
				<option value=""></option>
				<option value="Dr." {if  $salutation == "Dr." } selected="selected"{/if}>Dr.</option>
				<option value="Prof." {if  $salutation == "Prof." } selected="selected"{/if}>Prof.</option>
				<option value="Ms." {if  $salutation == "Ms." } selected="selected"{/if}>Ms.</option>
				<option value="Mr." {if  $salutation == "Mr." } selected="selected"{/if}>Mr.</option>
			</select>	
		</td>
	</tr>
	
	<tr valign="top" id="firstNameField">
		<td class="label">{fieldLabel name="firstName" required="true" key="user.firstName"}</td>
		<td class="value"><input type="text" name="firstName" id="firstName" value="{$firstName|escape}" size="20" maxlength="40" class="textField" /></td>
	</tr>
	
	<tr valign="top" id="middleNameField">
		<td class="label">{fieldLabel name="middleName" key="user.middleName"}</td>
		<td class="value"><input type="text" name="middleName" id="middleName" value="{$middleName|escape}" size="20" maxlength="40" class="textField" /></td>
	</tr>
	
	<tr valign="top" id="lastNameField">
		<td class="label">{fieldLabel name="lastName" required="true" key="user.lastName"}</td>
		<td class="value"><input type="text" name="lastName" id="lastName" value="{$lastName|escape}" size="20" maxlength="90" class="textField" /></td>
	</tr>
	
	<tr valign="top" id="genderField">
		<td class="label">{fieldLabel name="gender" key="user.gender"}</td>
		<td class="value">
			<select name="gender" id="gender" size="1" class="selectMenu">
				{html_options_translate options=$genderOptions selected=$gender}
			</select>
		</td>
	</tr>
	
	<tr valign="top" id="usernameField">
		<td class="label">{fieldLabel name="username" required="true" key="user.username"}</td>
		<td class="value">
			<input type="text" name="username" id="username" value="{$username|escape}" size="20" maxlength="32" class="textField" />&nbsp;&nbsp;<input type="button" class="button" value="{translate key="common.suggest"}" onclick="generateUsername()" />
			<br />
			<span class="instruct">{translate key="user.register.usernameRestriction"}</span>
		</td>
	</tr>
	
	<tr valign="top" id="notifyField">
		<td class="label">&nbsp;</td>
		<td class="value"><input type="checkbox" name="sendNotify" id="sendNotify" value="1"{if $sendNotify} checked="checked"{/if} /> <label for="sendNotify">{translate key="manager.people.createUserSendNotify"}</label></td>
	</tr>
	
	<tr valign="top" id="affiliationField">
		<td class="label">{fieldLabel name="affiliation" required="true" key="user.affiliation"}</td>
		<td class="value">
			<textarea name="affiliation[{$formLocale|escape}]" id="affiliation" rows="5" cols="40" class="textArea">{$affiliation[$formLocale]|escape}</textarea><br/>
			<span class="instruct">{translate key="user.affiliation.description"}</span>
		</td>
	</tr>
	
	<tr valign="top" id="bioField">
		<td class="label">{fieldLabel name="biography" key="user.biography"}<br />{translate key="user.biography.description"}</td>
		<td class="value"><textarea name="biography[{$formLocale|escape}]" id="biography" rows="5" cols="40" class="textArea">{$biography[$formLocale]|escape}</textarea></td>
	</tr>
	
	<tr valign="top" id="emailField">
		<td class="label">{fieldLabel name="email" required="true" key="user.email"}</td>
		<td class="value"><input type="text" name="email" id="email" value="{$email|escape}" size="30" maxlength="90" class="textField" /></td>
	</tr>
	
	<tr valign="top" id="phoneField">
		<td class="label">{fieldLabel name="phone" required="true" key="user.phone"}</td>
		<td class="value"><input type="text" name="phone" id="phone" value="{$phone|escape}" size="15" maxlength="24" class="textField" /></td>
	</tr>

	<tr valign="top" id="phoneInstructField">
		<td class="label">&nbsp;</td>
		<td class="value"><i>Please include the country and area codes.</i></td>
	</tr>

	{foreach from=$reviewingInterest[$formLocale] key=i item=interest}
    	<tr valign="top" {if $i == 0} id="firstReviewingInterest" {else} id="reviewingInterestField" {/if}>
    		<td width="20%" class="reviewingInterestTitle">{if $i == 0}Reviewing Interest(s):{else}&nbsp;{/if}</td>
    	    <td width="20%" class="noReviewingInterestTitle" style="display:none;">&nbsp;</td>
    	    <td width="80%" class="value">
    	    	<select name="reviewingInterest[{$formLocale|escape}][]" class="selectMenu">
    	        	<option value=""></option>
    	            {foreach from=$reviewingInterests key=if item=rInterest}
    	            	{assign var="isSelected" value=false}
    	            	{foreach from $reviewingInterest[$formLocale] key=if item=selectedInterests}
    	            		{if $reviewingInterest[$formLocale][$i] == $rInterest.code}
    	            			{assign var="isSelected" value=true}
    	            		{/if}
    	            	{/foreach}
    	            	<option value="{$rInterest.code}" {if $isSelected==true}selected="selected"{/if}>{$rInterest.name}</option>
    	            {/foreach}
    	        </select>
    	        <a href="" class="removeReviewingInterest" style="display:none">Remove</a>
		    </td>
    	</tr>
	{/foreach}                  
    	<tr id="addAnotherInterest">
    		<td width="20%">&nbsp;</td>
    	    <td><a href="#" id="addAnotherInterest">Add another reviewing interest</a></td>
    	</tr>
	
	<tr valign="top" id="mailingAddressField">
		<td class="label">{fieldLabel name="mailingAddress" required="true" key="common.mailingAddress"}</td>
		<td class="value"><textarea name="mailingAddress" id="mailingAddress" rows="3" cols="40" class="textArea">{$mailingAddress|escape}</textarea></td>
	</tr>
	
	<tr valign="top" id="mailingAddressInstructField">
		<td class="label">&nbsp;</td>
		<td class="value"><i>Please enter as much information as you can.</i></td>
	</tr>
	
	<tr valign="top" id="residenceField">
		<td class="label">{fieldLabel name="country" required="true" key="common.country"}</td>
		<td class="value">
			<select name="country" id="country" class="selectMenu">
				<option value=""></option>
				{html_options options=$countries selected=$country}
			</select>
		</td>
	</tr>
	
	{if count($availableLocales) > 1}
	<tr valign="top" id="workingLanguagesField">
		<td class="label">{translate key="user.workingLanguages"}</td>
		<td>{foreach from=$availableLocales key=localeKey item=localeName}
			<input type="checkbox" name="userLocales[]" id="userLocales-{$localeKey|escape}" value="{$localeKey|escape}"{if $userLocales && in_array($localeKey, $userLocales)} checked="checked"{/if} /> <label for="userLocales-{$localeKey|escape}">{$localeName|escape}</label><br />
		{/foreach}</td>
	</tr>
	{/if}
</table>

<p><input type="submit" value="{translate key="common.save"}" class="button defaultButton" /> <input type="button" value="{translate key="common.cancel"}" class="button" onclick="document.location.href='{url op="selectReviewer" path=$articleId escape=false}'" /></p>

<p><span class="formRequired">{translate key="common.requiredField"}</span></p>
</div>
</form>

{include file="common/footer.tpl"}


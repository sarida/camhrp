{**
 * editorDecisionComment.tpl
 *
 * Copyright (c) 2003-2011 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * Form to enter comments.
 *
 * $Id$
 *}
{strip}
{include file="submission/comment/header.tpl"}
{/strip}

<script type="text/javascript">
{literal}
<!--
// In case this page is the result of a comment submit, reload the parent
// so that the necessary buttons will be activated.
window.opener.location.reload();
// -->
{/literal}
</script>
<div id="existingComments">
<table class="data" width="100%">
{foreach from=$articleComments item=comment}
<tr><td width="20%"><div class="separator"></div></td><td width="80%"><div class="separator"></div></td></tr>
{assign var="submitter" value=$userDao->getUser($comment->getAuthorId())}
<div id="comment">
<tr valign="top">
	<td width="20%">
		<!--<div class="commentRole">{translate key=$comment->getRoleName()}</div>-->
		<div class="commentRole"><strong>{$submitter->getFullName()}</strong><br/>{$submitter->getFunctions()}</div>
		<div class="commentDate">{$comment->getDatePosted()|date_format:$datetimeFormatLong}</div>
	</td>
	<td width="80%">
		{if $comment->getAuthorId() eq $userId and not $isLocked}
			<div style="float: right"><a href="{url op="deleteComment" path=$articleId|to_array:$comment->getId()}" onclick="return confirm('{translate|escape:"jsparam" key="submission.comments.confirmDelete"}')" class="action">{translate key="common.delete"}</a></div>
		{/if}
		<div id="{$comment->getId()}"></a>
		{if $comment->getCommentTitle() neq ""}
			<div class="commentTitle">{translate key="submission.comments.subject"}: {$comment->getCommentTitle()|escape}</div>
		{/if}
		</div>
		<div class="comments">{$comment->getComments()|strip_unsafe_html|nl2br}</div>
	</td>
</tr>
</div>
{foreachelse}
<tr>
	<td class="nodata">{translate key="submission.comments.noComments"}</td>
</tr>
{/foreach}
<!--
			<tr><td width="20%"><div class="separator"></div></td><td width="80%"><div class="separator"></div></td></tr>
			{foreach from=$articleComments item=comment}
				{if !$comment->getViewable()}
				{assign var="submitter" value=$userDao->getUser($comment->getAuthorId())}
					<tr valign="top">
						<td><div class="commentRole"><strong>{$submitter->getFullName()}</strong><br/>{$submitter->getFunctions()}</div><div class="commentDate"><i>{$comment->getDatePosted()|date_format:$datetimeFormatLong}</i></div></td>
						<td>
							{if $comment->getCommentTitle()}
								<div class="commentTitle">{if $showReviewLetters}ຫົວຂໍ້{else}{translate key="submission.comments.subject"}{/if}: {$comment->getCommentTitle()|escape}</div>
							{/if}
							<div class="comments"><br/>&nbsp;&nbsp;&nbsp;&nbsp;{$comment->getComments()|strip_unsafe_html|nl2br}</div>
						</td>
					</tr>
					<tr><td></td><td>
						{if $comment->getAuthorId() eq $userId and not $isLocked}
							<div style="float: right"><a href="{if $reviewId}{url op="editComment" path=$articleId|to_array:$comment->getId() reviewId=$reviewId}{else}{url op="editComment" path=$articleId|to_array:$comment->getId()}{/if}" class="action">{if $showReviewLetters}Edit{else}{translate key="common.edit"}{/if}</a> <a href="{if $reviewId}{url op="deleteComment" path=$articleId|to_array:$comment->getId() reviewId=$reviewId}{else}{url op="deleteComment" path=$articleId|to_array:$comment->getId()}{/if}" onclick="return confirm('{translate|escape:"jsparam" key="submission.comments.confirmDelete"}')" class="action">{if $showReviewLetters}Delete{else}{translate key="common.delete"}{/if}</a></div>
						{/if}
					</td></tr>
					<tr><td><div class="separator"></div></td><td><div class="separator"></div></td></tr>
				{/if}
			{/foreach}
-->
</table>
</div>
<br />
<br />

{if not $isLocked}

<form method="post" action="{url op=$commentAction}">
{if $hiddenFormParams}
	{foreach from=$hiddenFormParams item=hiddenFormParam key=key}
		<input type="hidden" name="{$key|escape}" value="{$hiddenFormParam|escape}" />
	{/foreach}
{/if}


<div id="new">
{include file="common/formErrors.tpl"}

<table class="data" width="100%">
<tr valign="top">
	<td class="label">{fieldLabel name="commentTitle" key="submission.comments.subject"}</td>
	<td class="value"><input type="text" name="commentTitle" id="commentTitle" value="{$commentTitle|escape}" size="50" maxlength="255" class="textField" /></td>
</tr>
<tr valign="top">
	<td class="label">{fieldLabel name="comments" key="submission.comments.addComment"}</td>
	<td class="value"><textarea id="comments" name="comments" rows="10" cols="50" class="textArea">{$comments|escape}</textarea></td>
</tr>
</table>

<p><input type="submit" name="save" value="{translate key="common.save"}" class="button defaultButton" /> <input type="button" value="{translate key="common.close"}" class="button" onclick="window.close()" /></p>

<p><span class="formRequired">{translate key="common.requiredField"}</span></p>
</div>
</form>

{else}
<input type="button" value="{translate key="common.close"}" class="button defaultButton" style="width: 5em" onclick="window.close()" />
{/if}

{include file="common/footer.tpl"}


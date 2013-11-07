<?php /* Smarty version 2.6.26, created on 2012-05-13 17:16:35
         compiled from reviewer/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'reviewer/index.tpl', 20, false),array('function', 'translate', 'reviewer/index.tpl', 20, false),array('function', 'call_hook', 'reviewer/index.tpl', 21, false),)), $this); ?>

<?php echo ''; ?><?php $this->assign('pageTitle', "reviewer.home"); ?><?php echo ''; ?><?php $this->assign('pageCrumbTitle', "user.role.reviewer"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>

<div id="">
<ul class="plain">
	<li>&#187; <a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'submissions'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.submissions"), $this);?>
</a>&nbsp;(<?php if ($this->_tpl_vars['rangeInfo']): ?><?php echo $this->_tpl_vars['rangeInfo']; ?>
<?php else: ?>0<?php endif; ?>)</li>
	<?php echo $this->_plugins['function']['call_hook'][0][0]->smartyCallHook(array('name' => "Templates::Reviewer::Index::Submissions"), $this);?>

</ul>
<ul class="plain">
	<li>&#187; <a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'meetings'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.meetings"), $this);?>
</a>&nbsp;(<?php if ($this->_tpl_vars['meetingsCount']): ?><?php echo $this->_tpl_vars['meetingsCount']; ?>
<?php else: ?>0<?php endif; ?>)</li>
	<?php echo $this->_plugins['function']['call_hook'][0][0]->smartyCallHook(array('name' => "Templates::Reviewer::Index::Meetings"), $this);?>

</ul>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>